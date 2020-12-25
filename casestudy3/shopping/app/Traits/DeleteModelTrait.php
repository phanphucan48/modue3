<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait DeleteModelTrait {
    public function deleteModelTrait($id,$model){
        try{
            $model->find($id)->delete();
            return response()->json([
                'code'=>200,
                // loi 500 loi sever
                'messager'=>'success'
            ], 200);

        }catch (\Exception $exception){
            log::error('Message:'. $exception->getMessage().'-----Line:'.$exception->getFile());
            return response()->json([
                'code'=>500,
                // loi 500 loi sever
                'messager'=>'fail'
            ], 500);
        }

    }
}
?>
