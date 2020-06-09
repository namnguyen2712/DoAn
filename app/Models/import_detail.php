<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class import_detail extends Model
{
    protected $table ='import_detail';
 	protected $fillable=[
 		'id_import','pro_id','quantity','price'
 	];}
