<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <title>WangID通城——提交订单——结算页</title>
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/ziy.css">
    <script src="{{asset ('org/shop')}}/js/jquery-1.11.3.min.js" ></script>
    <!--  <script src="js/index.js" ></script>  -->
    <!-- <script type="text/javascript" src="js/jquery1.42.min.js"></script> -->
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/jquery.SuperSlide.2.1.1.source.js"></script>
    <!--  <script type="text/javascript" src="js/select.js"></script> -->



</head>
<body>
<!--头部-->

<!--头部-->
<div id="header">
    <div class="header-box">
        <h3 class="huany">WangID本地购物商城欢迎您的到来！</h3>
        <ul class="header-left">
            <li class="bj">
                <a class="dib" href="#">贵阳市</a>
                <i class="ci-leftll">
                    <s class="jt">◇</s>
                </i>
                <div class="bj-1">
                    <h3>热门城市：</h3>
                    <a href="">北京</a><a href="">上海</a><a href="">天津</a><a href="">重庆</a><a href="">河北</a><a href="">山西</a><a href="">河南</a><a href="">辽宁</a><a href="">吉林</a><a href="">黑龙江</a><a href="">浙江</a><a href="">江苏</a><a href="">山东</a><a href="">安徽</a><a href="">内蒙古</a><a href="">湖北</a><a href="">湖南</a><a href="">广东</a><a href="">广西</a><a href="">江西</a><a href="">四川</a><a href="">海南</a><a href="">贵州</a><a href="">云南</a><a href="">西藏</a><a href="">陕西</a><a href="">甘肃</a><a href="">青海</a><a href="">宁夏</a><a href="">新疆</a><a href="">台湾</a><a href="">香港</a><a href="">澳门</a><a href="">海外</a><a href="qieh_cs.html">全部+</a>
                </div>
            </li>
        </ul>
        <ul class="header-right">
            <li class="denglu dengl_hou">
                <div>
                    <a class="red" href="dengl.html">Hi~山的那边是海</a>
                    <i class="icon_plus_nickname"></i>
                    <i class="ci-leftll">
                        <s class="jt">◇</s>
                    </i>
                </div>
                <div class="dengl_hou_xial_k">
                    <div class="zuid_xiao_toux">
                        <a href="#"><img src="{{asset ('org/shop')}}/images/toux.png"></a>
                    </div>
                    <div class="huiy_dengj">
                        <a class="tuic_" href="#">退出</a>
                    </div>
                    <div class="toub_zil_daoh">
                        <a href="#">待处理订单</a>
                        <a href="#">我的收藏</a>
                        <a href="#">个人资料</a>
                    </div>
                </div>
            </li>
            <li class="shu"></li>
            <li class="denglu"><a class="ing_ps" href="#">我的收藏</a></li>
            <li class="shu"></li>
            <li class="denglu"><a class="ing_ps ps1" href="#">申请入驻</a></li>
            <li class="shu"></li>
            <li class="denglu"><a class="ing_ps ps2" href="#">客户服务</a></li>
            <li class="shu"></li>
            <li class="shouji bj">
                <a class="ing_ps ps3" href="#">手机通城</a>
                <i class="ci-right ">
                    <s class="jt">◇</s>
                </i>
                <div class="shouji1">
                    <img src="{{asset ('org/shop')}}/images/mb_wangid.png" class="shouji4">
                    <div class="shouji2">
                        <p>通城客户端</p>
                        <p class="red">首次下单满79元，送79元</p>
                    </div>
                    <div class="yi">
                        <img src="{{asset ('org/shop')}}/images/mb_wangid.png" class="shouji4">
                        <div class="er">
                            <p>通城微信公众号</p>
                            <p class="red">关注通城公众号的积分，换大礼</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!--提交订单——结算页-->
<div class="beij_center">
    <div class="dengl_logo">
        <div>
            <img src="{{asset ('org/shop')}}/images/logo_1.png">
            <h1>结算页</h1>
        </div>
        <div class="stepflex stepflex_2">
            <dl class="normal done ">
                <dt class="s-num">1</dt>
                <dd class="s-text">1.我的购物车<s></s><b></b></dd>
            </dl>
            <dl class="normal doing">
                <dt class="s-num">2</dt>
                <dd class="s-text">2.填写核对订单信息<s></s><b></b></dd>
            </dl>
            <dl class="normal ">
                <dt class="s-num">3</dt>
                <dd class="s-text">3.成功提交订单<s></s><b></b></dd>
            </dl>
        </div>
    </div>
