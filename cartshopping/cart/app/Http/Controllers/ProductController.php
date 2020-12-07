<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\Resources\products\Cart;


use App\Http\Controllers\Controller;






class ProductController extends Controller
{
   public function index(){
       $products = Product::all();
//       dd($products);
       return view('products.index',compact('products'));
   }

   public function addToCart($id){

//       dd('add to cart'. $id);
//       xoa session
//      session()->flush('cart');
//       echo "<pre>";
//       print_r(session()->get('cart'));
//       dd('end');

//       session()->flush();
      $product = Product::find($id);
      $cart = session()->get('cart');
      if(isset($cart[$id])){
          $cart[$id]['quantity']= $cart[$id]['quantity']+1;

      }else{
          $cart[$id]=[
              'name'=>$product->name,
              'price'=>$product->price,
              'quantity'=>1,
              'image'=>$product->image_path

          ];
      }
      session()->put('cart',$cart);
      return response()->json([
          'code'=>200,
           'message'=>'success'
      ],200);

   }
   public function showcart(){
//       echo "<pre>";
//       print_r(session()->get('cart'));

       // truyen cart sang trang cart
       $carts = session()->get('cart');
//       dd($carts);
       return view('products.cart',compact('carts'));

   }
   public function updatecart(Request $request){

             if($request->id && $request->quantity){
                     $carts = session()->get('cart');
                 $carts[$request->id]['quantity']= $request->quantity;
                 session()->put('cart',$carts);
                 $carts = session()->get('cart');
//                 dd($carts);
                 $cartComponent = view('products.components.cart_components',compact('carts'))->render();
                 return response()->json(['cart_component'=>$cartComponent,'code'=>200 ] ,'200');
             }
   }
   public function deletecart(Request $request){
       if($request->id ){
           // lay session cart
           $carts = session()->get('cart');
          // xoa session
         unset($carts[$request->id]);
           session()->put('cart',$carts);
           $carts = session()->get('cart');
//                 dd($carts);
           $cartComponent = view('products.components.cart_components',compact('carts'))->render();
           return response()->json(['cart_component'=>$cartComponent,'code'=>200 ] ,'200');
       }


   }

}
