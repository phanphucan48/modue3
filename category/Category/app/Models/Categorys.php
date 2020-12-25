<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    use HasFactory;
    protected $guarded=[];

    function products(){
        return $this->hasMany(Products::class,'product_id','id');
    }
}
