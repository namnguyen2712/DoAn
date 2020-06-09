<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class usersroles extends Authenticatable
{
    protected $table ='user_roles';
 	protected $fillable = [
        'user_id','role_id'
    ];


}
