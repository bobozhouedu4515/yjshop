<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $casts=[
      'pics'=>'array','spes'=>'array'
    ];
    public function user ()
    {
        return $this->belongsTo (User::class);
    }
}
