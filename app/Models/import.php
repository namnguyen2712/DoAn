<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class import extends Model
{
    protected $table ='import';
 	protected $fillable=[
 		'sum','id_employee','id_supply'
 	];
}
