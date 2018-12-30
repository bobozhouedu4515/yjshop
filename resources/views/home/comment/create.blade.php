@extends('home.layouts.master')
@section('content')
    <form action="{{route ('home.comment.store',['id'=>request ()->query ('id')])}}" method="post">
        @csrf
    <div class="beij_center">
        <div class="lingj_neir_beij">
            <div class="dianp_pingj">
                <div class="dianpu_minc_ji">
                    <a href="#" class="shop_logo" target="_blank"><img src="{{asset ('org/shop')}}/images/7_170312181624_2.jpg"></a>
                    <div class="dinam_he">
                        <p class="shop_mignc">威莱登尼旗舰店</p>
                        <div class="shop_score_01">
                            <div class="sum">
                                <span class="tit s_diy">综合</span>
                                <em class="num x_diy">9.59</em>
                            </div>
                            <div class="sum">
                                <span class="tit">商品</span>
                                <em class="num">9.59</em>
                            </div>
                            <div class="sum">
                                <span class="tit">服务</span>
                                <em class="num">9.59</em>
                            </div>
                            <div class="sum">
                                <span class="tit">物流</span>
                                <em class="num">9.59</em>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dianpu_minc_you">
                    <!---->
                    <div class="shangp_xx">
                        <span class="label_2">商品符合度</span>
                        <span class="commstar">
					 		<span title="非常不满意" class="star star1 " onclick="star1(this,1)"></span>
					 		<span title="不满意" class="star star2" onclick="star1(this,2)"></span>
					 		<span title="一般" class="star star3 " onclick="star1(this,3)"></span>
					 		<span title="满意" class="star star4" onclick="star1(this,4)"></span>
					 		<span title="非常满意" class="star star5" onclick="star1(this,5)"></span>
					 		<span class="star_info" id="goods_score"></span>
					 	</span>
                        <input hidden type="text" name="goods_satisfaction" id="goods_tol" value="">
                    </div>
                    <div class="shangp_xx">
                        <span class="label_2">店家服务态度</span>
                        <span class="commstar">
					 		<span title="非常不满意" class="star star1 " onclick="star2(this,1)"></span>
					 		<span title="不满意" class="star star2" onclick="star2(this,2)"></span>
					 		<span title="一般" class="star star3" onclick="star2(this,3)"></span>
					 		<span title="满意" class="star star4" onclick="star2(this,4)"></span>
					 		<span title="非常满意" class="star star5" onclick="star2(this,5)"></span>
					 		<span class="star_info" id="shop_score"></span>
					 	</span>
                        <input hidden type="text" name="shop_satisfaction" id="shop_tol" value="">
                    </div>
                    <div class="shangp_xx">
                        <span class="label_2">物流发货速度</span>
                        <span class="commstar">
					 		<span title="非常不满意" class="star star1 " onclick="star3(this,1)"></span>
					 		<span title="不满意" class="star star2" onclick="star3(this,2)"></span>
					 		<span title="一般" class="star star3" onclick="star3(this,3)"></span>
					 		<span title="满意" class="star star4" onclick="star3(this,4)"></span>
					 		<span title="非常满意" class="star star5" onclick="star3(this,5)"></span>
					 		<span class="star_info" id="shiping_score" ></span>
					 	</span>
                        <input hidden type="text" name="shiping_satisfaction" id="shiping_tol" value="">
                    </div>
                    <div class="shangp_xx">
                        <span class="label_2">配送员服务态度</span>
                        <span class="commstar">
					 		<span title="非常不满意" class="star star1" onclick="star4(this,1)"></span>
					 		<span title="不满意" class="star star2" onclick="star4(this,2)"></span>
					 		<span title="一般" class="star star3 " onclick="star4(this,3)"></span>
					 		<span title="满意" class="star star4" onclick="star4(this,4)"></span>
					 		<span title="非常满意" class="star star5" onclick="star4(this,5)"></span>
					 		<span class="star_info" id="server_score"></span>
					 	</span>
                        <input hidden type="text" name="server_satisfaction" id="server_tol" value="">
                    </div>
                    <!--******-->
                </div>
            </div>
            <div class="shangp_pingj">
                <div class="shangp_minc_ji">
                    <div class="comment_goods">
                        <p class="zuo_img"><a href="#"><img src="{{asset ('org/shop')}}/images/lieb_tupi2.jpg"></a></p>
                        <p><a href="#">威莱登尼 棒球帽男女夏季防晒遮阳帽韩版潮鸭舌帽太阳的后裔平顶帽子 热卖纯色平</a></p>
                        <span class="zuo_jiag">￥58.00</span>
                        <span>热卖纯色平顶  黑色</span>
                    </div>
                </div>
                <div class="dianpu_minc_you">
                    <div class="shangp_many">
                        <div class="shangp_xx">
                            <span class="fop_label label_2">商品满意度</span>
                            <span class="commstar">
						 		<span title="非常不满意" class="star star1" onclick="star(this,1)"></span>
						 		<span title="不满意" class="star star2" onclick="star(this,2)"></span>
						 		<span title="一般" class="star star3 "  onclick="star(this,3)"></span>
						 		<span title="满意" class="star star4" onclick="star(this,4)"></span>
						 		<span title="非常满意" class="star star5 " onclick="star(this,5)"></span>
						 		<span class="star_info" id="good_score"></span>
						 	</span>
                            <input hidden type="text" name="satisfaction" id="good_tol" value="">
                        </div>
                    </div>
                    <div class="shangp_many">
                        <div class="fop_label">评价晒单</div>
                        <div class="fop_shur_kuang">
                            <div class="sdvg">
                                <div class="f-textarea">
                                    <textarea name="content" id="" placeholder="商品是否给力？快分享你的购买心得吧~"></textarea>
                                    <div class="textarea-ext">还可输入500字</div>
                                </div>
                            </div>
                            <div class="layui-upload">
                                <button type="button" class=" layui-btn layui-btn-success" id="test2">多图片上传</button>
                                <span class="" style="font-size: 12px; color: #999999;">按CTRL+图片可以一次上传多张图片哦!最多9张</span>
                                <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                    预览图：
                                    <div class="layui-upload-list" id="demo2"></div>
                                </blockquote>
                                <a href="JavaScript:;" id="yj_upload" class="layui-btn layui-btn-success">开始上传</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pingj_tij_ann">
                <button class=" layui-btn layui-btn-danger">保存评论</button>
                <span class="f_checkbox">
					<input type="checkbox" class="i-check">
					<label for="check1">匿名评价</label>
				</span>
            </div>
        </div>
    </div>
    </form>
    @endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/ziy.css">
    <link rel="stylesheet" href="{{asset ('org/layui/css/layui.css')}}">
    @endpush

