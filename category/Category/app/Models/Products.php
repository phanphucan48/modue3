<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $guarded = [];
//    protected $fillable = [
//        'name',
//       'price',
//        'product_id',
//
//    ];
    public function Categorys(){
        return $this->belongsTo(Categorys::class,'product_id','id');
    }
}
