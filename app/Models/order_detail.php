<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    protected $table ='order_detail';
 	protected $fillable=[
 		'order_id','pro_id','tab_id','quantity','price'
 	];}
