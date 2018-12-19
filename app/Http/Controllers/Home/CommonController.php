<?php

namespace App\Http\Controllers\Home;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function __construct ()
    {
        $_carts=Cart::all ();
//        dd ($_carts);
//        dd (auth ('') -> id ());

      $_products=  Product::where('pid',0)->limit(8)->get();
      \View::share ('_products',$_products);
      \View::share ('_carts',$_carts);
    }
}
