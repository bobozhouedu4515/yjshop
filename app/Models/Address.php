<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded=['_token'];

    public function order ()
    {
        return $this -> hasOne (Order::class);
    }
}
