<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomController extends Controller
{
    public function index(){
        return view('index');
    }
}
