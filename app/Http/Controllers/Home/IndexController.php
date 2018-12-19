<?php

namespace App\Http\Controllers\Home;

use App\Models\Product;
use Houdunwang\Arr\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends CommonController
{
    public function index ()
    {

        $products=Product::all ()->toArray ();
//        dd ($products);
        $productData=(new Arr())->channelLevel ($products,$pid=0,$html = "&nbsp;",$fieldPri = 'id',$fieldPid = 'pid');
//        dd ($productData);

        return view ('home.index.index',compact ('productData'));

    }
}
