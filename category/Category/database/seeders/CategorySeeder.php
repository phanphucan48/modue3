<?php

namespace Database\Seeders;

use App\Models\Categorys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Categorys();
        $category->title = "Ao";
        $category->description ="product";
        $category->save();
        $category = new Categorys();
        $category->title = "Quan";
        $category->description ="product";
        $category->save();
        $category = new Categorys();
        $category->title = "Mu";
        $category->description ="product";
        $category->save();
    }

}
