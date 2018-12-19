<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    //数据库允许字段
    protected $fillable=['username','password'];
    protected $hidden = [
         'remember_token'
    ];
}
