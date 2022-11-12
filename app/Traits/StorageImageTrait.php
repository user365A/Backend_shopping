<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
trait StorageImageTrait {

   public function StorageTraitUpload($req,$fileName,$folderName){
    if($req->hasFile($fileName)){
        $file = $req->$fileName;
        $fileNameOrigin=$file->getClientOriginalName();
        $fileNameHash= Str::random(20).'.'.$file->getClientOriginalExtension();
        $filePath = $req->file($fileName)->storeAs('public/'.$folderName.'/'.auth()->id(),$fileNameHash);
        $dataUpload=[
            'file_name'=>$fileNameOrigin,
            'file_path'=> Storage::url($filePath)
        ];
        return $dataUpload;
    }
    return null;


   }

   public function StorageTraitUploadMutiple($file,$folderName){

        $fileNameOrigin=$file->getClientOriginalName();
        $fileNameHash= Str::random(20).'.'.$file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/'.$folderName.'/'.auth()->id(),$fileNameHash);
        $dataUpload=[
            'file_name'=>$fileNameOrigin,
            'file_path'=> Storage::url($filePath)
        ];
        return $dataUpload;

   }

}
