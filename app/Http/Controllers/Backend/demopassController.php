<?php 
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


/**
* 
*/
class demopassController extends Controller
{
    public function index()
    {
        return view('demopass.demopass');
    }   
}

?>