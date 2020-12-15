<?php
namespace App\Components;
// tao MenuRecusive
use App\Models\Menu;

class MenuRecusive{
    //1 tao mot contruct
    private $html;
    public function __construct()
    {
        $this->html = '';
        // su dung cai nay de noi cac option voi nha

    }

    public function menuRecusiveAdd($parentId = 0, $subMark = '' ) {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem){
            $this->html .='<option value="  '. $dataItem->id .'   "> '
                . $subMark . $dataItem->name . ' </option>';
            $this->menuRecusiveAdd($dataItem->id, $subMark . '----');
        }
        return $this->html;

   }

    public function menuRecusiveEdit($parentIdMenuEdit, $parentId = 0, $subMark = '' ) {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem){
            if($parentIdMenuEdit == $dataItem->id){

                $this->html .='<option selected value="  '. $dataItem->id .'   "> ' . $subMark . $dataItem->name . ' </option>';

            }else{
                $this->html .='<option value="  '. $dataItem->id .'   "> ' . $subMark . $dataItem->name . ' </option>';
            }

           // goi lai phuong thyc menuRecusiveEdit de thuc hien de quy
            $this->menuRecusiveEdit($parentIdMenuEdit, $dataItem->id, $subMark . '----');
        }

        return $this->html;

    }

   //b1: lat tat ca menu co parent_id = 0 ; --menu 1    , --menu2, --menu3
    //foreach ( )
//    public function explain(){



//        foreach ($data as $dataItem){
//            $this->html .='<option value="  '. $dataItem->id .'   "> '
//                . $subMark . $dataItem->name . ' </option>';
//            //in ra menu 1
//            $this->menuRecusiveAdd($dataItem->id, $subMark . '----');
//
//          data se la menu 1.1 va menu 1.2
//         chay vong lap 2
//            foreach ($data as $dataItem){
//                $this->html .='<option value="  '. $dataItem->id .'   "> '
//                    . $subMark . $dataItem->name . ' </option>';
//                //in ra menu 1
//                $this->menuRecusiveAdd($dataItem->id, $subMark . '----');
//
//
//
//               se in ra  menu 1.1.1
//                foreach ($data as $dataItem){
//                    $this->html .='<option value="  '. $dataItem->id .'   "> '
//                        . $subMark . $dataItem->name . ' </option>';
//                    //in ra menu 1
//                    $this->menuRecusiveAdd($dataItem->id, $subMark . '----');
//
//
//
//
//
//        }
//    }

}
