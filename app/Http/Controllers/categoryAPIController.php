<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class categoryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return category::all();


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
         if(Category::Create([
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
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return category::find($id);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $model = Category::find($id);
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
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $products= DB::table('products')->where('cat_id',$id)->count('*');
        if ($products == 0) {
            Category::destroy($id);
            return 1;
       }else{
           return 0;

       }

    }
}
