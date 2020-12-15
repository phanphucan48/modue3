<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;

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
Route::get('/admin',[AdminController::class,'loginAdmin']);
Route::post('/admin',[AdminController::class,'postloginAdmin'])->name('login');
Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('/',[CategoryController::class,'index'])->name('categories.index');
        Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
        Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('categories.update');
        // php artisan make:migration add_column_deleted_ad_table_categories --table=categories  them lenh nay de tao migration

        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('categories.delete');

    });

    Route::prefix('menus')->group(function () {
        Route::get('/',[MenuController::class,'index'])->name('menus.index');
        Route::get('/create',[MenuController::class,'create'])->name('menus.create');
        Route::post('/store',[MenuController::class,'store'])->name('menus.store');
        Route::get('/edit/{id}',[MenuController::class,'edit'])->name('menus.edit');
        Route::post('/update/{id}',[MenuController::class,'update'])->name('menus.update');
        // php artisan make:migration add_column_deleted_ad_table_categories --table=categories  them lenh nay de tao migration

        Route::get('/delete/{id}',[MenuController::class,'delete'])->name('menus.delete');

    });


    // products
    Route::prefix('product')->group(function () {
        Route::get('/',[AdminProductController::class,'index'])->name('product.index');
        Route::get('/create',[AdminProductController::class,'create'])->name('product.create');
        Route::post('/store',[AdminProductController::class,'store'])->name('product.store');
        Route::get('/edit/{id}',[AdminProductController::class,'edit'])->name('product.edit');
        Route::post('/update/{id}',[AdminProductController::class,'update'])->name('product.update');
        // php artisan make:migration add_column_deleted_ad_table_categories --table=categories  them lenh nay de tao migration

        Route::get('/delete/{id}',[AdminProductController::class,'delete'])->name('product.delete');

    });

});



