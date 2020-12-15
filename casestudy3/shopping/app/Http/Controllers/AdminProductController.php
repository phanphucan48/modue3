<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    private $category;
    public function __construct(Category $category)
    {
         $this->category = $category;
    }

    public function index(){

        return view('admin.product.index');
//        dd('list products');

    }

    // tao function chung
    public function getCategory($parentId){
        $data = $this->category->all();

        $recusive = new Recusive($data);

        $htmlOption=$recusive->categoryRecusive($parentId);
        // kich vao categoryRecusive de them parentId vao

        return $htmlOption;

    }


    public function create(){

        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add',compact('htmlOption'));
//        dd('list products');

    }

}
