<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recusive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    private $category;

    public function __construct(Category $category)
    {

        $this->category = $category;
    }

    public function index()
    {

        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    // tao function chung
    public function getCategory($parentId){
        $data = $this->category->all();

        $recusive = new Recusive($data);

        $htmlOption=$recusive->categoryRecusive($parentId);
        // kich vao categoryRecusive de them parentId vao

        return $htmlOption;

    }




    public function create()
    {

        // truyen tham so prantid vao
        $htmlOption = $this->getCategory($parentId = '');
        // use file components de truyen file data vao recusive


        return view('admin.category.add', compact('htmlOption'));


    }
    public function store(Request $request){
        $this->category->create([
           'name'=>$request->name,
           'parent_id'=> $request->parent_id,
            'slug'=> Str::slug($request->name)

        ]);
        return redirect()->route('categories.index');

    }



    public function edit($id){

        $category = $this->category->find($id);

        $htmlOption = $this->getCategory($category->parent_id);

     return view('admin.category.edit',compact('category','htmlOption'));


    }
    public function update($id, Request $request){

         $this->category->find($id)->update([
             // truyen toi phuong thuc bang mang
             'name'=>$request->name,
             'parent_id'=> $request->parent_id,
             'slug'=> Str::slug($request->name)

         ]);

//        $htmlOption = $this->getCategory($category->parent_id);

        return redirect()->route('categories.index');


    }
    public function delete($id){

        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
        //  vao models thu muc category them
//    use Illuminate\Database\Eloquent\SoftDeletes;
//        use softdelete ;


    }


}
