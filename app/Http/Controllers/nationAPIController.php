<?php

namespace App\Http\Controllers;

use App\Models\nation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class nationAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return nation::all();


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

        $this->validate($request,
             [
                'name' => 'required|min:3|max:50|unique:category'
            ],
            [
               'name.required' => 'Bạn chưa nhập dữ liệu',
               'name.min'=>'Tên quá ngắn. Nhập lại',
               'name.max'=>'Tên quá dài. Nhập lại',
               'name.unique'=>'Tên danh mục đã tồn tại'

           ]);
         if(nation::Create([
             'name' => $request->name,
        ]))
         {
            return 1;
        }
        else{
            return 0;
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function show(nation $nation)
    {
        return nation::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $model = nation::find($id);
        $this->validate($request,[
            'name'=> 'required',
        ], [
            'name.required'=> 'Bạn chưa nhập tên',

        ]);
        if($model->update([
            'name' => $request->name,

        ])){
            return 1;
        }else{
            return 0;
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        nation::destroy($id);
        return 1;

    }
}
