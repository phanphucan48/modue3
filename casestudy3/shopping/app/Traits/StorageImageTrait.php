<?php
namespace App\Tra;
use http\Env\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait{
     public function storageTraitUpload($request,  $fieldName, $foderName)
     {
                 if($request->hasFile($fieldName)){
                     $file = $request->$fieldName;
                     $filenameOrigin =  $file->getClientOriginalName();
                     $fileNameHash = Str::random(20). '.' . $file->getClientOriginalExtension();
                     $filePath = $request->file($fieldName)->storeAs('public' . $foderName .'/'.auth()->id(),$fileNameHash);
                     $dataUploadTrait = [
                         'file_name'=>$filenameOrigin,
                         'file_path'=>Storage::url($filePath)
                     ];
                     return $dataUploadTrait;
                 }
                 return null;

     }

}
