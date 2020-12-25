<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Categorys;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $category;
    private $products;
    public function __construct(Categorys $category,Products $products)
    {

        $this->category= $category;
        $this->products = $products;
    }
    public function index(){
        $categorys =  $this->category->all();
       $products = $this->products->all();

        return view('index',compact('products'));
    }
    public function add()
    {
        $categorys =  $this->category->all();
//        dd($categorys);

        return view('add', compact('categorys'));
    }
    public function store(ProductRequest $request){

        $products = new Products();

         $products->create([
             'name' => $request->name,
             'price' =>$request->price,
             'product_id' =>$request->product_id,
         ]);


        return redirect()->route('index');
    }
    public function edit($id){
        $products = Products::find($id);


        $categorys = Categorys::all();


        return view('edit',compact('products','categorys'));
    }
    public function update($id,Request $request){


        $products = Products::find($id);



        $products->update([
            'name' => $request->name,
            'price' =>$request->price,
            'product_id' =>$request->product_id,
        ]);

        return redirect()->route('index');

    }
    public function statistic()
    {
        $categories = Categorys::all();
        return view('view', compact('categories'));
    }
}
