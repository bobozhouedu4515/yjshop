<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 'status',

    ];

    public function detailOrder ()
    {
        return $this -> hasMany (DetailOrder::class);
    }

    public function address ()
    {
        return $this -> hasOne(Address::class);
    }
}
