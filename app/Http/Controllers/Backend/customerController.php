<?php

namespace App\Http\Controllers\Backend;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $customers = customer::orderBy('id')->orderBy('id','DESC')->paginate(10);
        return view('customer.index',[
             'customers'=> $customers

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create',[
            'customers'=>customer::all(),
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
            'name'=> 'required|min:3|max:30',
            'email' => 'required|unique:customer,email',
            'address' => 'required',
            'phone' => 'required|unique:customer,phone',
            'sex' => 'required',
        ],
        [
            'name.required'=> 'Chưa nhập tài khoản',
            'name.min'=> 'Tài khoản từ 3 đến 30 kí tự',
            'name.max'=> 'Tài khoản từ 3 đến 30 kí tự',
            'name.unique'=> 'Tài khoản đã tồn tại',
            'email.required'=> 'Bạn phải nhập email',
            'address.required'=> 'Bạn phải nhập địa chỉ',
            'phone.required'=> 'Bạn phải nhập số điện thoại',
            'phone.unique'=> 'Số điện thoại đã tồn tại',
            'sex.required'=> 'Bạn phải nhập giới tính',
        ]);
        if(customer::Create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'sex'=>$request->sex,
            'password'=>bcrypt($request->phone),

        ])){
            return redirect()->route('backend.customer')->with('success','Thêm mới khách hàng thành công');
        }
        else{
            return redirect()->back()->with('error','Thêm thất bại');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View('customer.edit',[
            'model'=>customer::find($id)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = customer::find($id);
        $this->validate($request,[
            'name'=> 'required|min:3|max:30',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'sex' => 'required',
        ],
        [
            'name.required'=> 'Chưa nhập tài khoản',
            'name.min'=> 'Tài khoản từ 3 đến 30 kí tự',
            'name.max'=> 'Tài khoản từ 3 đến 30 kí tự',
            'email.required'=> 'Bạn phải nhập email',
            'address.required'=> 'Bạn phải nhập địa chỉ',
            'phone.required'=> 'Bạn phải nhập số điện thoại',
            'sex.required'=> 'Bạn phải nhập giới tính',
        ]);
        if($model->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'sex'=>$request->sex,

        ])){
            return redirect()->route('backend.customer')->with('success','Cập nhật thông tin khách hàng thành công');
        }
        else{
            return redirect()->back()->with('error','Cập nhật thất bại');
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
        return redirect()->route('backend.customer');
    }

    public function search_customer(Request $request){
        $name = $request->name;
        if($name != ''){
            $customer = customer::where('name','like','%'.$name.'%')->paginate(10);
            return view('customer.index',[
                'customers' => $customer
            ]);
        }

    }
}
