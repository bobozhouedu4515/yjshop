<?php

    namespace App\Http\Controllers\Home;

    use App\Models\Address;
    use App\Models\Cart;
    use App\Models\DetailOrder;
    use App\Models\Good;
    use App\Models\Order;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use DB;

    class OrderController extends CommonController
    {


        public function __construct ()
        {
            //禁止非登录访问
            $this->middleware('auth',['except'=>[]]);
            parent::__construct ();
        }


        public function index ( Cart $cart,Request $request )
        {
            //填写地址,下单付款

            $ids = \request () -> query ('ids');
//            dd ($ids);

            $carts = $cart -> whereIn ('id', explode (',', $ids))->where('user_id',auth ()->id()) -> get ();
//            dd ($carts);
            $addresses = auth () -> user () -> address;
            $totalPrice = 0;
            if ($carts->toArray()){
                foreach ($carts as $cart) {
                    $totalPrice += $cart -> price * $cart -> num;
                }
                return view ('home.order.gopay', compact ('carts', 'addresses', 'totalPrice'));
            }
            return back ()->with ('danger','商品不存在');


        }
        public function store ( Request $request, Order $order )
        {

            $ids = $request -> ids;
            //根据购物车 ids 获取所有数据
            $cartData = Cart ::whereIn ('id', explode (',', $ids)) -> get ();
            $total_price = 0;
            $total_num = 0;
            foreach ($cartData as $v) {
                $total_price += $v[ 'num' ] * $v[ 'price' ];
            }
            DB ::beginTransaction ();
            //添加订单表
            $order -> number = time () . str_random (6);
            $order -> total_price = $total_price;
            $order -> total_num = count ($cartData);
            $order -> user_id = auth () -> id ();
            $order -> address_id = $request -> address_id;
            $order -> status = 1;
            $order -> save ();
            //添加订单详情表
            foreach ($cartData as $v) {
                $orderDetail = new DetailOrder();
                $orderDetail -> order_id = $order -> id;
                $orderDetail -> title = $v[ 'description' ];
                $orderDetail -> price = $v[ 'price' ];
                $orderDetail -> pic = $v[ 'picture' ];
                $orderDetail -> num = $v[ 'num' ];
                $orderDetail -> spec = $v[ 'spec' ];
                $orderDetail -> good_id = $v[ 'good_id' ];
                $orderDetail -> color = $v[ 'color' ];
                $orderDetail -> save ();
            }
            //清除购物车对应数据
            Cart ::whereIn ('id', explode (',', $ids)) -> where ('user_id', auth () -> id ()) -> delete ();
            DB ::commit ();
            return [ 'code' => 1, 'msg' => '提交成功', 'number' => $order -> number ];

        }


        public function show ( Order $order )
        {
            //
        }


        public function destroy ( Order $order )
        {

        }

        public function myOrder ()
        {
            //加载个人中心我的订单
            $orders = Order ::where ('user_id', auth () -> id ()) -> get ();
//            $address=Address::where('id',$orders->address_id)->first();
//            dd ($address);


            return view ('home.order.index', compact ('orders'));
        }

    }
