<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class supply extends Model
{
   protected $table ='supply';
 	protected $fillable=[
 		'name','tax_code','address','phone','fax','email','explain',
 	];
}
