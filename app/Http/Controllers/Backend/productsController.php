<?php

namespace App\Http\Controllers\Backend;

use App\Models\products;
use App\Models\category;
use App\Models\images;
use App\Models\unit;
use App\Models\nation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',[
            'products' => products::orderBy('cat_id')->paginate(10),
            'cats'=>category::all(),
            'units'=>unit::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('products.create',[
            'products' => products::all(),
            'cats'=>category::all(),
            'units'=>unit::all(),
            'nations'=>nation::all(),


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
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:100|unique:products,name',
            'images1'=>'required',
            'ingredient'=>'required|min:3',
            'uses'=>'required|min:3',
            'content'=>'required|min:3',
            'using'=>'required|min:3',
            'attention'=>'required|min:3',
            'price'=>'required',
        ],
        [
            'name.required'=>'Chưa nhập tên sản phẩm, vui lòng nhập tên sản phẩm',
            'name.min'=>'Tên quá ngắn, vui lòng nhập lại',
            'name.unique'=>'Tên sản phẩm đã tồn tại, vui lòng nhập lại',
            'ingredient.required'=>'Chưa nhập thành phần sản phẩm, vui lòng nhập lại',
            'ingredient.min'=>'Dữ liệu quá ngắn, vui lòng nhập lại',
            'uses.required'=>'Chưa nhập công dụng sản phẩm, vui lòng nhập lại',
            'uses.min'=>'Dữ liệu quá ngắn, vui lòng nhập lại',
            'content.required'=>'Chưa nhập hàm lượng sản phẩm, vui lòng nhập lại',
            'content.min'=>'Dữ liệu quá ngắn, vui lòng nhập lại',
            'using.required'=>'Chưa nhập cách sử dụng sản phẩm, vui lòng nhập lại',
            'using.min'=>'Dữ liệu quá ngắn, vui lòng nhập lại',
            'attention.required'=>'Chưa nhập mục chú ý sản phẩm, vui lòng nhập lại',
            'attention.min'=>'Dữ liệu quá ngắn, vui lòng nhập lại',
            'price.required'=> 'Vui lòng nhập giá sản phẩm',
        ]);
        $img_name1 = $request->file('images1')->getClientOriginalName();
        $request->file('images1')->move('public/img/',$img_name1);
        $img_name2 = $request->file('images2')->getClientOriginalName();
        $request->file('images2')->move('public/img/',$img_name2);
         if(products::Create([

            'name'=> $request->name,
            'price'=> $request->price,
            'cat_id'=> $request->cat_id,
            'unit_id'=>$request->unit_id,
            'images1'=>$img_name1,
            'images2'=>$img_name2,
            'ingredient'=>$request->ingredient,
            'uses'=>$request->uses,
            'content'=>$request->content,
            'using'=>$request->using,
            'attention'=>$request->attention,
            'nation_id'=>$request->nation_id,
            'status'=>1,
            'quantity'=>0,

        ])){
            return redirect()->route('backend.products')->with('success','Thêm sản phẩm thành công');
        }
        else{
        return redirect()->back()->with('error','Thêm thất bại');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit',[
            'model' => products::find($id),
            'cats'=>category::all(),
            'units'=>unit::all(),
            'nations'=>nation::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $model = Products::find($id);
        $this->validate($request,[
            'name'=>'required|min:3|max:100',
            'images1'=>'required',
            'ingredient'=>'required|min:3',
            'uses'=>'required|min:3',
            'content'=>'required|min:3',
            'using'=>'required|min:3',
            'attention'=>'required|min:3',
            'price'=>'required',
        ],
        [
            'name.required'=>'Chưa nhập tên sản phẩm, vui lòng nhập tên sản phẩm',
            'name.min'=>'Tên quá ngắn, vui lòng nhập lại',
            'ingredient.required'=>'Chưa nhập thành phần sản phẩm, vui lòng nhập lại',
            'ingredient.min'=>'Dữ liệu quá ngắn, vui lòng nhập lại',
            'uses.required'=>'Chưa nhập công dụng sản phẩm, vui lòng nhập lại',
            'uses.min'=>'Dữ liệu quá ngắn, vui lòng nhập lại',
            'content.required'=>'Chưa nhập hàm lượng sản phẩm, vui lòng nhập lại',
            'content.min'=>'Dữ liệu quá ngắn, vui lòng nhập lại',
            'using.required'=>'Chưa nhập cách sử dụng sản phẩm, vui lòng nhập lại',
            'using.min'=>'Dữ liệu quá ngắn, vui lòng nhập lại',
            'attention.required'=>'Chưa nhập mục chú ý sản phẩm, vui lòng nhập lại',
            'attention.min'=>'Dữ liệu quá ngắn, vui lòng nhập lại',
            'price.required'=> 'Vui lòng nhập giá sản phẩm',
        ]);
        $img_name1 = $request->file('images1')->getClientOriginalName();
        $request->file('images1')->move('public/img/',$img_name1);
        $img_name2 = $request->file('images2')->getClientOriginalName();
        $request->file('images2')->move('public/img/',$img_name2);
        if ($model->update([
            'name'=> $request->name,
            'price'=> $request->price,
            'cat_id'=> $request->cat_id,
            'images1'=>$img_name1,
            'images2'=>$img_name2,
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
            return redirect()->route('backend.products')->with('success','Sửa sản phẩm thành công');
        }
        else{
        return redirect()->back()->with('success','Sửa thất bại');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function delete($id)
     {
         products::destroy($id);
         return redirect()->route('backend.products');
     }
     public function report()
    {
        $product= products::orderBy('quantity','DESC')->where('quantity','>',0)->get();
        return view('products.report',[
            'products'=>$product,
            'cats'=>category::all(),
        ]);
    }

     public function search_product(Request $request){
         $name = $request->name;
         if($name != ''){
             $product = products::where('name','like','%'.$name.'%')->paginate(10);
             return view('products.index',[
                 'products' => $product,
                 'cats'=>category::all(),
                 'units'=>unit::all(),
             ]);
         }

     }
     public function pricedesc(){
         $pro=products::orderBy('price','DESC')->paginate(10);
         return view('products.index',[
             'products'=>$pro
         ]);
     }
     public function priceasc(){
         $pro=products::orderBy('price','ASC')->paginate(10);
         return view('products.index',[
             'products'=>$pro
         ]);
     }
     public function nameasc(){
         $pro=products::orderBy('name','ASC')->paginate(10);
         return view('products.index',[
             'products'=>$pro
         ]);
     }
     public function namedesc(){
         $pro=products::orderBy('name','DESC')->paginate(10);
         return view('products.index',[
             'products'=>$pro
         ]);
     }
}
