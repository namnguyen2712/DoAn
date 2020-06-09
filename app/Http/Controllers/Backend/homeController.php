<?php 
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


/**
* 
*/
class homeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }   
}

?>