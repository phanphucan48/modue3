<?php

namespace App\Http\Controllers\webview;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index($slug,$categoryId)
    {
        $categorysLimit = Category::where('parent_id',0)->take(3)->get();
        $products = Product::where('category_id',$categoryId)->paginate(12);
        $categorys = Category::where('parent_id',0)->get();
        $carts = session()->get('cart');
//        dd($carts);
       return view('home.category.list',compact('categorysLimit','products','categorys','carts'));
    }

    public function addtocard($id){
//
//        session()->flush('cart');


        $products = Product::find($id);
        //$cart = [];neu bang rong thi khong the them san pham
        $cart = session()->get('cart');
        if(isset($cart[$id]) ){
            $cart[$id]['quantity'] = $cart[$id]['quantity']+1;
        }else{
            $cart[$id] = [

              'name'=>$products->name,
                'price'=>$products->price,
                'quantity' => 1,
                'image'=> $products->feature_image_path,
            ];
        }
        session()->put('cart',$cart);
//        echo "<pre>";
//        print_r(session()->get('cart'));

        return response()->json([
            'code'=>200,
            'message'=> 'success'
        ],200);

    }
   public function showtocard(){
//
       $categorysLimit = Category::where('parent_id',0)->limit(4)->get();
       $products = Product::all();
       $carts = session()->get('cart');
//       dd($carts);
       return view('home.cart.cart',compact('categorysLimit','carts','products'));

   }
   public function Updatetocard(Request $request)
   {
//       dd($request->all());
      if($request->id && $request->quantity){
          $carts = session()->get('cart');
          $carts[$request->id]['quantity'] = $request->quantity;
          session()->put('cart',$carts);
          $carts = session()->get('cart');
          $cartComponent = view('home.components.carts_components',compact('carts'))->render();
          return response()->json([
             'cart_component'=> $cartComponent,
              'code'=>200
          ],200);
      }

   }
   public function delete(Request $request){
       if($request->id ){
           $carts = session()->get('cart');
           unset($carts[$request->id ]);
           session()->put('cart',$carts);
           $carts = session()->get('cart');
           $cartComponent = view('home.components.carts_components',compact('carts'))->render();
           return response()->json([
               'cart_component'=> $cartComponent,
               'code'=>200
           ],200);
       }
   }
   public function getSearch(Request $request)
   {
       $categorysLimit = Category::where('parent_id',0)->take(3)->get();
    $products = Product::where('name','like','%'.$request->key.'%')
                            ->orWhere('price',$request->key)
                        ->get();
       $carts = session()->get('cart');
       return view('home.search.search',compact('products','categorysLimit','carts'));
   }
}
