<?php

namespace App\Http\Controllers\Backend;

use App\Models\nation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class nationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $nation=nation::all();
        return View('nation.index',[
            'nation'=>$nation
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return View('nation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function show(nation $nation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return View('nation.edit',[
            'model'=>nation::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nation $nation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function destroy(nation $nation)
    {
        //
    }
}
