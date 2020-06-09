<?php

namespace App\Http\Controllers;
use Auth;
/**
 * summary
 */
class BackController extends Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        $this->middleware(function($request, $next){
        	if (Auth::user()->groups != 3){
        		return redirect()->back()->with('error','Sai tên đăng nhập hoặc mật khẩu');
        	}else{
        		return $next($request);
        	}
        });
    }
}




 ?>
