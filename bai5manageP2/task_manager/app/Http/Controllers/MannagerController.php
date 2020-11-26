<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MannagerController extends Controller
{
    public  $CUSTOMERS =[
        [
            'id'=>'1',
            'name'=>'an',
            'phone'=>'12345566',
            'email'=>'an@gmail.com'
        ],
            [
                'id'=>'2',
                'name'=>'Huy',
                'phone'=>'12345566',
                'email'=>'huy@gmail.com'
            ]
        ];
    public function index(){

        $customers = $this->CUSTOMERS;

        return view('modules.customer.index',compact('customers'));
    }

    public  function show($id){
      $customers = $this->CUSTOMERS;
       foreach ($customers as $item){
           if($item['id']==$id){
               $customer = $item;
           }
       }
        return view('modules.customer.show',compact('customer'));
    }
    public  function  edit($id){
//        foreach ();
//       dd($id);
        $customers = $this->CUSTOMERS;
        foreach ($customers as $item){
            if($item['id']==$id){
                $customer = $item;
            }
        }
        return view('modules.customer.edit',compact('customer'));
    }
}
