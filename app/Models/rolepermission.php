<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class rolepermission extends Authenticatable
{
    protected $table ='roles_permissions';
 	protected $fillable = [
        'role_id','permission_id'
    ];


}