</div>
<div class="beij_center">
    <div class="checkout-tit">
        <span class="tit-txt">填写并核对订单信息</span>
    </div>
    <div class="checkout_steps">
        <div class="step-tit">
            <h3>收货人信息</h3>
            <div class="extra_r">
                <a href="#" class="ftx-05 J_consignee_global">新增收货地址</a>
            </div>
        </div>
        <div class="jies_y_shouh_diz shiq_1">

            <ul>
                @foreach($addresses as $address)
                <li class="@if($address->select==1)cur  @endif" address_id="{{$address->id}}">
                    <div class="dangq_xuanz_diz">当前地址</div>
                    <span>{{$address->name}}</span>
                    <span>{{$address->province}}/{{$address->city}}/{{$address->distinct}}{{$address->detail}}</span>
                    <span>{{$address->tel_num}}</span>
                    <div class="bianji_yv_shanc">
                        <a href="JavaScript:;" onclick="select_adr({{$address->id}})">设为默认</a>
                        <a href="JavaScript:;">编辑</a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="addr-switch cur_e">
                <p><span>更多地址</span><b></b></p>
                <p class="jiant_xiangs"><span>收起更多</span><b></b></p>
            </div>
        </div>
        <div class="jies_y_shouh_diz shiq_2">
            <ul>
                <li class="zhif_fangs cur"><div class="dangq_xuanz_diz">在线支付</div></li>
                <li class="zhif_fangs"><div class="dangq_xuanz_diz">货到付款</div></li>
                <div class="addr-switch addr_switch_1 cur_e_1">
                    <p><span>更多 >></span></p>
                    <p><span>收起 <<</span></p>
                </div>
            </ul>
        </div>
        <div class="step-tit">
            <h3>送货清单</h3>
            <div class="extra_r">
                <a href="#" class="ftx-05 J_consignee_global">价格说明</a>
                <a href="#" class="ftx-05 J_consignee_global">返回修改购物车</a>
            </div>
        </div>
        <div class="shopping_list">
            <div class="dis_modes">
                <div class="mode_item_tit">
                    <h4>配送方式</h4>
                </div>
                <div>
                    <div class="jies_y_shouh_diz jies_y_shouh_diz_kuaid">
                        <ul>
                            <li class="zhif_fangs cur"><div class="dangq_xuanz_diz">申通快递</div></li>
                            <li class="zhif_fangs"><div class="dangq_xuanz_diz">圆通快递</div></li>
                        </ul>
                    </div>
                </div>
                <div class="peis_shij">
                    <p>配送时间： </p><span>工作日、双休日与节假日均可送货</span>
                </div>
                <div class="maij_liuy">
                    <p>给商家留言</p>
                    <input type="text" value="最多不能超过30字！">
                </div>
            </div>
            <div class="goods_list">
                <div class="goods_list_neik">
                    <h4 class="vendor_name_h">商家：塔里服装旗舰店</h4>
                    @foreach($carts as $cart)
                    <div class="goods_item">
                        <div class="p_img"><a href="#"><img src="{{$cart->picture}}" style="height:100%;"></a></div>
                        <div class="goods_msg">
                            <div class="p_name">
                                <a href="#">{{$cart->description}} TAWB91603 黑色 M</a>
                            </div>
                            <div class="p_price">
                                <span class="jq_price">￥ {{$cart->price}}</span>
                                <span>x{{$cart->num}}</span>
                                <span>有货</span>
                                <span>1.170kg</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="fap_beij">
            <div class="step-tit">
                <h3>发票信息</h3>
            </div>
            <div class="kaif_p">
                <span>普通发票（电子)</span>
                <span>个人</span>
                <span> 明细 </span>
                <span> <a href="#">修改</a> </span>
            </div>
        </div>
    </div>
    <!--收费明细-->
    <div class="order_summary">
        <div class="qianq_mx">
            <div class="jiaq_meih">
                <span class="xiangq_leib"><em class="goumai_ges">{{$carts->count()}}</em> 件商品，总商品金额：</span>
                <em class="goum_zongj">￥{{$totalPrice}}</em>
            </div>
            <div class="jiaq_meih">
                <span class="xiangq_leib">返现：</span>
                <em class="goum_zongj">￥00.00</em>
            </div>
            <div class="jiaq_meih">
                <span class="xiangq_leib">运费：</span>
                <em class="goum_zongj">￥00.00</em>
            </div>
            <div class="jiaq_meih">
                <span class="xiangq_leib">服务费：</span>
                <em class="goum_zongj">￥00.00</em>
            </div>
        </div>
    </div>
    <div class="trade_foot_detail_com">
        <div class="dsgs">
            <div class="qianq_mx">
                <div class="jiaq_meih">
                    <span class="xiangq_leib"> 应付总额：</span>
                    <em class="goum_zongj zhongf_jine">￥{{$totalPrice}}</em>
                </div>
            </div>
        </div>
        <div class="zuiz_diz">
            @foreach($addresses as $address)
                @if($address->select==1)
            <span>寄送至：{{$address->province}}/{{$address->city}}/{{$address->distinct}}{{$address->detail}} </span>
            <span> 收货人:{{$address->name}} {{$address->tel_num}}</span>
                @endif
                    @endforeach

        </div>
    </div>
    <div class="tij_dingd_ann">
        <a href="JavaScript:;" onclick="send()">提交订单</a>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $(".shiq_1 ul li").hide().first().show()
        $(".cur_e p").hide().first().show()
        $(".cur_e p:first").click(
            function(){
                $(".shiq_1 ul li").show()
                $(".cur_e p").hide().last().show()
            }
        )
        $(".cur_e p:last").click(
            function(){
                $(".shiq_1 ul li").hide().first().show()
                $(".cur_e p").hide().first().show()
            }
        )
    })
    $(function(){
        $(".shiq_2 ul li").hide().first().show()
        $(".cur_e_1 p").hide().first().show()
        $(".cur_e_1 p:first").click(
            function(){
                $(".shiq_2 ul li").show()
                $(".cur_e_1 p").hide().last().show()
            }
        )
        $(".cur_e_1 p:last").click(
            function(){
                $(".shiq_2 ul li").hide().first().show()
                $(".cur_e_1 p").hide().first().show()
            }
        )
    })
    //cur
