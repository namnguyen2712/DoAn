<?php

namespace App\Http\Controllers\Backend;

use App\Models\order;
use App\Models\Supply;
use App\Models\customer;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Products;
use App\Models\User;
use App\Models\order_detail;
use App\Helper\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class orderController extends Controller
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
        $order = order::orderBy('created_at','DESC')->paginate(15);
        return view('order.index',[
            'order' => $order
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Cart $cart, $s_id)
    {
        return view('order.create',[
            'cart'=>$cart,
            'customer'=>customer::find($s_id)
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
        $check = 1;
        foreach($cart->items as $item){
            $pro = Products::find($item['id']);
            if($pro->quantity < $item['quantity']){
                $check = 0;
                return redirect()->back()->with('error',$pro->name.' trong kho không đủ để bán hàng');
            }

        else{
            $check=1;
            $pro_quanti = $pro->quantity - $item['quantity'];
            $pro->update([
                'quantity' => $pro_quanti,
                'status'=>'1'
            ]);
        }
        }
        if($check=1){
            $order = order::create([
                'sum'=>$request->sum,
                'cus_id'=>$request->s_id,
                'employee_id'=>$request->employee_id,
                'type'=>$request->type

            ]);
            foreach($cart->items as $item){
                order_detail::create([
                    'order_id'=> $order->id,
                    'pro_id'=> $item['id'],
                    'quantity'=> $item['quantity'],
                    'price'=> $item['price']
                ]);
            }
        }

        session(['cart'=>[]]);
        return redirect()->route('backend.order')->with('success','Tạo hóa đơn thành công');

    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Order  $order
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $order= Order::find($id);
        $orderDetails=Order::join('order_detail','order.id','=','order_detail.order_id')->where('order.id',$id)->select()->get();
        return view('order.detail',[
            'order'=>$order,
            'orderDetails'=>$orderDetails,


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
        $orderDetail = order_detail::where('order_id',$id)->get();
        $check = 1;
        foreach ($orderDetail as $impd) {
            $pro = Products::find($impd->pro_id);
            if($pro->quantity < $impd->quantity){
                $check = 0;
                return redirect()->back()->with('error',$pro->name.' trong kho không đủ để trả lại nhà cung cấp');
            }
        }
        if($check == 1){
            foreach ($orderDetail as $impd) {
                $pro = Products::find($impd->pro_id);
                $pro_quanti = $pro->quantity + $impd->quantity;
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
                order_detail::destroy($impd->id);
            }
            order::destroy($id);
            return redirect()->route('backend.order')->with('success','Xóa thành công');
        }
    }

    public function search_product($s_id,Cart $cart,Request $request){
        $s = customer::find($s_id);
        $name = $request->name;
        if($name != ''){
            $product = products::where('name','like','%'.$name.'%')->paginate(10);
            return view('order.add-product',[
                'products' => $product,
                'cart'=>$cart,
                's'=> $s

            ]);
        }
    }
    public function add_product($s_id,Cart $cart)
    {
        $s = customer::find($s_id);
        return view('order.add-product',[
            'cart'=>$cart,
            'products' =>Products::paginate(10),
            's'=> $s
        ]);
    }
    public function add_supply()
    {

        return view('order.add-supply',[
            'customer' =>customer::paginate(10)
        ]);
    }
    public function search_customer(Request $request){
        $phone = $request->phone;
        if($phone != ''){
            $customer = customer::where('phone','like','%'.$phone.'%')->get();
            return view('order.add-supply',[
                'customer' =>$customer
            ]);
        }
    }

    // Giỏ hàng
    public function add_order($id, Cart $cart,$s_id){
        $product = Products::find($id)->toArray();
        $cart->add($product,$product['price']);
        return redirect()->route('backend.order-add-product',['s_id'=>$s_id])->with('success','Đã thêm vào giỏ hàng');
    }
    public function remove_order($id, Cart $cart,$s_id){
        $cart->remove($id);
        $pro = Products::find($id);
        return redirect()->route('backend.order-reciept',['s_id'=>$s_id])->with('success','Đã xóa '.$pro->name.' khỏi giỏ hàng');
    }

    public function clear_order(Cart $cart,$s_id){
        $cart->clear();
        return redirect()->route('backend.order-reciept',['s_id'=>$s_id])->with('success','Xóa giỏ hàng thành công');
    }

    public function update_order(Cart $cart,Request $request){
        $quantity = $request->quantity ? $request->quantity : 1;
        $price = $request->price ? $request->price : 1000;
        if($request->id){
            $cart->update($request->id,$request->price,$quantity);
            return redirect()->route('backend.order-reciept',['s_id'=>$request->s_id]);
        }
    }

    public function reciept($s_id,Cart $cart){
        $customer = customer::find($s_id);
        return view('order.reciept',[
            'cart'=>$cart,
            'customer' => $customer
        ]);
    }
    public function get_order_date(Request $request){
         $date = $request->date;
         $orrder= order::whereDate('created_at',$date)->paginate(10);
         return view('order.index',[
             'order'=>$orrder
         ]);
    }
    public function get_order_month(Request $request){
         $month = $request->month;
         $order= order::whereMonth('created_at',$month)->paginate(10);
         return view('order.index',[
             'order'=>$order
         ]);
    }
    public function search_customer_order(Request $request){
        $phone_customer = $request->phone_customer;
        if($phone_customer != ''){
            $customer=customer::where('phone','like','%'.$phone_customer.'%')->select('id')->first()->toArray();
            $order=order::where('cus_id',$customer)->paginate(10);
            return view('order.index',[
                'order'=>$order
            ]);
        }
    }
    public function search_employee_order(Request $request){
        $name_employee = $request->name_employee;
        if($name_employee != ''){
            $employee=user::where('username','like','%'.$name_employee.'%')->select('id')->first()->toArray();
            $order=order::where('employee_id',$employee)->paginate(10);
            return view('order.index',[
                'order'=>$order
            ]);
        }
    }
    public function search_order(Request $request){
        $id = $request->id;
        if($id != ''){
            $order=order::where('id',$id)->paginate(1);

            return view('order.index',[
                'order'=>$order
            ]);
        }
    }

}
