<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
 	protected $table ='customer';
 	protected $fillable=[
 		'name','sex','address','phone','email'
 	];
}
