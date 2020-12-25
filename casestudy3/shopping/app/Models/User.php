<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasFactory, Notifiable ;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }

    public function checkPermissionAccess($permissionCheck){
        // user co quyen add , sua danh muc , va xem menu

       // b1 lay tat ca cac quyen users check vao he thong
        // b2 so sanh gia tri dua vao cua rutor hien tai co ton tai trong cac quyen ma minh lay hay khong


        $roles = auth()->user()->roles;
//        dd($roles);
        foreach ($roles as $role){
            $permissions = $role->permissions;
            if( $permissions->contains('key_code',$permissionCheck)){

                return true;
            }

        }
        return false;


    }
}
