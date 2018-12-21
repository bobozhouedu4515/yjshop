<?php

namespace App\Http\Controllers\Home;

use App\Models\Cart;
use App\Models\Good;
use function GuzzleHttp\Promise\exception_for;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function __construct ()
    {
        $this->middleware('auth',[
            'except'=>[]
        ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts=Cart::where('user_id',auth ()->id ())->get();
//        dd (json_encode ( $carts));
//        $jsonCart=json_encode ( $carts);
        foreach ($carts as $v){
            $v['checked']=false;
        }
//        dd ($carts);
        return view ('home.cart.index',compact ('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Cart $cart)
    {
        //判断如果数据库中有相同的数据,那就数据累加
        if ($carts=$cart->where('good_id',$request->ids)->where('spec',$request->spec)->where('color',$request->color)->first()){
            //改变本条数据的num值
            $carts->num=$carts->num+$request->num;

            //然后保存
            $carts->save();

            return ['code'=>1,'msg'=>'操作成功'];

        }
        //否则,添加新数据;
        $good=Good::where('id',$request->id)->first();
        $cart->user_id=auth ()->id ();
        $cart->good_id=$request->id;
        $cart->picture=$good->picture;
        $cart->spec=$request->spec;
        $cart->color=$request->color;
        $cart->description=$good->description;
        $cart->price=$good->price;
        $cart->num=$request->num;
        $cart->total=$good->price*$request->num;
        $cart -> save ();

        return ['code'=>1,'msg'=>'操作成功'];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
//        dd ($request -> all ());
//        dd ($cart);
        $cart->num=$request->num;
        $cart->save ();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
//        dd ($cart);
        $cart->delete ();
        return ['code'=>1,'msg'=>'删除成功'];
    }



}
