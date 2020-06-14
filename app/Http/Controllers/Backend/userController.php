<?php

namespace App\Http\Controllers\Backend;

use App\Models\user;
use App\Models\role;
use App\Models\usersroles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = user::orderBy('status','DESC')->paginate(10);
        return view('user.index',[
             'users'=> $users

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create',[
            'user'=>user::all(),
            'roles'=>role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=> 'required|min:3|max:30|unique:user,username',
            'password'=> 'required|min:3|max:30',
            'password_rp' => 'same:password',
            'full_name' => 'required|min:3|max:50',
            'email' => 'required|unique:user,email',
            'address' => 'required',
            'phone' => 'required',
            'sex' => 'required',
        ],
        [
            'username.required'=> 'Chưa nhập tài khoản',
            'username.min'=> 'Tài khoản từ 3 đến 30 kí tự',
            'username.max'=> 'Tài khoản từ 3 đến 30 kí tự',
            'username.unique'=> 'Tài khoản đã tồn tại',
            'password.required'=> 'Chưa nhập mật khẩu',
            'password.min'=> 'Mật khẩu từ 3 đến 30 kí tự',
            'password.max'=> 'Mật khẩu từ 3 đến 30 kí tự',
            'password_rp.same'=> 'Nhập lại mật khẩu không đúng',
            'full_name.required'=> 'Bạn chưa nhập họ tên',
            'full_name.min'=> 'Họ tên từ 3 đến 50 kí tự',
            'full_name.max'=> 'Họ tên từ 3 đến 50 kí tự',
            'email.required'=> 'Bạn phải nhập email',
            'address.required'=> 'Bạn phải nhập địa chỉ',
            'phone.required'=> 'Bạn phải nhập số điện thoại',
            'sex.required'=> 'Chưa nhập giớ tính vui lòng nhập lại',
        ]);
            $user=user::Create([
                'username'=>$request->username,
                'password'=>bcrypt($request->password),
                'full_name'=>$request->full_name,
                'email'=>$request->email,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'sex'=>$request->sex,
                'status'=>1,
            ]);
            $roleID = $request->roleID;
            foreach($roleID as $roleID){
            usersroles::create([
                'user_id'=> $user->id,
                'role_id'=>$roleID
                ]);
            }
        return redirect()->route('backend.user')->with('success','Thêm nhân viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $user= user::where('username',$name)->first();
        return view('user.detail-user',[
            'user'=>$user
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit',[
            'model'=>user::find($id),
            'role'=>usersroles::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model=user::find($id);
        $this->validate($request,[
            'username'=> 'required|min:3|max:30',
            'full_name' => 'required|min:3|max:50',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'sex' => 'required',
        ],
        [
            'username.required'=> 'Chưa nhập tài khoản',
            'username.min'=> 'Tài khoản từ 3 đến 30 kí tự',
            'username.max'=> 'Tài khoản từ 3 đến 30 kí tự',
            'full_name.required'=> 'Bạn chưa nhập họ tên',
            'full_name.min'=> 'Họ tên từ 3 đến 50 kí tự',
            'full_name.max'=> 'Họ tên từ 3 đến 50 kí tự',
            'email.required'=> 'Bạn phải nhập email',
            'address.required'=> 'Bạn phải nhập địa chỉ',
            'phone.required'=> 'Bạn phải nhập số điện thoại',
            'sex.required'=> 'Chưa nhập giới tính vui lòng nhập lại',
        ]);
        if(
            $user=$model->update([
            'username'=>$request->username,
            'full_name'=>$request->full_name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'sex'=>$request->sex,
            'status'=>1,

        ])){
            return redirect()->route('backend.user')->with('success','Sửa thông tin nhân viên thành công');
        }
        else{
        return redirect()->back()->with('error','Sửa thất bại');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user ,$id)
    {

        User::destroy($id);
        return redirect()->route('backend.user');
    }
    public function search_user(Request $request){
        $name = $request->name;
        if($name != ''){
            $user = user::where('full_name','like','%'.$name.'%')->paginate(10);
            return view('user.index',[
                'users' => $user
            ]);
        }

    }
    public function edit_password($id){
        return view('user.change-password',[
            'model'=>user::find($id),
        ]);
    }

    public function updatePassword(Request $request, $id) {

         $model = user::find($id);
         $this->validate($request,[
             'oldPassword'=>'required',
             'newPassword'=> 'required|min:3|max:30',
             'password_rp' => 'same:newPassword',

        ],
        [
            'oldPassword.required'=> 'Chưa nhập mật khẩu cũ',
            'newPassword.required'=> 'Chưa nhập mật khẩu mới',
            'newPassword.min'=> 'Mật khẩu từ 6 đến 30 kí tự',
            'newPassword.max'=> 'Mật khẩu từ 6 đến 30 kí tự',
            'password_rp.same'=> 'Mật khẩu xác nhận phải trùng khớp',

        ]);

        if(Hash::check($request->oldPassword, Auth::guard('admin')->user()->password)) {

           if($request->newPassword == $request->password_rp) {
               $user = User::find(Auth::guard('admin')->user()->id);
               $user->password = bcrypt($request->newPassword);
               $user->save();
               Auth::logout();
               return redirect()->route('login')->with('success','Đổi mật khẩu thành công, Vui lòng đăng nhập lại!');
           }

           else {

               return redirect()->back()->with('error','Mật khẩu xác nhận phải trùng khớp');
           }

       }

       else {

           return redirect()->back()->with('error','Mật khẩu cũ không chính xác');
       }
    }

}
