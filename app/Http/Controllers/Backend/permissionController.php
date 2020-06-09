<?php

namespace App\Http\Controllers\Backend;

use App\Models\permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(10);
        return View('permission.index',[
            'permissions'=>$permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required' => 'không được để trống',

        ]);
         if(permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name

        ])){
            return redirect()->route('backend.permission')->with('success','Thêm thành công');

        }
        else {
            return redirect()->back()->with('error','Thêm thất bại');
        }
    }
    public function show(permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        permission::destroy($id);
        return redirect()->route('backend.permission')->with('success','Xóa thành công');
    }

}
