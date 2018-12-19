<?php

namespace App\Http\Controllers\Home;

use App\Models\Cart;
use App\Models\DetailOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $cart)
    {
//        dd (\request () -> query ('ids'));
        $ids=\request ()->query('ids');
        $carts=$cart->whereIn('id',explode (',',$ids))->get();
//        dd ($carts);
        $addresses=auth ()->user ()->address;
        $totalPrice=0;

        foreach($carts as $cart){

            $totalPrice+=$cart->price*$cart->num;
        }
//        dd ($totalPrice);
//        dd ($addresses);

        return view ('home.pay.index',compact ('carts','addresses','totalPrice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Order $order)
    {

//        dd ($request->all ());
//        $carts=$cart->wherein('id',)
        $ids = $request->ids;
        //根据购物车 ids 获取所有数据
        $cartData = Cart::whereIn('id',explode(',',$ids))->get();
//        dd($cartData);
        $total_price = 0;$total_num = 0;
        foreach($cartData as $v){
            $total_price += $v['num'] * $v['price'];
        }
        DB::beginTransaction();
        //添加订单表
        $order->number = time().str_random(6);
        $order->total_price = $total_price;
        $order->total_num = count($cartData);
        $order->user_id = auth()->id();
        $order->address_id = $request->address_id;
        $order->status = 1;
        $order->save();
        //添加订单详情表
        foreach($cartData as $v){
            $orderDetail = new DetailOrder();
            $orderDetail->order_id = $order->id;
            $orderDetail->title = $v['description'];
            $orderDetail->price = $v['price'];
            $orderDetail->pic = $v['picture'];
            $orderDetail->num = $v['num'];
            $orderDetail->spec = $v['spec'];
            $orderDetail->good_id = $v['good_id'];
            $orderDetail->color = $v['color'];
            $orderDetail->save();
        }
        //清除购物车对应数据
        Cart::whereIn('id',explode(',',$ids))->where('user_id',auth()->id())->delete();
        DB::commit();
        return ['code'=>1,'msg'=>'提交成功','number'=>$order->number];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
