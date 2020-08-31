<?php

namespace App\Http\Controllers\Backend;

use App\Models\supply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class supplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supply=supply::orderBy('created_at','DESC')->paginate(15);
        return view('supply.index',[
            'supplys'=>$supply
        ]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supply.create',[
            'supply'=>supply::all(),
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
            'name'=>'min:3|max:100|required|unique:supply,name',
            'phone' => 'min:7|max:20|required|unique:supply,phone',
            'tax_code' => 'min:3|max:20|required|unique:supply,tax_code',
            'fax' => 'min:3|max:50|required|unique:supply,fax',
            'email' => 'min:3|max:50|required|unique:supply,email',
            'explain' => 'min:3|max:500|required',
            'address' => 'min:3|max:100|required'
        ],
        [
            'name.required'=>'Chưa nhập tên nhà cung cấp, vui lòng nhập tên nhà cung cấp',
            'name.min'=>'Tên quá ngắn. Nhập lại',
            'name.max'=>'Tên quá dài. Nhập lại',
            'name.unique'=> 'Tên nhà cung cấp đã tồn tại',
            'phone.min'=>'Nhập sai số điện thoại',
            'phone.max'=>'Nhập sai số điện thoại',
            'phone.unique'=> 'Số điện thoại nhà cung cấp đã tồn tại',
            'phone.required'=> 'Vui lòng nhập số điện thoại',
            'fax.min'=>'Nhập sai số fax',
            'fax.max'=>'Nhập sai số fax',
            'fax.unique'=> 'Số fax nhà cung cấp đã tồn tại, vui lòng nhập lại',
            'fax.required'=> 'Vui lòng nhập lại',
            'email.min'=>'Email quá ngắn.Vui lòng nhập lại',
            'email.max'=>'Email quá dài. Vui lòng nhập lại',
            'email.unique'=> 'Email nhà cung cấp đã tồn tại',
            'email.required'=> 'Chưa nhập email. Nhập lại',
            'explain.min'=>'Tên quá ngắn. Nhập lại',
            'explain.max'=>'Tên quá dài. Nhập lại',
            'explain.required'=> 'Chưa nhập. Nhập lại',
            'address.min'=>'Tên quá ngắn. Nhập lại',
            'address.max'=>'Tên quá dài. Nhập lại',
            'address.required'=> 'Chưa nhập địa chỉ. Nhập lại',


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
            return redirect()->route('backend.supply')->with('success','Cập nhật thông tin nhà cung cấp thành công');
        }
        else{
            return redirect()->back()->with('error','Cập nhật thông tin thất bại');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View('supply.edit',[
            'model'=>supply::find($id)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = supply::find($id);
        $this->validate($request,[
            'name'=>'min:3|max:100|required',
            'phone' => 'min:7|max:20|required',
            'tax_code' => 'min:3|max:20|required',
            'fax' => 'min:3|max:50|required',
            'email' => 'min:3|max:50|required',
            'explain' => 'min:3|max:500|required',
            'address' => 'min:3|max:100|required'
        ],
        [
            'name.required'=>'Chưa nhập tên nhà cung cấp, vui lòng nhập tên nhà cung cấp',
            'name.min'=>'Tên quá ngắn. Nhập lại',
            'name.max'=>'Tên quá dài. Nhập lại',

            'phone.min'=>'Nhập sai số điện thoại',
            'phone.max'=>'Nhập sai số điện thoại',

            'phone.required'=> 'Vui lòng nhập số điện thoại',
            'fax.min'=>'Nhập sai số fax',
            'fax.max'=>'Nhập sai số fax',

            'fax.required'=> 'Vui lòng nhập lại',
            'email.min'=>'Email quá ngắn.Vui lòng nhập lại',
            'email.max'=>'Email quá dài. Vui lòng nhập lại',

            'email.required'=> 'Chưa nhập email. Nhập lại',
            'explain.min'=>'Tên quá ngắn. Nhập lại',
            'explain.max'=>'Tên quá dài. Nhập lại',
            'explain.required'=> 'Chưa nhập. Nhập lại',
            'address.min'=>'Tên quá ngắn. Nhập lại',
            'address.max'=>'Tên quá dài. Nhập lại',
            'address.required'=> 'Chưa nhập địa chỉ. Nhập lại',
        ]);
        if($model->update([
            'name' => $request->name,
            'tax_code'=>$request->tax_code,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'fax'=>$request->fax,
            'email'=>$request->email,
            'explain'=>$request->explain

        ])){
            return redirect()->route('backend.supply')->with('success','Cập nhật thông tin nhà cung cấp thành công');
        }
        else{
            return redirect()->back()->with('error','Cập nhật thông tin thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        supply::destroy($id);
        return redirect()->route('backend.supply');
    }

    public function search_supply(Request $request){
        $name = $request->name;
        if($name != ''){
            $supply = supply::where('name','like','%'.$name.'%')->paginate(10);
            return view('supply.index',[
                'supplys' => $supply
            ]);
        }

    }
}
