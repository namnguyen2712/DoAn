<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class customerAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return customer::all();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|min:3|max:30|unique:customer,name',

            'email' => 'required|unique:customer,email',
            'address' => 'required',
            'phone' => 'required'
        ],
        [
            'name.required'=> 'Chưa nhập tài khoản',
            'name.min'=> 'Tài khoản từ 3 đến 30 kí tự',
            'name.max'=> 'Tài khoản từ 3 đến 30 kí tự',
            'name.unique'=> 'Tài khoản đã tồn tại',
            'email.required'=> 'Bạn phải nhập email',
            'address.required'=> 'Bạn phải nhập địa chỉ',
            'phone.required'=> 'Bạn phải nhập số điện thoại'
        ]);
        if(customer::Create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'sex'=>$request->sex,

        ])){
            return 1;
        }
        else{
            return 0;
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        return customer::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $model = customer::find($id);
        $this->validate($request,[
            'name'=> 'required',
        ], [
            'name.required'=> 'Bạn chưa nhập tên',

        ]);
        if($model->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'sex'=>$request->sex,

        ])){
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer ,$id)
    {

        customer::destroy($id);
        return 1;
    }
}
