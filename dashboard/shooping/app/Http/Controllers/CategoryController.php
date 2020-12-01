<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
use function GuzzleHttp\Psr7\str;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {

        $this->category = $category;
    }


    public function add(){
        //dung tinh nang de quy
//        lay tat ca cac bien category
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOpiton = $recusive->categoryRecusive();



       return view('category.add',compact('htmlOpiton'));

    }



    public function index(){
        $categories = $this->category->latest()->paginate(5);
        //latest laf lay ra cai moi nhat theo ngay tao
        // paginate muoon 5 ban gi tren 1 trang
        return view('category.index',compact('categories'));

    }
    public function store (Request $request){
        $this->category->create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=> Str::slug($request->name)
        ]);
        return redirect()->route('category.index');
    }
}
