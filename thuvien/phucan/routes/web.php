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

Route::get('/thuvien', function () {
    return view('thuvien');
});
Route::post('/thuvien', function (Illuminate\Http\Request $request) {

    $dictionary = array("hello" => "xin chào", "how" => "thế nào", "book" => "quyển vở", "computer" => "máy tính");
    $search = $request->search;
    foreach ($dictionary as $word => $description) {

        if ($word == $search) {
//            dd($description);
            return view('ketqua', compact('word','description'));
        }else{
            $ketqua = 'khong tim thay tu';
            return view('ketqua',compact('ketqua'));
        }
    }
})->name('ketqua');

