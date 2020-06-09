<?php

namespace App\Http\Controllers;

use App\Models\import;
use App\Models\products;

use Illuminate\Http\Request;
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
    public function store(Request $request,$s_id,Cart $cart)
    {
        
        
        $import = Import::create([
            'sum'=>$request->sum,
            'supply_id'=>$request->s_id,
            'employee_id'=>$request->employee_id
        ]);
        foreach($cart->items as $item){
            Import_detail::create([
                'import_id'=> $import->id,
                'pro_id'=> $item['id'],
                'quantity'=> $item['quantity'],
                'price'=> $item['price']
            ]);
            $pro = Products::find($item['id']);
            $pro_quanti = $pro->quantity + $item['quantity'];
            $pro->update([
                'quantity' => $pro_quanti,
                'status'=>'1'
            ]);
        }
        session(['cart'=>[]]);
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return category::find($id);   
    }

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
        $importDetail = Import_detail::where('import_id',$id)->get();
        $check = 1;
        foreach ($importDetail as $impd) {
            $pro = Products::find($impd->pro_id);
            if($pro->quantity < $impd->quantity){
                $check = 0;
                return redirect()->back()->with('error',$pro->name.' trong kho không đủ để trả lại nhà cung cấp');
            }
        }
        if($check == 1){
            foreach ($importDetail as $impd) {
                $pro = Products::find($impd->pro_id);
                $pro_quanti = $pro->quantity - $impd->quantity;
                if ($pro_quanti == 0) {
                    $pro->update([
                        'quantity'=> '0',
                        'status'=> '2'
                    ]);
                }
                else{
                    $pro->update([
                        'quantity'=> $pro_quanti
                    ]);
                }
                Import_detail::destroy($impd->id);
            }
            Import::destroy($id);
            return 1;
        }
       
    }
}
