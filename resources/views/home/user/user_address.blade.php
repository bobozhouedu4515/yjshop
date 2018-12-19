@extends('home.user.layouts.master')
@section('content')
    <div id="app">
    <div class="jib_xinx_kuang">
        <div class="shand_piaot">收货地址</div>
        <div class="shouh_diz_beij">

            <div class="shouh_diz_kuang shouh_diz_kuang_mor">
                <div class="item">
                    <span class="labal">收件人：</span>
                    <p></p>
                </div>

                <div class="item">
                    <span class="labal">收货地址：@{{message}}</span>
                    <p></p>
                </div>
                <div class="item">
                    <span class="labal">联系方式：</span>
                    <p></p>
                </div>
                <div class="bianj_yv_shanc">
                    <div class=""><a href="" data-reveal-id="myModal">修改收货地址</a></div>
                    {{--<a href="{{route ('home.address.edit',$address)}}" data-reveal-id="myModal" >编辑</a>--}}
                    <a href="JavaScript:;" >删除</a>

                </div>
            </div>

                <div class="xinz_shouh_dz_ann"><a href="#" data-reveal-id="myModal">新增收货地址</a></div>
        </div>


    </div>
    <form action="{{route ('home.address.store')}}" method="post">
        @csrf
    <div id="myModal" class="reveal-modal">
        <div class="xint_biaot">
            <h3>新添收货地址</h3>
        </div>
        <div class="shouj_diz_b">
            <div class="biaod_1">
                <p><em>*</em>联系人：</p>
                <input type="text" name="name" class="text")>
            </div>
            <div class="biaod_1">
                <p><em>*</em>收货地址：</p>
                <div class="xinz_diz_cs">
                    <div class="docs-methods">
                        <form class="form-inline">
                            <div id="distpicker">
                                <div class="form-group">
                                    <div style="position: relative;">
                                        <input id="city-picker3" class="form-control" name="address" readonly type="text" value="北京市/北京市/朝阳区" data-toggle="city-picker">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="biaod_1">
                <p><em>*</em>详细地址：</p>
                <input type="text" name="tiny_address" class="text text1")>
            </div>
            <div class="biaod_1 biaod_2">
                <div class="liangp_e">
                    <p><em>*</em>手机号码：</p>
                    <input type="text" name="tel" class="text")>
                </div>
                <span class="huo_z">或</span>
                <div class="liangp_e">
                    <p>固定电话：</p>
                    <input type="text" name="tel_bak" class="text")>
                </div>
            </div>
            <div class="biaod_1">
                <p>邮箱：</p>
                <input type="text" class="text text1")>
            </div>
            <div class="biaod_1">
                {{--<a href="#" class="diz_baoc">保存</a>--}}
                <input type="submit" class="diz_baoc">
            </div>
        </div>
        <a class="close-reveal-modal">&#215;</a>
    </div>
    </form>
    </div>
@include('layouts.message')
    @endsection
@push('js')
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/jquery.reveal.js"></script>
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/chengs/jquery.js"></script>
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/chengs/bootstrap.js"></script>
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/chengs/city-picker.data.js"></script>
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/chengs/city-picker.js"></script>
    <script type="text/javascript" src="{{asset ('org/shop')}}/js/chengs/main.js"></script>
    {{--<script type="text/javascript" src="{{asset ('org/layer')}}/layer.js"></script>--}}
    {{--<script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.min.js"></script>--}}
    {{--<script src="https://cdn.bootcss.com/vue/2.5.21/vue.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}
    <script>
   // new Vue({
   //     el:'#app',
   //     data:{
   //         message:1111
   //     }
   // })
    </script>



        <script>
            function del(obj) {
                swal("确定删除吗?", {
                    buttons: {
                        cancel: "取消",
                        catch: {
                            text: "确定",
                            value: "catch",
                        },
                    },
                })
                    .then((value) => {
                        switch (value) {
                            case "catch":
                                $(obj).next('form').submit();
                                break;
                            default:
                        }
                    });
            }
        </script>

    @endpush

