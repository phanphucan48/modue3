<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;

use App\Models\Tag;
use App\Traist\StorageImageTrait;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Flight;
use Storage;
use Illuminate\Support\Facades\DB;
use Storage\Logs\Laravel;




class AdminProductController extends Controller
{
    use \App\Traits\StorageImageTrait , DeleteModelTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(Category $category , Product $product , ProductImage $productImage ,
    Tag $tag , ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;

    }

    public function index(){
        $products = $this->product->latest()->paginate(5);

        return view('admin.product.index',compact('products'));
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
    public function store(Request $request)
    {
                try {
            DB::beginTransaction();
            //        dd($request->tags);
//        dd($request->image_path);
            $dataProductCreate = [
                'name'=>$request->name,
                'price'=>$request->price,
                'content'=>$request->contents,
                'user_id'=>auth()->id(),
                'category_id'=>$request->category_id


            ];
            $dataUploadFueatureImage = $this->storageTraitUpload($request, 'feature_image_path' ,'product');
            if(!empty($dataUploadFueatureImage)){
                $dataProductCreate['feature_image_path'] =  $dataUploadFueatureImage['file_path'];
                $dataProductCreate['feature_image_name'] =  $dataUploadFueatureImage['file_name'];
            }
            $product = $this->product->create($dataProductCreate);

            // insert data vao product_images

            if($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem,'product');
//                dd($dataProductImageDetail);
                    // tro toi ham images trung gian ben thu muc model product.php vua khai bao moi quan he 1 nhiu
                    $product->images()->create([

                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name'=>$dataProductImageDetail['file_name']
                    ]);

                }
            }

            //insert tags den product
//             dd($request->tags );
                    $tagIds = [];
            if(!empty($request->tags )){
                foreach ($request->tags as $tagItem)
                {
                    //insert to tags
                    $tagInstance = $this->tag->firstOrCreate([
                        'name'=>$tagItem
                    ]);
                    $tagIds[] = $tagInstance->id;

                }

            }


                    $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message:'. $exception->getMessage().'-----Line:'.$exception->getFile());
        }




    }
    public function edit($id){
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        // lay product tro toi category de lay id
        return view('admin.product.edit',compact('htmlOption','product'));


    }
    public function update($id,Request $request)
    {

        try {
            DB::beginTransaction();
//                    dd($request->tags);
//        dd($request->image_path);
            $dataProductUpdate = [
                'name'=>$request->name,
                'price'=>$request->price,
                'content'=>$request->contents,
                'user_id'=>auth()->id(),
                'category_id'=>$request->category_id


            ];
            $dataUploadFueatureImage = $this->storageTraitUpload($request, 'feature_image_path' ,'product');
            if(!empty($dataUploadFueatureImage)){
                $dataProductUpdate['feature_image_name'] =  $dataUploadFueatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] =  $dataUploadFueatureImage['file_path'];

            }
            $this->product->find($id)->update($dataProductUpdate);
            // update nay tra ve true hoac flase
            // sau khi update thanh cong
            $product = $this->product->find($id);




            // insert data vao product_images

            if($request->hasFile('image_path')){
// truoc khi them vao phai xoa trong database
                $this->productImage->where('product_id',$id)->delete();
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem,'product');
                dd($dataProductImageDetail);
                    // tro toi ham images trung gian ben thu muc model product.php vua khai bao moi quan he 1 nhiu
                    $product->images()->create([

                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name'=>$dataProductImageDetail['file_name']
                    ]);

                }
            }

            //insert tags den product
//             dd($request->tags );
            $tagIds = [];
            if(!empty($request->tags )){
                foreach ($request->tags as $tagItem)
                {
                    //insert to tags
                    $tagInstance = $this->tag->firstOrCreate([
                        'name'=>$tagItem
                    ]);
                    $tagIds[] = $tagInstance->id;

                }

            }

// phan tags nay la moi quan he nhieu nhieu
            //sync phương pháp này để tạo liên kết nhiều-nhiều. Các syncphương pháp chấp nhận một loạt các ID để ra trên bảng trung gian. Bất kỳ ID nào không nằm trong mảng đã cho sẽ bị xóa khỏi bảng trung gian. Vì vậy, sau khi hoạt động này hoàn tất, chỉ các ID trong mảng đã cho sẽ tồn tại trong bảng trung gian:
            // sync neu them tags co ton tai vao thi no se khong them ma them nhung cai chua co


            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('product.index');

        }catch (\Exception $exception){
            DB::rollBack();
            log::error('Message:'. $exception->getMessage().'-----Line:'.$exception->getFile());
        }

    }

    public function delete($id){

        return $this->deleteModelTrait($id,$this->product);


    }

}






