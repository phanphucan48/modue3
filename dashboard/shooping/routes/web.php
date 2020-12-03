<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\usersController;
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
Route::get('/home', function () {
    return view('home');
});
Route::prefix('category')->group(function () {
  Route::get('/add',[CategoryController::class,'add'])->name('category.add');
  Route::get('/index',[CategoryController::class,'index'])->name('category.index');
  Route::post('/store',[CategoryController::class,'store'])->name('category.store');
  Route::get('/show/{id}',[CategoryController::class,'show'])->name('category.show');
  Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
  Route::post('/update/{id}',[CategoryController::class,'update'])->name('category.update');
  Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('home');
})->name('dashboard');


Route::prefix('users')->group(function (){
    Route::get('/list',[usersController::class,'list'])->name('users.list');
    Route::get('/{id}/show',[usersController::class,'show'])->name('users.show');
    Route::get('/{id}/edit',[usersController::class,'edit'])->name('users.edit');
    Route::post('/{id}/update',[usersController::class,'update'])->name('users.update');
    Route::get('/{id}/delete',[usersController::class,'delete'])->name('users.delete');
    Route::post('/search',[usersController::class,'search'])->name('users.search');
});
