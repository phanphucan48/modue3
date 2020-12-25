<?php

namespace App\Providers;

use App\Models\Product;
use App\Services\PermissionGateAndPolicyAccess;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Routes\Web;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $PermissionGateAndPolicy = new PermissionGateAndPolicyAccess();
        $PermissionGateAndPolicy->setGateAndPolicyAccess();


        Gate::define('menu-list', function (User $user) {
//            return $user->id === $post->user_id;
            return $user->checkPermissionAccess(config('permissions.access.list-menu'));
//            dd($user);
        });

        Gate::define('product-list', function (User $user) {

            return $user->checkPermissionAccess(config('permissions.access.list-product'));

        });

        Gate::define('product-edit', function (User $user , $id) {


            $product = Product::find($id);
//            dd($product);
            if($user->checkPermissionAccess(config('permissions.access.edit-product'))&& $user->id === $product->user_id)
            {
                        return true;
            }

            return false;
//            return $user->checkPermissionAccess(config('permissions.access.edit-product'));
//            dd($user);
        });


    }
    //    public function defineGaCategory(){
    //        Gate::define('category-list','App\Policies\CategoryPolicy@view');
    //        Gate::define('category-add','App\Policies\CategoryPolicy@create');
    //        Gate::define('category-edit','App\Policies\CategoryPolicy@update');
    //        Gate::define('category-delete','App\Policies\CategoryPolicy@delete');
    //    }
}
