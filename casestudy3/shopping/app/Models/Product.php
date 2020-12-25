<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];
    // su dung moi quan he 1 nhieu
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
    public function tags(){
        return $this
            ->belongsToMany(Tag::class,'product_tags','product_id','tag_id')
            ->withTimestamps();
    }
    public function category(){
        // 1 nhiu nhung tro nguoc lai dung belong to(thuoc ve)
        // khoa ngoai la category_id trong bang products
         return $this->belongsTo(Category::class,'category_id');
    }
    public function productImages(){
        // 1 san pham co nhieu chi tien
        // su dung moi quan he mot nhieu
            return $this->hasMany(ProductImage::class,'product_id');

    }




}


// product voi productimages la moi quan he mot nhieu ( 1 produc la co nhiu anh va 1 hinh anh chi thuoc ve 1 product)
