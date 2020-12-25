<?php
namespace App\Traits;

use http\Env\Request;
use Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\AdminProductController;

trait StorageImageTrait
{
     public function storageTraitUpload($request,  $fieldName, $foderName)
     {
                 if($request->hasFile($fieldName)){
                     $file = $request->$fieldName;
                     $filenameOrigin =  $file->getClientOriginalName();
                     $fileNameHash = Str::random(20). '.' . $file->getClientOriginalExtension();
                     $filePath = $request->file($fieldName)->storeAs('public/' . $foderName .'/'.auth()->id(),$fileNameHash);
                     $dataUploadTrait = [
                         'file_name'=>$filenameOrigin,
                         'file_path'=>Storage::url($filePath)
                     ];
                     return $dataUploadTrait;
                 }
                 return null;

     }

    public function storageTraitUploadMutiple($file , $foderName)
    {
            $filenameOrigin =  $file->getClientOriginalName();
            $fileNameHash = Str::random(20). '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/' . $foderName .'/'.auth()->id(),$fileNameHash);
            $dataUploadTrait = [
                'file_name'=>$filenameOrigin,
                'file_path'=>Storage::url($filePath)
            ];
            return $dataUploadTrait;



    }

}
