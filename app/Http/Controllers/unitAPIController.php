<?php

namespace App\Http\Controllers;

use App\Models\unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class unitAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return unit::all();


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

        
         if(unit::Create([
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
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(unit $unit)
    {
        return unit::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $model = unit::find($id);
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
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        unit::destroy($id);
        return 1;

    }
}
