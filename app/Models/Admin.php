<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Spatie\Permission\Traits\HasRoles;

class Admin extends User
{
    use HasRoles;
    //数据库允许字段
    protected $fillable=['username','password'];
    protected $hidden = [
         'remember_token'
    ];
}
