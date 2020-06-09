<?php

namespace App\Http\Controllers\Backend;

use App\Models\role;
use App\Models\usersroles;
use App\Models\user;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return View('role.index',[
            'role'=>$role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
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
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required' => 'không được để trống',

        ]);
         if(role::create([
            'name' => $request->name

        ])){
            return redirect()->route('backend.role')->with('success','Thêm thành công');

        }
        else {
            return redirect()->back()->with('error','Thêm thất bại');
        }
    }
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        role::destroy($id);
        return redirect()->route('backend.role')->with('success','Xóa thành công');
    }
    public function add_user($r_id)
    {
        $r=role::find($r_id);
        return view('role.add-user',[
            'user'=>user::all(),
            'r'=>$r
        ]);
    }

    public function info_user_role($id)
    {
        $user=usersroles::where('role_id',$id)->get();
        return view('role.info-role',[
            'users'=>$user
        ]);
    }

    public function post_user($r_id,$user_id)
    {
        DB::table('user_roles')->where('user_id',$user_id)->delete();
        usersroles::create([
            'role_id'=>$r_id,
            'user_id'=>$user_id
        ]);
        return redirect()->route('backend.role')->with('success','Thêm thành công');
    }

}
