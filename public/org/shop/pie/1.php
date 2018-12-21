@extends('home.layouts.master')
@section('title')
    <title>欢迎您来到{{shop_config('website.site_name')}}商城-订单页面</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('org/layui/css/layui.css')}}">
    <script src="{{asset('org/layui/layui.js')}}"></script>
    <style>
        .payOrder-warp {
            overflow: hidden;
            margin-bottom: 50px;
        }
        .payOrder-warp .payOrder-desc {
            background: url({{asset('org/layouts/payorder.png')}}) #fff 66px 51px no-repeat;
            padding: 0 60px 45px 300px;
            min-height: 170px;
        }
        .payOrder-desc .pay-top {
            padding-top: 25px;
            overflow: hidden;
        }
        .pay-top h3 {
            font-size: 24px;
            font-weight: bold;
            color: #555;
            float: left;
        }
        .pay-top .pay-total {
            float: right;
            line-height: 36px;
        }
        .pay-top .pay-total span {
            float: left;
            font-size: 14px;
            color: #8c8c8c;
        }
        .pay-top .pay-total .pay-price {
            font-size: 24px;
            float: left;
            text-align: right;
            min-width: 120px;
            color: #f42424;
        }
        .payOrder-desc .pay-txt {
            font-size: 14px;
            line-height: 22px;
            padding: 8px 0 5px;
        }
        .payOrder-desc .pay-txt em {
            color: #ff8f23;
        }
        .payOrder-desc .pay-txt {
            font-size: 14px;
            line-height: 22px;
            padding: 8px 0 5px;
        }

        .payOrder-desc .o-list {
            margin-top: 10px;
        }
        .payOrder-desc .o-list .o-list-info {
            font-size: 14px;
            overflow: hidden;
            line-height: 23px;
        }
        .payOrder-desc .o-list .o-list-info span {
            margin-right: 8px;
        }
        .payOrder-desc .pay-txt em {
            color: #ff8f23;
        }
        .payOrder-mode {
            margin-top: 10px;
            background-color: #fff;
            padding: 30px;
        }
        .payOrder-mode .payOrder-list:last-child {
            margin-bottom: 0;
        }
        .payOrder-mode .p-mode-tit {
            padding-bottom: 15px;
            border-bottom: 1px solid #d2d2d2;
        }
        .payOrder-mode .p-mode-tit h3 {
            font-size: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 10px;
            border-left: 4px solid #f42424;
        }
        .payOrder-mode .p-mode-list {
            margin-top: 20px;
            width: calc(100% + 12px);
            overflow: hidden;
        }
        .payOrder-mode .p-mode-item {
            float: left;
            width: 178px;
            height: 60px;
            border: 1px solid #d2d2d2;
            text-align: center;
            position: relative;
            margin: 0 12px 12px 0;
        }
        .p-mode-list .wxpay a {
            height: 60px;
            background: url({{asset('org/layouts/wxpay-icon.png')}}) center center no-repeat;
            font-size: 0;
            display: block;
        }
        .hide {
            display: none !important;
        }
        .p-mode-list .alipay input[type="button"] {
            background: url({{asset('org/layouts/alipay-icon.png')}}) center center no-repeat;
        }
        .payOrder-mode .p-mode-item {
            float: left;
            width: 178px;
            height: 60px;
            border: 1px solid #d2d2d2;
            text-align: center;
            position: relative;
            margin: 0 12px 12px 0;
        }
        .p-mode-list .p-mode-item input[type="button"], .p-mode-list .p-mode-item input[type="submit"] {
            border: 0;
            width: 178px;
            height: 60px;
            display: block;
            font-size: 0;
            outline: 0;
            cursor: pointer;
        }

    </style>
