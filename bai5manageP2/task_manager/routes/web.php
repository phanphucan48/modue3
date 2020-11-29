<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MannagerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CustomerController;

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
Route::prefix('customer')->group(function () {
    Route::get('index', function () {
        // Hiển thị danh sách khách hàng

        return view('modules.customer.index');
    });

    Route::get('index',[MannagerController::class,'index'])->name('customer.list');

    Route::post('store', function (Illuminate\Http\Request $request) {
//         dd($request->name);
//         return view();


    })->name('customer.store');

    Route::get('/{id}/show',[MannagerController::class,'show'])->name('customer.show');

    Route::get('/{customer}/edit',[MannagerController::class,'edit'] )->name('customer.edit');

    Route::patch('{id}/update', function () {
        // xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form
    });

    Route::delete('{id}', function () {
        // Xóa thông tin dữ liệu khách hàng
    });
    Route::get('create', function () {
        // Xóa thông tin dữ liệu khách hàng
        return view('modules.customer.create');
    })->name('customer.create');
    Route::get('list',[CustomerController::class,'index'])->name('customers.index');


});

Route::prefix('taskmanger')->group(function (){
    Route::get ('tasks',[TaskController::class,'index'])->name('tasks.index');
});
