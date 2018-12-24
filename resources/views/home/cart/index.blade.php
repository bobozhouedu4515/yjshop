<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <title>WangID通城——购物车</title>

    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/ziy.css">
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/jquery1.42.min.js"></script>

    <script type="text/javascript" src="{{asset ('org/shop')}}/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/jquery.SuperSlide.2.1.1.source.js"></script>
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/select.js"></script>

</head>
<body>
<!--头部-->

<!--头部-->
<div id="app">
    <div id="header">
        <div class="header-box">
            <h3 class="huany">WangID本地购物商城欢迎您的到来！</h3>

            <ul class="header-right">
                <li class="denglu dengl_hou">
                    <div>
                        <a class="red"
                           href="{{route ('home.user.user_info',auth ()->user ())}}">{{auth ()->user ()->name}}</a>
                        <a href="{{route ('home.user.logout')}}">退出</a>
                    </div>
                    <div class="dengl_hou_xial_k">
                        <div class="toub_zil_daoh">
                            <a href="{{route ('home.order.my_order')}}">待处理订单</a>
                            <a href="#">我的收藏</a>
                            <a href="#">个人资料</a>
                        </div>
                    </div>
                </li>
                <li class="shu"></li>
                <li class="denglu"><a class="ing_ps" href="#">我的收藏</a></li>
                <li class="shu"></li>
                <li class="denglu"><a class="ing_ps ps2" href="#">客户服务</a></li>
                <li class="shu"></li>

            </ul>
        </div>
    </div>
    <!---->
    <div class="yiny yiny_gouwc">
        <div class="beij_center">
            <div class="dengl_logo">
                <a href="{{route ('home.index')}}"> <img src="{{asset ('org/shop')}}/images/logo_1.png"></a>
                <h1>购物车</h1>
            </div>
        </div>
    </div>

    <div class="beij_center">
        <div class="cart-main-header clearfix">
            <div class="cart-col-1" style="margin-left: 15px; margin-top: 5px">
                <input type="checkbox" v-model="checked" @click="allselect()" v-bind:value="true">
            </div>
            <div class="cart-col-2">全选</div><!-- $page.site 主站 团购 抢购   style -->
            <div class="cart-col-3">商品信息</div>
            <div class="cart-col-4">
                <div class="cart-good-real-price">单价</div>
            </div>
            <div class="cart-col-5">数量</div>
            <div class="cart-col-6">
                <div class="cart-good-amount">小计</div>
            </div>
            <div class="cart-col-7">操作</div>
        </div>
    </div>

    <div style="height: 100px; width: 1200px; margin: 0 auto" v-if="carts.length==0">
        <div style="background:white; height: 200px;width: 400px;margin: 0 auto">
            <img style="margin: 20px" src="{{asset ('org/shop/images/settleup-nogoods.png')}}" alt="">
            <a href="{{route ('home.index')}}" style="margin-bottom: 20px;font-size: 24px">购物车还是空的呢</a>
        </div>
    </div>
    <div class="container" v-for="(v,k) in carts">

        <div class="cart-shop-header">
            <div class="cart-col-1">
                <input type="checkbox" class="jdcheckbox">
            </div>
            <div class="cart-col-2"><span class="gouw_c_dianp">罗莱LOVO自营官方旗舰店</span></div>
        </div>
        <div class="cart-shop-goods dangq_honh" style="height: 100px">
            <div class="cart-shop-good">
                <div class="cart-col-1" style="margin-top: 30px;margin-left: 10px">
                    <input type="checkbox" v-model="v.checked" :value="true" @click="select(v)">
                </div>
                <div class="cart-col-2" style="height: 82px;">
                    <a href="" target="_blank" class="g-img"><img :src="v.picture" alt=""></a>
                </div>
                <div class="fl houj_c">
                    <div class="cart-dfsg">
                        <div class="cart-good-name"><a href="#" target="_blank">@{{v.description}}</a></div>
                    </div>
                    <div class="cart-good-pro"></div>
                    <div class="cart-col-4">
                        <div class="cart-good-real-price "><!--主品-->¥&nbsp;@{{ v.price }}</div>
                        <div class="red"></div>
                    </div>
                    <div class="cart-col-5">
                        <div class="gui-count cart-count">
                            <a href="JavaScript:;"
                               class="gui-count-btn gui-count-sub gui-count-add" @click="add(v)">+</a>
                            <a href="JavaScript:;" @click="reduce(v)" class="gui-count-btn gui-count-add">-</a>
                            <div class="gui-count-input"><input dytest="" id="yj_num" @change="amend(v)" v-model="v.num"
                                                                class=""
                                                                type="text"
                                                                value=""></div>
                        </div>
                    </div>
                    <div class="cart-col-6 ">
                        <div class="cart-good-amount">¥&nbsp;@{{ v.num*v.price }}</div><!-- 重量展示(只展示全球百货的重量) --></div>
                </div>
                <div class="cart-col-7">
                    <div class="cart-good-fun delfixed">
                        <a href="JavaScript:;" @click="del(v,k)">删除</a>
                    </div>
                    <div class="cart-good-fun">
                        <a href="#">移入收藏夹</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="jies_beij" style="width:1200px;!important; margin: 20px auto" v-if="carts.length>0">
        <div class="beij_center over_dis">
            <div class="cart-col-1 cart_jies" style="margin-top: 24px;padding-left: 10px">
                <input type="checkbox" v-model="checked" @click="allselect()" v-bind:value="true">
            </div>
            <div class="qianm_shanc_yvf">
                <span>全选</span>
                <a href="JavaScript:;">删除</a>
            </div>
            <div class="jies_ann_bei">
                <p>已选 <em>@{{ checkedBox.length }}</em> 件商品 总计（不含运费）：<span>￥@{{totalPrice}}</span></p>
                <a href="JavaScript:;" @click="my_order()" class="order_btn">去结算</a>
            </div>
        </div>
    </div>

