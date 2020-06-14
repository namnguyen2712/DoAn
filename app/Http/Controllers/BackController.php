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
        
        $this->middleware(function($request, $next, $guard = 'admin' ){
        	if (Auth::guard($guard)->check()){
        		return redirect()->route('backend');
        	}else{
        		return $next($request);
        	}
        });
    }
}




 ?>
