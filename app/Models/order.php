<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table ='order';
 	protected $fillable=[
 		'sum','cus_id','type','employee_id'
 	];}
