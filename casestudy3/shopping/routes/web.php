<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\SliderAdminController;
use App\Http\Controllers\SettingAdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\webview\HomeController;
use App\Http\Controllers\webview\CategoryProductController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// tao login
Route::get('/login',[AdminController::class,'loginAdmin'])->name('login');
Route::post('/login',[AdminController::class,'postloginAdmin'])->name('checklogin');
Route::get('/home', function () {
    return view('home');
});



//backend
Route::prefix('admin')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('/',[CategoryController::class,'index'])->name('categories.index')->middleware('can:category-list');
        Route::get('/create',[CategoryController::class,'create'])->name('categories.create')->middleware('can:category-add');
        Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit')->middleware('can:category-edit');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('categories.update');
        // php artisan make:migration add_column_deleted_ad_table_categories --table=categories  them lenh nay de tao migration

        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('categories.delete')->middleware('can:category-delete');

    });

        Route::prefix('menus')->group(function () {
        Route::get('/',[MenuController::class,'index'])->name('menus.index')->middleware('can:menu-list');
        Route::get('/create',[MenuController::class,'create'])->name('menus.create');
        Route::post('/store',[MenuController::class,'store'])->name('menus.store');
        Route::get('/edit/{id}',[MenuController::class,'edit'])->name('menus.edit');
        Route::post('/update/{id}',[MenuController::class,'update'])->name('menus.update');
        // php artisan make:migration add_column_deleted_ad_table_categories --table=categories  them lenh nay de tao migration

        Route::get('/delete/{id}',[MenuController::class,'delete'])->name('menus.delete');

    });


    // products
    Route::prefix('product')->group(function () {
        Route::get('/',[AdminProductController::class,'index'])->name('product.index')->middleware('can:product-list');
        Route::get('/create',[AdminProductController::class,'create'])->name('product.create');
        Route::post('/store',[AdminProductController::class,'store'])->name('product.store');
        Route::get('/edit/{id}',[AdminProductController::class,'edit'])->name('product.edit')->middleware('can:product-edit,id');
        Route::post('/update/{id}',[AdminProductController::class,'update'])->name('product.update');
        // php artisan make:migration add_column_deleted_ad_table_categories --table=categories  them lenh nay de tao migration

        Route::get('/delete/{id}',[AdminProductController::class,'delete'])->name('product.delete');

    });

    Route::prefix('slider')->group(function () {
        Route::get('/',[SliderAdminController::class,'index'])->name('slider.index');
        Route::get('/create',[SliderAdminController::class,'create'])->name('slider.create');
        Route::post('/store',[SliderAdminController::class,'store'])->name('slider.store');
        Route::get('/edit/{id}',[SliderAdminController::class,'edit'])->name('slider.edit');
        Route::post('/update/{id}',[SliderAdminController::class,'update'])->name('slider.update');
        // php artisan make:migration add_column_deleted_ad_table_categories --table=categories  them lenh nay de tao migration

        Route::get('/delete/{id}',[SliderAdminController::class,'delete'])->name('slider.delete');

    });
    Route::prefix('setting')->group(function () {
        Route::get('/',[SettingAdminController::class,'index'])->name('setting.index');
        Route::get('/create',[SettingAdminController::class,'create'])->name('setting.create');
        Route::post('/store',[SettingAdminController::class,'store'])->name('setting.store');
        Route::get('/edit/{id}',[SettingAdminController::class,'edit'])->name('setting.edit');
        Route::post('/update/{id}',[SettingAdminController::class,'update'])->name('setting.update');
        // php artisan make:migration add_column_deleted_ad_table_categories --table=categories  them lenh nay de tao migration

        Route::get('/delete/{id}',[SettingAdminController::class,'delete'])->name('setting.delete');

    });
// user
    Route::prefix('users')->group(function () {
        Route::get('/',[AdminUserController::class,'index'])->name('users.index');
        Route::get('/create',[AdminUserController::class,'create'])->name('users.create');
        Route::post('/store',[AdminUserController::class,'store'])->name('users.store');
        Route::get('/edit/{id}',[AdminUserController::class,'edit'])->name('users.edit');
        Route::post('/update/{id}',[AdminUserController::class,'update'])->name('users.update');
        // php artisan make:migration add_column_deleted_ad_table_categories --table=categories  them lenh nay de tao migration

        Route::get('/delete/{id}',[AdminUserController::class,'delete'])->name('users.delete');

    });

    Route::prefix('roles')->group(function () {
        Route::get('/',[AdminRoleController::class,'index'])->name('roles.index');
        Route::get('/create',[AdminRoleController::class,'create'])->name('roles.create');
        Route::post('/store',[AdminRoleController::class,'store'])->name('roles.store');
        Route::get('/edit/{id}',[AdminRoleController::class,'edit'])->name('roles.edit');
        Route::post('/update/{id}',[AdminRoleController::class,'update'])->name('roles.update');
        // php artisan make:migration add_column_deleted_ad_table_categories --table=categories  them lenh nay de tao migration

        Route::get('/delete/{id}',[AdminRoleController::class,'delete'])->name('roles.delete');

    });


    Route::prefix('permissions')->group(function () {

        Route::get('/create',[AdminPermissionController::class,'createPermissions'])->name('permissions.create');
        Route::post('/store',[AdminPermissionController::class,'store'])->name('permissions.store');


    });

});




// fontend
Route::get('/web',[HomeController::class,'index'])->name('home.index');
Route::get('/category/{slug}/{id}',[CategoryProductController::class,'index'])->name('category.product');
Route::get('addtocart/{id}',[CategoryProductController::class,'addtocard'])->name('addtocart');
Route::get('showtocart',[CategoryProductController::class,'showtocard'])->name('show_tocart');
Route::get('Updatetocart',[CategoryProductController::class,'Updatetocard'])->name('updateCart');
Route::get('delete',[CategoryProductController::class,'delete'])->name('delete');
Route::get('search',[CategoryProductController::class,'getSearch'])->name('search');






