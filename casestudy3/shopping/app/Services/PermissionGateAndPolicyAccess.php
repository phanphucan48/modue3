<?php

namespace App\Services;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {
    public function setGateAndPolicyAccess(){

        $this->defineGaCategory();

    }

public function defineGaCategory(){
        // define permission
    Gate::define('category-list','App\Policies\CategoryPolicy@view');
    Gate::define('category-add','App\Policies\CategoryPolicy@create');
    Gate::define('category-edit','App\Policies\CategoryPolicy@update');
    Gate::define('category-delete','App\Policies\CategoryPolicy@delete');
}


}
