<?php

namespace App\Http\Controllers;

use App\Models\supply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class supplyAPIController  extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return supply::all();


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
            'phone' => 'min:3|max:50',
            'fax' => 'min:3|max:50',
            'email' => 'min:3|max:50',
            'explain' => 'min:3|max:50',
            'address' => 'min:3|max:500'
        ],
        [
            
            'phone.min'=>'Tên quá ngắn. Nhập lại',
            'phone.max'=>'Tên quá dài. Nhập lại',
            'fax.min'=>'Tên quá ngắn. Nhập lại',
            'fax.max'=>'Tên quá dài. Nhập lại',
            'email.min'=>'Tên quá ngắn. Nhập lại',
            'email.max'=>'Tên quá dài. Nhập lại',
            'explain.min'=>'Tên quá ngắn. Nhập lại',
            'explain.max'=>'Tên quá dài. Nhập lại',
            'address.min'=>'Tên quá ngắn. Nhập lại',
            'address.max'=>'Tên quá dài. Nhập lại'

        ]);
        if (supply::Create([
            'name' => $request->name,
            'tax_code'=>$request->tax_code,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'fax'=>$request->fax,
            'email'=>$request->email,
            'explain'=>$request->explain
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
    * @param  \App\Models\supply  $supply
    * @return \Illuminate\Http\Response
    */
    public function show(supply $supply)
    {
        return supply::find($id);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\supply  $supply
    * @return \Illuminate\Http\Response
    */


    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\supply  $supply
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, supply $supply)
    {
        $model=supply::find($id);
        $this->validate(
            $request,
            [
                'name' => 'required|min:3|max:50|unique:supply',
                'tax_code' => 'required|min:3|max:50|uniquq:tax_code',
                'phone' => 'min:3|max:50',
                'fax' => 'min:3|max:50',
                'email' => 'min:3|max:50',
                'explain' => 'required|min:3|max:50',
                'address' => 'required | min:3|max:500',
            ],
            [
                'name.required' => 'Bạn chưa nhập dữ liệu',
                'name.min'=>'Tên quá ngắn. Nhập lại',
                'name.max'=>'Tên quá dài. Nhập lại',
                'name.unique'=>'Tên nhà cung cấp đã tồn tại',
                'tax_code.required' => 'Bạn chưa nhập dữ liệu',
                'address.required' => 'Bạn chưa nhập dữ liệu',
            ]
        );
        if ($model->update([
            'name' => $request->name,
            'tax_code'=>$request->tax_code,
            'phone'=>$request->phone,
            'fax'=>$request->fax,
            'email'=>$request->email,
            'explain'=>$request->explain,
            'address'=>$request->address,

        ]))
        {
            return 1;
        }
        else
        {
            return 0;
        }

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\supply  $supply
    * @return \Illuminate\Http\Response
    */
    public function destroy(supply $supply ,$id)
    {

        supply::destroy($id);
        return 1;
    }
}
