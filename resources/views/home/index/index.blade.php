@extends('home.layouts.master')
@section('content')


    <!--轮播图上方导航栏  一栏-->
    <div id="navv">
        <div class="focus">
            <div class="focus-a">
                <div class="fouc-font"><a href="">全部商品分类</a></div>
            </div>
            <div class="focus-b">
            </div>

            <!--左边导航-->
            <div class="dd-inner">
                @foreach($productData as $v)
                    <div class="font-item">
                        <div class="item fore1">
                            <h3>
                                <a class="da_zhu" href="#">{{$v['name']}}</a>
                            </h3>
                        </div>
                        <div class="font-item1">
                            <div class="font-lefty">
                                @foreach($v['_data'] as $vv)
                                    <dl class="fore1">

                                        <dt><a href="">{{$vv['name']}}<i>></i></a></dt>

                                        <dd>
                                            @foreach($vv['_data'] as $vvv)
                                                <a href="{{route ('home.goods.index',['id'=>$vvv['id']])}}">{{$vvv['name']}}</a>
                                            @endforeach
                                        </dd>

                                    </dl>
                                @endforeach
                            </div>

                        </div>
                    </div>
            @endforeach
            <!---->
            </div>

        </div>
    </div>

    <!--轮播图-->
    <div id="lunbo">
        <ul id="one">
            <li><a href=""><img src="{{asset ('org/shop')}}/images/banner.jpg"></a></li>
            <li><a href=""><img src="{{asset ('org/shop')}}/images/banner1.jpg"></a></li>
            <li><a href=""><img src="{{asset ('org/shop')}}/images/banner.jpg"></a></li>
            <li><a href=""><img src="{{asset ('org/shop')}}/images/banner1.jpg"></a></li>
        </ul>
        <ul id="two">
            <li class="on">1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
        </ul>
        <!--轮播图左右箭头-->
        <div class="slider-page">
            <a href="javascript:void(0)" id="left"><</a>
            <a href="javascript:void(0)" id="right">></a>
        </div>
    </div>

    <!--内容一开始了-->
    <div class="bend_beij">
        <!--本地生活-->
        <div class="bend_dhengh">
            <div class="neir_biaot">
                <p>本地生活</p>
                <p class="yingw">Local life</p>
            </div>
            <div class="jiank_meis">
                <div class="kuang_1">
                    <a href="#">
                        <img src="{{asset ('org/shop')}}/images/jiank_meis.jpg">
                        <div class="jiank_meis_wenz">
                            <p>健康美食</p>
                            <span>让生活&nbsp;&nbsp;更健康&nbsp;&nbsp;更美味&nbsp;&nbsp;更舒心</span>
                        </div>
                    </a>
                </div>
                <div class="dianq_qvy">
                    <div class="shiq">
                        <h2>全部区域</h2>
                        <ul>
                            <li><a href="#">云岩区</a></li>
                            <li><a href="#">南明区</a></li>
                            <li><a href="#">白云区</a></li>
                            <li><a href="#">乌当区</a></li>
                            <li><a href="#">花溪区</a></li>
                            <li><a href="#">清镇市</a></li>
                            <li><a href="#">开阳县</a></li>
                            <li><a href="#" class="hide">开阳县</a></li>
                            <li><a href="#" class="hide">开阳县</a></li>
                            <li id="show">更多</li>
                        </ul>
                    </div>
                    <div class="ktv_jiub">
                        <ul>
                            <li><a href="#">KTV/酒吧</a></li>
                            <li><a href="#">周边游</a></li>
                            <li><a href="#">生活服务</a></li>
                            <li><a href="#">真人CS</a></li>
                            <li><a href="#">中医养生</a></li>
                            <li><a href="#">体检/齿科</a></li>
                            <li><a href="#">棋牌室</a></li>
                            <li><a href="#">洗浴/汗蒸</a></li>
                        </ul>
                    </div>
                </div>
                <div class="lunb_t">
                    <div class="picScroll_left_1">
                        <div class="bd">
                            <ul class="picList">
                                <li>
                                    <div class="pic"><a href="#" target="_blank"><img
                                                src="{{asset ('org/shop')}}/images/lengy.jpg"/></a></div>
                                    <div class="title"><a href="#" target="_blank">卡通美食冷饮</a><span>卡通美食冷饮全家福三人分</span>
                                        <p>￥6.00</p></div>
                                </li>
                                <li>
                                    <div class="pic"><a href="#" target="_blank"><img
                                                src="{{asset ('org/shop')}}/images/lengy.jpg"/></a></div>
                                    <div class="title"><a href="#" target="_blank">卡通美食冷饮</a><span>卡通美食冷饮全家福三人分</span>
                                        <p>￥6.00</p></div>
                                </li>
                                <li>
                                    <div class="pic"><a href="#" target="_blank"><img
                                                src="{{asset ('org/shop')}}/images/lengy.jpg"/></a></div>
                                    <div class="title"><a href="#" target="_blank">卡通美食冷饮</a><span>卡通美食冷饮全家福三人分</span>
                                        <p>￥6.00</p></div>
                                </li>
                            </ul>
                        </div>
                        <div class="hd">
                            <ul></ul>
                        </div>
                    </div>
                    <script type="text/javascript">
                        jQuery(".picScroll_left_1").slide({
                            titCell: ".hd ul",
                            mainCell: ".bd ul",
                            autoPage: true,
                            effect: "left",
                            autoPlay: true,
                            vis: 1,
                            trigger: "click"
                        });
                    </script>

                </div>
            </div>
            <div class="toum_">
                <ul>
                    <li><a href="#"><img src="{{asset ('org/shop')}}/images/jiudi_kez.jpg">
                            <div class="jiank_meis_wenz_1">
                                <p>健康美食</p>
                            </div>
                        </a>
                    </li>
                    <li class="sdfs"><a href="#"><img src="{{asset ('org/shop')}}/images/xiux_yvl.jpg">
                            <div class="jiank_meis_wenz_1">
                                <p>休闲娱乐</p>
                            </div>
                        </a>
                    </li>
                    <li><a href="#"><img src="{{asset ('org/shop')}}/images/liren.jpg">
                            <div class="jiank_meis_wenz_1">
                                <p>丽人</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--周边-->
        <div class="zhoub">
            <div class="neir_biaot">
                <p>周边</p>
                <p class="yingw">periphery</p>
            </div>
            <div class="zhoub_neir">
                <ul>
                    <li><a href="#"><img src="{{asset ('org/shop')}}/images/zoub.jpg"></a></li>
                    <li><a href="#"><img src="{{asset ('org/shop')}}/images/zoub2.jpg"></a></li>
                    <li><a href="#"><img src="{{asset ('org/shop')}}/images/zoub3.jpg"></a></li>
                </ul>
            </div>
        </div>

    </div>

    <!--快速通道栏-->
    <div class="kuanjlan">
        <ul class="clearfix">
            <li>
                <div class="list-li-box">
                    <a class="list-img" href="#" data-code="index01004-1" target="_blank">
                        <img src="{{asset ('org/shop')}}/images/meinv_1.jpg">
                        <span class="list-bg"></span>
                        <div class="list-cont">
                            <p class="cont-item"><span>羽饰</span></p>
                            <p class="cont-tile">秋季来点羽毛元素</p>
                            <p class="cont-info">让你更加美丽迷人</p>
                        </div>
                    </a>
                </div>

            </li>
            <li>
                <div class="list-li-box">
                    <a class="list-img" href="#" data-code="index01004-2" target="_blank">
                        <img src="{{asset ('org/shop')}}/images/meinv_2.jpg">
                        <span class="list-bg"></span>
                        <div class="list-cont">
                            <p class="cont-item"><span>原宿风</span></p>
                            <p class="cont-tile">个性夸张美衣</p>
                            <p class="cont-info">潮流原宿风</p>
                        </div>
                    </a>
                </div>

            </li>
            <li>
                <div class="list-li-box">
                    <a class="list-img" href="#" data-code="index01004-3" target="_blank">
                        <img src="{{asset ('org/shop')}}/images/meinv_3.jpg">
                        <span class="list-bg"></span>
                        <div class="list-cont">
                            <p class="cont-item"><span>皮裤</span></p>
                            <p class="cont-tile">高腰修身皮裤</p>
                            <p class="cont-info">轻松享受女神感觉</p>
                        </div>
                    </a>
                </div>

            </li>
            <li>
                <div class="list-li-box">
                    <a class="list-img" href="#" data-code="index01004-4" target="_blank">
                        <img src="{{asset ('org/shop')}}/images/meinv_4.jpg">
                        <span class="list-bg"></span>
                        <div class="list-cont">
                            <p class="cont-item"><span>服装</span></p>
                            <p class="cont-tile">变身女神范儿</p>
                            <p class="cont-info">几种搭配轻松打造</p>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>


    <!--层次-->



    <script type="text/javascript">jQuery(".slideTxtBox").slide();</script>
    <script type="text/javascript">jQuery(".slideTxtBox2").slide();</script>
    <script type="text/javascript">jQuery(".slideTxtBox3").slide();</script>
    <script type="text/javascript">jQuery(".slideTxtBox4").slide();</script>


    <!--广告图-->
    <div class="guangg_tu">
        <a href="#"><img src="{{asset ('org/shop')}}/images/guang_tu.jpg"></a>
    </div>


    <!--特色商品/ 热门商品-->



    <script type="text/javascript">
        jQuery(".picScroll_left").slide({
            titCell: ".hd ul",
            mainCell: ".bd ul",
            autoPage: true,
            effect: "left",
            autoPlay: true,
            vis: 2,
            trigger: "click"
        });
    </script>
@endsection
@push('js')
    <script src="{{asset ('org/shop')}}/js/index.js"></script>
    @endpush
