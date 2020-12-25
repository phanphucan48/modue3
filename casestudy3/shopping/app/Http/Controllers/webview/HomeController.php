<?php

namespace App\Http\Controllers\webview;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){

        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id',0)->get();
        $products = Product::latest()->take(6)->get();
        $categorysLimit = Category::where('parent_id',0)->take(3)->get();
        $productsRecommend = Product::latest('views_count','desc')->take(12)->get();
//        dd($productsRecommend);
        $carts = session()->get('cart');
        return view('home.home',compact('sliders','categorys','products','productsRecommend','categorysLimit','carts'));
    }
    public function test(){
        return view('home.test');
    }
}
