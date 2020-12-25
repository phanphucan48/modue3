<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin()
    {
//


        if(auth()->check()){
            return redirect()->to('');
        }
        return view('login');
    }
    public function postloginAdmin(Request $request)
    {
//        dd(bcrypt('12345678'));
//        dd($request->has('remember_me'));
        $remember = $request->has('remember_me')? true : false;
        if(auth()->attempt([
            'email'=> $request->email,
            'password'=>$request->password
            ],$remember)){
            return redirect()->route('categories.index');
        }else {
            return view('login',with(['mess'=>'Tài khoản không đúng']));
        }

    }
}
