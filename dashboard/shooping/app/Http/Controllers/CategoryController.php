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

    public function getCategory($parentId){
        //dung tinh nang de quy
//        lay tat ca cac bien category
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOpiton = $recusive->categoryRecusive($parentId);
        return $htmlOpiton;
    }
    public function add(){

        $htmlOpiton = $this->getCategory($parentId = '');


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

    public function show($id){
        $category = $this->category->find($id);
        $htmlOpiton = $this->getCategory($category->parent_id);

        //dung phuong thuc find de lay id
        return view('category.show',compact('category','htmlOpiton'));
    }
    public function edit($id){
        $category = $this->category->find($id);
        $htmlOpiton = $this->getCategory($category->parent_id);

        //dung phuong thuc find de lay id
        return view('category.edit',compact('category','htmlOpiton'));
    }
    public function update($id,Request $request){
            $this->category->find($id)->update([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id,
                'slug'=> Str::slug($request->name)
            ]);
        return redirect()->route('category.index');
    }

    public function delete($id){
        $this->category->find($id)->delete();
        return redirect()->route('category.index');

    }
}
