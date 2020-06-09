<?php 
namespace App\Http\Controllers;

use View; 
use Auth;
// use App\Models\Order;
// use App\Models\Order_detail;
use App\Models\Category;
use App\Models\Products;
use App\Helper\Cart;
use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\contact;
// use App\Models\banner;


class FrontendAPIController extends Controller
{
    /**
     * summary
     */
    
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function category()
    {
     return Products::join('category','products.cat_id','=','category.id')->select('products.*')->get();
    }

public function detailpro($id){
    $pro= products::find($id);
    return view('frontend.detailproduct',[
        'pro'=>$pro
    ]);
}

}


?>