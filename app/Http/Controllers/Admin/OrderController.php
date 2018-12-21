<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index ()
    {
        $orders=Order::all ();
        return view ('admin.order.index', compact ('orders'));
    }

    public function shipping (Order $order)
    {
//        dd ($order);
        if ($order->status==2){
            $order->update (['status'=>4]);
            return back ()->with ('success','操作成功');
        }else{
            return back () -> with ('danger', '未付款');
        }

    }
}
