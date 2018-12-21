<?php

    namespace App\Http\Controllers\Home;

    use App\Models\Address;
    use App\Models\DetailOrder;
    use App\Models\Order;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

//require_once public_path ()."/org/php_sdk_v3.0.9/lib/WxPay.Api.php";
    require_once public_path () . "/org/php_sdk_v3.0.9/example/WxPay.NativePay.php";

    class PayController extends CommonController
    {
        public function index ()
        {

            return view ('home.pay.index');
        }

        public function payWechat ( DetailOrder $detailOrder )
        {
//        dd (\request () -> query ('id'));
            $id = request () -> query ('id');
            $order = Order ::where ('id', $id) -> first ();
            $address = Address ::where ('id', $order -> address_id) -> first ();
//        dd ($address);
            $detailOrders = $detailOrder -> where ('id', $id) -> get ();
            $notify = new \NativePay();
            $url1 = $notify -> GetPrePayUrl ("123456789");

            $input = new \WxPayUnifiedOrder();
            $input -> SetBody ("欢迎再次光临");
            $input -> SetAttach ($order -> number);
            $input -> SetOut_trade_no ("sdkphp123456789" . date ("YmdHis"));
            $input -> SetTotal_fee ("1");
            $input -> SetTime_start (date ("YmdHis"));
            $input -> SetTime_expire (date ("YmdHis", time () + 600));
            $input -> SetGoods_tag ("test");
            $input -> SetNotify_url (route ('pay.notify'));
            $input -> SetTrade_type ("NATIVE");
            $input -> SetProduct_id ("123456789");

            $result = $notify -> GetPayUrl ($input);
//        dd ($result);
            $url2 = $result[ "code_url" ];
//
//        dd ($url2);
//        dd ($detailOrders);


            return view ('home.pay.paywechat', compact ('detailOrders', 'order', 'address', 'url2'));

        }

        public function notify ()
        {
            $result=simplexml_load_string( file_get_contents( 'php://input' ),'simpleXmlElement',LIBXML_NOCDATA );
//            $result=simplexml_load_string( file_get_contents('php://input') ,'simpleXmlElement', LIBXML_NOCDATA );
//            $result=simplexml_load_string(file_get_contents ('php://input'), 'simpleXmlElement', LIBXML_NOCDATA);
                file_put_contents ('b.php',$result,true);
            if ($result->result_code == 'SUCCESS' && $result->return_code == 'SUCCESS') {
                //付款成功
                //更新自己的状态状态
                Order ::where ('number', $result -> attach) -> update ([ 'status' => 2 ]);
                //告诉微信我们已经收到通知
                echo "<xml>
                 <return_code><![CDATA[SUCCESS]></return_code>
                 <return_msg><![CDATA[OK]></return_msg>
                    </xml>";
                return true;
            }
        }

        public function checkOrderStatus ()
        {
            $number = \request () -> number;
            $order = Order ::where ('number', $number) -> first ();
            if ($order[ 'status' ] == 2) {
                //说明已经支付
                return [ 'code' => 1, 'msg' => '已支付' ];
            } else {
                //说明未支付
                return [ 'code' => 0, 'msg' => '未支付' ];
            }
        }


    }