</script>

<!--底部-->
<div class="dib_beij">
    <div class="dib_jvz_beij">
        <div class="shangp_baoz">
            <p>本地购物&nbsp;&nbsp;看得见的商品</p>
            <p class="beng1">正品行货&nbsp;&nbsp;购物无忧</p>
            <p class="beng2">低价实惠&nbsp;&nbsp;帮你省钱</p>
            <p class="beng3">本地直发&nbsp;&nbsp;专业配送</p>
        </div>
        <div class="zhongj_youx">
            <div class="lieb_daoh">
                <h4>物流配送</h4>
                <ul>
                    <li><a href="#">配送查询</a></li>
                    <li><a href="#">配送服务</a></li>
                    <li><a href="#">配送费用</a></li>
                    <li><a href="#">配送时效</a></li>
                    <li><a href="#">签收与验货</a></li>
                </ul>
            </div>
            <div class="lieb_daoh">
                <h4>支付与账户</h4>
                <ul>
                    <li><a href="#">货到付款</a></li>
                    <li><a href="#">在线支付</a></li>
                    <li><a href="#">门店支付</a></li>
                    <li><a href="#">账户安全</a></li>
                </ul>
            </div>
            <div class="lieb_daoh">
                <h4>购物帮助</h4>
                <ul>
                    <li><a href="#">购物保障</a></li>
                    <li><a href="#">购物流程</a></li>
                    <li><a href="#">焦点问题</a></li>
                    <li><a href="#">联系我们</a></li>
                </ul>
            </div>
            <div class="lieb_daoh">
                <h4>售后服务</h4>
                <ul>
                    <li><a href="#">退换货服务</a></li>
                    <li><a href="#">退款说明</a></li>
                    <li><a href="#">专业维修</a></li>
                    <li><a href="#">延保服务</a></li>
                    <li><a href="#">家电回收</a></li>
                </ul>
            </div>
            <div class="lieb_daoh">
                <div class="kef_dianh">
                    <p>客服电话</p><span>400-6677-937</span>
                </div>
                <div class="kef_dianh kef_dianh_youx">
                    <p>意见收集邮箱</p><p>Ask@wangid.com</p>
                </div>
            </div>
            <div class="lieb_daoh lieb_daoh_you">
                <div class="erw_ma_beij">
                    <div class="erw_m">
                        <h1><img src="{{asset ('org/shop')}}/images/mb_wangid.png"></h1>
                        <span>扫码下载通城客户端</span>
                    </div>
                    <div class="erw_m">
                        <h1><img src="{{asset ('org/shop')}}/images/mb_wangid.png"></h1>
                        <span>扫码下载通城客户端</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="beia_hao">
            <p>京ICP备：14012449号 黔ICP证：B2-20140009号  </p>
            <p class="gonga_bei">京公网安备：11010602030054号</p>
            <div class="renz_">
                <span></span>
                <span class="span1"></span>
                <span class="span2"></span>
                <span class="span3"></span>
            </div>
        </div>
    </div>
</div>
<script>
    function select_adr(id) {
        // alert(1)
        $.post('/home/address/select_adr?id='+id, {_token:'{{csrf_token ()}}'},function (res) {
            // console.log(res);
                 window.location.reload()
        },'json')
    }
        function send() {
            $.post('/home/order',{_token:'{{csrf_token ()}}',
                address_id:$('.jies_y_shouh_diz>ul').find('li.cur').attr('address_id'),
                ids:'{{request ()->query ('ids')}}'},function (res) {

            },'json')
        }
</script>


</body>
</html>

