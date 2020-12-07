<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\ProductController;



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

Route::get('/', function () {
    return view('welcome');
});
// show product
Route::get('/products',[ProductController::class,'index'])->name('products.show');
Route::get('/products/add-to-card/{id}',[ProductController::class,'addToCart'])->name('addToCart');
Route::get('/products/show-cart',[ProductController::class,'showcart'])->name('showcart');
Route::get('/products/update-cart',[ProductController::class,'updatecart'])->name('updatecart');
Route::get('/products/delete-cart',[ProductController::class,'deletecart'])->name('deletecart');