@push('js')
    <script src="{{asset ('org/layui')}}/layui.js" charset="utf-8"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        layui.use('upload', function () {
            var $ = layui.jquery
            upload = layui.upload;
            //多图片上传
            upload.render({
                elem: '#test2',
                 url: '{{route ('util.upload')}}',
                multiple: true,
                number:9,
                auto:false,
                bindAction:'#yj_upload',
                done: function (res) {
                    //成功的回调
                    if (res.code===0){
                        $('#demo2').append('<img src="' + res.data.src + '" width="80px"  class="layui-upload-img"><input type="hidden" name="pics[]" value="' + res.data.src + '">')
                        return layer.msg('上传成功');
                    }
                    //失败的回调
                    return layer.msg('上传失败');
                }
            });
        });
    </script>



    <script>
        function star(obj,num) {
            // alert(11);
            $(obj).addClass('hover').siblings('span').removeClass('hover');
            $('#good_score').html(num+'分')
            $('#good_tol').val(num)

        }
    </script>
    <script>
        function star1(obj,num) {
            // alert(11);
            $(obj).addClass('hover').siblings('span').removeClass('hover');
            $('#goods_score').html(num+'分')
            $('#goods_tol').val(num)

        }
    </script>
    <script>
        function star2(obj,num) {
            // alert(11);
            $(obj).addClass('hover').siblings('span').removeClass('hover');
            $('#shop_score').html(num+'分')
            $('#shop_tol').val(num)

        }
    </script>
    <script>
        function star3(obj,num) {
            // alert(11);
            $(obj).addClass('hover').siblings('span').removeClass('hover');
            $('#shiping_score').html(num+'分')
            $('#shiping_tol').val(num)

        }
    </script>
    <script>
        function star4(obj,num) {
            // alert(11);
            $(obj).addClass('hover').siblings('span').removeClass('hover');
            $('#server_score').html(num+'分')
            $('#server_tol').val(num)

        }
    </script>
    @endpush
