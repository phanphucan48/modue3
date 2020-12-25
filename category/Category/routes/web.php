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
Route::get('/index', [ProductController::class,'index'])->name('index');
Route::get('/add', [ProductController::class,'add'])->name('add');
Route::post('/store', [ProductController::class,'store'])->name('store');
Route::get('/edit/{id}', [ProductController::class,'edit'])->name('edit');
Route::post('/update/{id}', [ProductController::class,'update'])->name('update');
Route::get('/thongke', [ProductController::class,'statistic'])->name('statistic');

