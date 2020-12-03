<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;




class usersController extends Controller
{


    public function list(){
        $users = User::all();
        $users = User::paginate(5);
        return view('users.users',compact('users'));
    }
    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show',compact('user'));
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit',compact('user'));
    }
    public function update(Request $request,$id){
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        Session::flash('success', 'Cập nhật khách hàng thành công');
        return redirect()->route('users.list');
    }
    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('delete', 'xoa khách hàng thành công');
        return redirect()->route('users.list');

    }
    public function search(Request $request){

        $keyword = $request->input('search');

        $users = User::where('name', 'LIKE', '%' . $keyword . '%')

            ->paginate(5);
        if(isset($users)){

            Session::flash('notsearch', 'khong tim thay ten');
        }
        return view('users.users',compact('users',));


    }
}
