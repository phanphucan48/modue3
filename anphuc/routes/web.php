<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/product', function () {
    return view('product');
});


Route::get('/login', function () {
    return view('login');
});


Route::get('/greeting/{name?}', function ($name = null) {
    if($name){
        echo 'hello'. $name . '!';

    }else{
        echo 'Hello World!';
    }
});

Route::post('/login', function (Illuminate\Http\Request $request) {
    if($request->username == 'admin' && $request->password == 'admin'){
        return view ('welcome_admin');
    }
    return  view ('login_error');
});
//Route::get('/product', function () {
//    return view('product');
//});

Route::post('/product', function (Illuminate\Http\Request $request) {
     $DiscountAmount = $request->price * $request->percent *0.1;
     $DiscountPrice = $request->price - $DiscountAmount ;
     $description = $request->description;

     return view('discount',compact('DiscountAmount','DiscountPrice','description')) ;
});

Route::get('/tudien', function () {
    return view('tudien');

});

Route::post('/tudien', function (Illuminate\Http\Request $request) {
    $dictionary = array("hello"=>"xin chào", "how"=>"thế nào", "book"=>"quyển vở", "computer"=>"máy tính");
    $search= $request->search;
});