</div>




<script type="text/javascript">
    $(function () {

        /*tab标签切换*/
        function tabs(tabTit, on, tabCon) {
            $(tabCon).each(function () {
                $(this).children().eq(0).show();

            });
            $(tabTit).each(function () {
                $(this).children().eq(0).addClass(on);
            });
            $(tabTit).children().click(function () {
                $(this).addClass(on).siblings().removeClass(on);
                var index = $(tabTit).children().index(this);
                $(tabCon).children().eq(index).show().siblings().hide();
            });
        }

        tabs(".investment_title", "on_d", ".investment_con");

    })
</script>
<script type="text/javascript">
    jQuery(".picScroll_left_s").slide({
        titCell: ".hd ul",
        mainCell: ".bd ul",
        autoPage: true,
        effect: "left",
        autoPlay: true,
        vis: 5,
        trigger: "click"
    });
</script>

<!--底部-->
<div class="dib_beij dib_beij_ger_zhongx">
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
                    <li><a href="zhangh_anq.html">账户安全</a></li>
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
                    <p>意见收集邮箱</p>
                    <p>Ask@wangid.com</p>
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
            <p>京ICP备：14012449号 黔ICP证：B2-20140009号 </p>
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
<script type="text/javascript" src="{{asset ('org/layer')}}/layer.js"></script>
<script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.min.js"></script>
<script src="https://cdn.bootcss.com/vue/2.5.21/vue.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            carts:{!! $carts !!},
            checkedBox: [],
            allchecked: false,
            checked: false,
            total: this.totalprice

        },
        methods: {
            allselect() {
                this.allchecked = !this.allchecked
                if (this.allchecked) {
                    this.carts.forEach((v, k) => {
                        v.checked = true
                        // console.log($.inArray(v.id,this.checkedBox))
                        if ($.inArray(v.id, this.checkedBox) == -1) {
                            this.checkedBox.push(v.id)
                        }
                    })
                } else {
                    this.carts.forEach((v, k) => {
                        v.checked = false
                        let pos = this.checkedBox.indexOf(v.id)
                        // console.log(pos)
                        this.checkedBox.splice(pos, 1)

                    })
                }
            },

            add(v) {
                v.num++
                this.update(v)
            },
            reduce(v) {
                if (v.num > 1) {
                    v.num--
                    this.update(v)
                } else {
                    layer.msg('不能再少了')
                }
            },
            amend(v) {
                this.update(v)
            },
            update(v) {
                axios.put('/home/cart/' + v.id, {num: v.num}).then(function (response) {

                })
            },

            select(v) {
                v.checked = !v.checked;
                if (v.checked) {
                    this.checkedBox.push(v.id)
                    // console.log(this.checkedBox.length)
                    // console.log(this.carts.length)
                    if (this.checkedBox.length == this.carts.length) {
                        this.checked = true
                        this.allchecked = true
                    }

                } else {
                    let pos = this.checkedBox.indexOf(v.id)
                    // console.log(pos)
                    this.checkedBox.splice(pos, 1)
                    if (this.checkedBox.length < this.carts.length) {
                        this.checked = false
                        this.allchecked = false
                    }
                }
            },
            del(v, k) {
                this.carts.splice(k, 1);
                layer.msg('删除成功')
                axios.delete('/home/cart/' + v.id).then(function (response) {
                })
            },
            my_order() {
                if (this.checkedBox.length < 1) {
                    layer.msg('还没选你的宝贝呢!')
                    return
                } else {
                    // 判断用户是否有勾选商品
                    if (this.checkedBox == 0) {
                        layer.msg('请选择要结算的商品');
                        return;
                    }
                    // 跳转到订单页面
                    location.href = "{{route('home.order.index')}}?ids=" + this.checkedBox;
                }
            },
        },
        computed: {
            totalPrice() {
                let total = 0
                this.carts.forEach((v, k) => {
                    if (v.checked) {
                        total += v.price * v.num
                    }
                })
                return total
            }
        }
    })
</script>
</body>
</html>
