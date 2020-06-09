<?php

namespace App\Http\Controllers\Backend;

use App\Models\Import;
use App\Models\Supply;
use App\Models\Employee;
use App\Models\Products;
use App\Models\Import_detail;
use App\Helper\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImportController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $cart)
    {
        $cart->clear();
        $import = Import::orderBy('created_at','DESC')->paginate(15);
        return view('import.index',[
            'import' => $import
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cart $cart, $s_id)
    {
        return view('import.create',[
            'cart'=>$cart,
            'supply'=>Supply::find($s_id)
        ]);
    }

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
            'id_supply'=>$request->s_id,
            'id_employee'=>$request->employee_id
        ]);
        foreach($cart->items as $item){
            Import_detail::create([
                'id_import'=> $import->id,
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
        return redirect()->route('backend.import')->with('success','Tạo hóa đơn thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $import= Import::find($id);
        $importDetails=Import::join('import_detail','import.id','=','import_detail.id_import')->where('import.id',$id)->select()->get();
        return view('import.detail',[
            'import'=>$import,
            'importDetails'=>$importDetails,


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {

        // $model = Order::find($id);
     //    $model->update([
     //     'status'=>$request->status
     //    ]);
     //     return redirect()->route('backend.order')->with('success','Lưu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $importDetail = Import_detail::where('id_import',$id)->get();
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
            return redirect()->route('backend.import')->with('success','Xóa thành công');
        }
    }

    public function search_supply(Request $request){
        $name = $request->name;
        if($name != ''){
            $supply = supply::where('name','like','%'.$name.'%')->get();
            return view('import.add-supply',[
                'supply' =>$supply
            ]);
        }
    }

    public function search_product($s_id,Cart $cart,Request $request){
        $s = Supply::find($s_id);
        $name = $request->name;
        if($name != ''){
            $product = products::where('name','like','%'.$name.'%')->paginate(10);
            return view('import.add-product',[
                'products' => $product,
                'cart'=>$cart,
                's'=> $s

            ]);
        }
    }


    public function add_product($s_id,Cart $cart)
    {
        $s = Supply::find($s_id);
        return view('import.add-product',[
            'cart'=>$cart,
            'products' =>Products::paginate(10),
            's'=> $s
        ]);
    }
    public function add_supply()
    {

        return view('import.add-supply',[
            'supply' =>Supply::paginate(10)
        ]);
    }

    // Giỏ hàng
    public function add_import($id, Cart $cart,$s_id){
        $product = Products::find($id)->toArray();
        $cart->add($product);
        return redirect()->route('backend.import-add-product',['s_id'=>$s_id])->with('success','Đã thêm vào giỏ hàng');
    }
    public function remove_import($id, Cart $cart,$s_id){
        $cart->remove($id);
        $pro = Products::find($id);
        return redirect()->route('backend.import-reciept',['s_id'=>$s_id])->with('success','Đã xóa '.$pro->name.' khỏi giỏ hàng');
    }

    public function clear_import(Cart $cart,$s_id){
        $cart->clear();
        return redirect()->route('backend.import-reciept',['s_id'=>$s_id])->with('success','Xóa giỏ hàng thành công');
    }

    public function update_import(Cart $cart,Request $request){
        $quantity = $request->quantity ? $request->quantity : 1;
        $price = $request->price ? $request->price : 1000;
        if($request->id){
            $cart->update($request->id,$request->price,$quantity);
            return redirect()->route('backend.import-reciept',['s_id'=>$request->s_id])->with('success','Cập nhật thành công');
        }
    }

    public function reciept($s_id,Cart $cart){
        $supply = Supply::find($s_id);
        return view('import.reciept',[
            'cart'=>$cart,
            'supply' => $supply
        ]);
    }
    public function get_import_date(Request $request){
         $date = $request->date;
         $import= import::whereDate('created_at',$date)->paginate(10);
         return view('import.index',[
             'import'=>$import
         ]);
    }
    public function get_import_month(Request $request){
         $month = $request->month;
         $import= import::whereMonth('created_at',$month)->paginate(10);
         return view('import.index',[
             'import'=>$import
         ]);
    }
}
