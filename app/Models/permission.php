<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class permission extends Authenticatable
{
    protected $table ='permissions';
 	protected $fillable = [
        'name','display_name'
    ];


}
