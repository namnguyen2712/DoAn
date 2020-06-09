<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\category;
use App\Models\unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class productsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return products::join('category','category.id','=','products.cat_id')->select(
       	'products.*','category.name as catname')->get();

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
        $this->validate($request,[
            'price'=>'required',
        ],
        [
            'price.required'=> 'Vui lòng nhập giá sản phẩm',
        ]);
        $img_name = $request->file('images1')->getClientOriginalName();
        $request->file('images1')->move('public/img/',$img_name);
         if(products::Create([

            'name'=> $request->name,
            'price'=> $request->price,
            'cat_id'=> $request->cat_id,
            'unit_id'=>$request->unit_id,
            'images1'=>$img_name,
            'images2'=>$request->images2,
            'ingredient'=>$request->ingredient,
            'uses'=>$request->uses,
            'content'=>$request->content,
            'using'=>$request->using,
            'attention'=>$request->attention,
            'nation_id'=>$request->nation_id,
            'status'=>1,
            'quantity'=>0,

        ])){
            return 1;
        }
        else{
            return 0;
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        return products::find($id);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $model = Products::find($id);
        $this->validate($request,[

        ],
        [


        ]);

        if ($model->update([
            'name'=> $request->name,
            'price'=> $request->price,
            'cat_id'=> $request->cat_id,
            'images1'=>$request->images1,
            'images2'=>$request->images2,
            'ingredient'=>$request->ingredient,
            'uses'=>$request->uses,
            'content'=>$request->content,
            'using'=>$request->using,
            'attention'=>$request->attention,
            'unit_id'=>$request->unit_id,
            'nation_id'=>$request->nation_id,
            'status'=>$request->status

        ]))
        {
            return 1;
        }

        else{
            return 0;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        products::destroy($id);
        return 1;

    }
}
