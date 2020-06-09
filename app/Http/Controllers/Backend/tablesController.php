<?php

namespace App\Http\Controllers\Backend;

use App\Models\tables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class tablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabs=tables::all();
        return View('tables.index',[
            'tabs'=>$tabs
        ]);       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tables.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3|max:50|unique:category'
            ],
            [
               'name.required' => 'Bạn chưa nhập dữ liệu',
               'name.min'=>'Tên quá ngắn. Nhập lại',
               'name.max'=>'Tên quá dài. Nhập lại',
               'name.unique'=>'Tên danh mục đã tồn tại',

           ]);
        // $img_name ="";
        // if ($request->hasFile('images')) {
        //     // $img_name = $request->file('images')->getClientOriginalName();
        // // $request->file('images')->move('uploads/products/',$img_name);
        // }
        
         if (tables::create([
            'name' => $request->name,
            
            // 'images'=>$img_name

        ]))
        {
            return redirect()->route('backend.tables')->with('success','Thêm mới thành công');
        }
        else
        {
            return redirect()->back()->with('error','Thêm thất bại!');
        }
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function show(tables $tables)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return View('tables.edit',[
            'model'=>tables::find($id)
        ]);    
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $model = tables::find($id);
        $this->validate($request,[
            'name'=> 'required',
        ], 
        [
            'name.required'=> 'Bạn chưa nhập tên',
            'name.unique' => 'Tên danh mục đã tồn tại'
        ]);
        if($model->update([
            'name' => $request->name,
            'status' => $request->status,
            
        ])){
            return redirect()->route('backend.tables')->with('success','Cập nhật thành công');
        }else{
            return redirect()->back()->with('error','Cập nhật thất bại, tên bàn đã tồn tại');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function destroy(tables $tables)
    {
         tables::destroy($id);
        return redirect()->route('backend.tables')->with('success','thanh cong');         }
}
