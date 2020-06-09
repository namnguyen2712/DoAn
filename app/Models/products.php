<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
   protected  $table = 'products';

    protected $fillable = [
    	'name','slug','images1','images2','cat_id','unit_id','review','price','ingredient','content','uses','using','attention','status','quantity','nation_id'
    ];
}
