<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $CUSTOMERS =[
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
    public function welcome(){
        return view('modules.taskmanger.welcome');
    }
    public function index()
    {
             $customers = $this->CUSTOMERS;
             return view('modules.taskmanger.index',compact('customers'))    ;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   {
        return view('modules.taskmanger.create')    ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = count($this->CUSTOMERS)+1;

        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $task = [
            'id'=> $id,
            'name'=>$name,
            'phone'=>$phone,
            'email'=>$email
        ];
//        array_push($task,'id'=>$id,[],['phone'=>$phone],['email'=>$email]);
        array_push($this->CUSTOMERS,$task);
        $customers = $this->CUSTOMERS;

       return view('modules.taskmanger.index',compact('customers'));
           // redirect dung de chuyen huong tra ve route hoac phuong thuc khac

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = $this->CUSTOMERS;
        foreach ($customers as $item){
           if($item['id']==$id){
               $customer = $item;
           }
        }
        return view('modules.taskmanger.show',compact('customer')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = $this->CUSTOMERS;
        foreach ($customers as $item){
            if($item['id']==$id){
                $customer = $item;
            }
        }
        return  view('modules.taskmanger.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