@endsection
@section('content')
    <div class="beij_center">
        <div class="dengl_logo">
            <div>

                <h1>支付页面</h1>
            </div>
            <div class="stepflex stepflex_2">
                <dl class="normal done ">
                    <dt class="s-num">1</dt>
                    <dd class="s-text">1.我的购物车<s></s><b></b></dd>
                </dl>
                <dl class="normal ">
                    <dt class="s-num">2</dt>
                    <dd class="s-text">2.填写核对订单信息<s></s><b></b></dd>
                </dl>
                <dl class="normal doing ">
                    <dt class="s-num">3</dt>
                    <dd class="s-text">3.成功提交订单<s></s><b></b></dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="beij_center">

        <div class="payOrder-warp" id="pay_main">
            <div class="payOrder-desc">
                <div class="pay-top">
                    <h3>订单提交成功，去付款咯！</h3>
                    <div class="pay-total">
                        <span>应付总额：</span>
                        <div class="pay-price">￥114.30</div>
                    </div>
                </div>
                <div class="pay-txt">
                    <p>订单号：<em id="nku">2018121919400867353</em></p>
                    <p>您选定的支付方式为：<span id="paymode">在线支付</span></p>
                    <p>配送方式: <span id="express">顺丰速运</span></p>
                </div>
                <div class="o-list">
                    <div class="o-list-info">
                        <span id="shdz">寄送至：北京  北京  西城区  &nbsp;&nbsp;fdgfdg</span>
                        <span id="shr">收货人：fdg</span>
                        <span id="mobile">15163640385</span>
                    </div>
                </div>
                <a href="flow.php?step=pdf&amp;order=7" target="_blank" class="orderPrint ftx-05">个人中心</a>&nbsp;&nbsp;
                <a href="{{route('home')}}" target="_blank" class="orderPrint ftx-05">继续购物</a>
            </div>


            <div class="payOrder-mode">
                <div class="payOrder-list">
                    <div class="p-mode-tit">
                        <h3>在线支付</h3>
                    </div>
                    <div class="p-mode-list">
                        <div class="p-mode-item wxpay" order_sn="2018121919400867353" flag="wxpay">      <a href="javascript:;" class="weizf" data-type="wxpay">微信支付</a><div class="wxzf"><div id="wxpay_dialog" class="hide"><div class="modal-box"><div class="modal-left"><p><span>请使用 </span><span class="orange">微信 </span><i class="icon icon-qrcode"></i><span class="orange"> 扫一扫</span><br>扫描二维码支付</p><div class="modal-qr"><div class="modal-qrcode"><img src="http://test1.ecmoban.com/images/qrcode/Q6.png?t=1545219236"></div><div class="model-info"><img src="themes/ecmoban_dsc/images/sj.png" class="icon-clock"><span>二维码有效时长为2小时, 请尽快支付</span></div></div></div><div class="modal-right"><img src="themes/ecmoban_dsc/images/weixin-qrcode.jpg"></div></div></div></div></div>
                        <div class="p-mode-item alipay" order_sn="2018121919400867353" flag="alipay">      <div class="alipay" style="text-align:center"><input type="button" onclick="window.open('https://openapi.alipaydev.com/gateway.do?app_id=2016073100130857&amp;biz_content=%7B%22out_trade_no%22%3A%222018121919400867353O51%22%2C%22product_code%22%3A%22FAST_INSTANT_TRADE_PAY%22%2C%22total_amount%22%3A%22114.3%22%2C%22subject%22%3A%222018121919400867353%22%2C%22body%22%3A%222018121919400867353%22%2C%22passback_params%22%3A%2251%22%2C%22goods_type%22%3A%221%22%2C%22timeout_express%22%3A%221440m%22%7D&amp;charset=UTF-8&amp;format=JSON&amp;method=alipay.trade.page.pay&amp;notify_url=http%3A%2F%2Ftest1.ecmoban.com%2Fapi%2Fnotify%2Falipay.php&amp;return_url=http%3A%2F%2Ftest1.ecmoban.com%2Frespond.php%3Fcode%3Dalipay&amp;sign_type=RSA2&amp;timestamp=2018-12-19+19%3A33%3A56&amp;version=1.0&amp;sign=rRa60r0tSwAo5vFbRG93LfRi8kK1n%2BGOdeIP9LvHZP8M2sVoOCV6eVYMZXENQaGwm9UuUuA545tva9JgxeVpRjL2gk%2FQGJWpaoRQvCq40t7dyY7gEcs3mSDEJSzVuU0gkzDL6uT8uG%2FbfTCUMqk9sPAkcWC1u9XiaoDyul3FIG5%2BzzsUnCSVgqBITfmgpvCoUf2qwLYrDlmWvzFswtvYpWTZyaech%2BIV2EvinFvpjOXEu%2Bl10LIjJbhfpdAjXQJzvBdwxWNQ57NqxwdcEu63T72lhuQiIm%2FO%2BfoUTGDd4CvO%2BnLdQMAioIJra9QQTMj3A7mPzl7fhFA29pxalzMHzA%3D%3D')" value="支付宝支付"></div></div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    @include('layouts.message')

@endsection







