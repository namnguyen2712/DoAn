<?php
namespace App\Http\Controllers;

use View;
 use Auth;
 use DB;
// use App\Models\Order;
// use App\Models\Order_detail;
use App\Models\Category;
use App\Models\Products;
 use App\Helper\Cart;
 use Illuminate\Http\Request;
 use App\Models\User;
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
    if(Auth::attempt($request->only('username','password'),$request->has('remember'))) {

        return redirect()->route('home')->with('success','Chào mừng trở lại');

    }
    else{
        return redirect()->back()->with('error','Sai tên đăng nhập hoặc mật khẩu');
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
}


?>
