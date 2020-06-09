<?php

namespace App\Http\Controllers\Backend;

use App\Models\rolepermission;
use App\Models\role;
use App\Models\permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class role_permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($r_id)
    {
        return view('role_permission.createRole',[
            'permissions'=>permission::all(),
        ]);
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
     * @param  \App\Models\role_permission  $role_permission
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request,$r_id)
    {
         $dataPermission = $request->permissionID;
         foreach($dataPermission as $permissionID ){
             rolepermission::create([
                'role_id' => $request->r_id,
                'permission_id'=>$permissionID
            ]);
         }
         return redirect()->route('backend.user')->with('success','Lưu thành công');
    }
    public function show(role_permission $role_permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role_permission  $role_permission
     * @return \Illuminate\Http\Response
     */
    public function edit($r_id)
    {
        $role = Role::find($r_id);
       $listPermission = Permission::all();
       $permissionID = rolepermission::where('role_id',$r_id)->pluck('permission_id');
       $data = [
        'role'=>$role,
        'listPermission'=>$listPermission,
        'permissionID' => $permissionID
    ];
    return view('role_permission.edit-role',$data);

    }



    public function update($r_id,Request $request)
    {


        $role = Role::find($r_id);
        $dataRole = $request->only('name');
        $role->update($dataRole);

        $listPermission = $request->permissionID;
        rolepermission::where('role_id',$r_id)->delete();
        foreach($listPermission as $permissionID){
            rolepermission::create([
                'role_id'=>$role->id,
                'permission_id' =>$permissionID
            ]);
        }
        return redirect()->route('backend.add-role');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role_permission  $role_permission
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role_permission  $role_permission
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        role_permission::destroy($id);
        return redirect()->route('backend.role_permission')->with('success','Xóa thành công');
    }

    public function add_role()
    {

        return view('role_permission.add-role',[
            'roles' =>role::all()
        ]);
    }

}
