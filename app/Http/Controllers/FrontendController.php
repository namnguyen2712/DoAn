<?php
namespace App\Http\Controllers;

use View;
use Auth;
use DB;
// use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Category;
use App\Models\Products;
 use App\Helper\Cart;
 use Illuminate\Http\Request;
 use App\Models\User;
 use App\Models\Nation;
 use App\Models\Customer;
 use App\Models\Order;

 use Illuminate\Support\Facades\Hash;
// use App\Models\contact;
// use App\Models\banner;


class FrontendController extends Controller
{
    /**
     * summary
     */

    public function index()
    {
        $pro_top=products::orderBy('created_at','DESC')->limit(6)->get();
        $pro=products::orderBy('quantity','DESC')->limit(6)->get();
        return view('frontend.index',[
            'pro'=>$pro,
            'pro_top'=>$pro_top
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function category($id)
    {
       $pro=Products::join('category','products.cat_id','=','category.id')->where('products.cat_id','=',$id)->select('products.*')->paginate(10);
       $cat= category::find($id);

       return view('frontend.category',[
        'products'=>$pro,
        'cat'=>$cat
    ]);

   }
    public function nation($id)
    {
       $pro=Products::join('nation','products.nation_id','=','nation.id')->where('products.nation_id','=',$id)->select('products.*')->paginate(10);
       $nation= nation::find($id);

       return view('frontend.nation',[
        'products'=>$pro,
        'nation'=>$nation
    ]);

   }

    public function product()
    {
       $pro=Products::paginate(20);
       return view('frontend.product',[
        'products'=>$pro
    ]);

   }

   public function login()
   {
    return view('frontend.login');

}
public function postLogin(Request $request)
{

    $credentials = array('phone'=>$request->phone, 'password'=>$request->password);
       if(Auth::attempt($credentials)){
            return redirect()->route('home')->with('success','Đăng nhập thành công!');
       }
       else{
        return redirect()->route('login')->with('error','Đăng nhập thất bại!');
       }




}
public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

public function detailpro($id){
    $pro= products::find($id);
    return view('frontend.detailproduct',[
        'pro'=>$pro
    ]);
}


public function search(Request $request){
    $key = $request->key;
    if($key != ''){
        $product = DB::table('products')->where('name','like','%'.$key.'%')->get();
        return view('frontend.search',[
            'products'=>$product
        ]);
    }
}
public function pricedesc(){
    $pro=products::orderBy('price','DESC')->paginate(10);
    return view('frontend.product',[
        'products'=>$pro
    ]);
}
public function priceasc(){
    $pro=products::orderBy('price','ASC')->paginate(10);
    return view('frontend.product',[
        'products'=>$pro
    ]);
}
public function nameasc(){
    $pro=products::orderBy('name','ASC')->paginate(10);
    return view('frontend.product',[
        'products'=>$pro
    ]);
}
public function namedesc(){
    $pro=products::orderBy('name','DESC')->paginate(10);
    return view('frontend.product',[
        'products'=>$pro
    ]);
}
public function history_order(){
    $order = Order::where('cus_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
    return view('frontend.history-order',[
       'order' =>$order
   ]);
}
public function edit_password($id){
    return view('frontend.change-password',[
        'model'=>Customer::find($id),
    ]);
}
public function order_detail($id){
    $order= Order::find($id);
    $orderDetails=Order::join('order_detail','order.id','=','order_detail.order_id')->where('order.id',$id)->select()->get();
    return view('frontend.order-detail',[
        'order'=>$order,
        'orderDetails'=>$orderDetails,
    ]);
}
public function updatePassword(Request $request, $id) {

     $model = Customer::find($id);
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

    if(Hash::check($request->oldPassword, Auth::user()->password)) {

       if($request->newPassword == $request->password_rp) {
           $user = Customer::find(Auth::user()->id);
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


?>
