@extends('home.user.layouts.master')
@section('content')
    <div class="layui-container">
        <ul class="layui-nav layui-bg-green">
            <li class="layui-nav-item"><a href="">个人中心</a></li>
            <li class="layui-nav-item layui-this"><a href="">添加地址</a></li>
            <span class="layui-nav-bar" style="left: 283px; top: 55px; width: 0px; opacity: 0;"></span></ul>
        <div class="layui-row">
            <form class="layui-form" action="{{route ('home.address.store')}}" method="post">
                @csrf
                <div class="layui-form-item ">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">联系电话</label>
                    <div class="layui-input-inline">
                        <input type="text" name="tel_num" required lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux"></div>
                </div>
                <div class="layui-form-item" id="distpicker">
                    <label class="layui-form-label">收货地址</label>
                    <div class="layui-input-inline">
                        <select name="province" lay-filter="a" id="a"></select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="city" lay-filter="b" id="b"></select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="district" lay-filter="c" id="c"></select>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">详细地址</label>
                    <div class="layui-input-block">
                        <textarea name="detail" placeholder="请输入内容" class="layui-textarea"></textarea>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">设为默认</label>
                    <div class="layui-input-block">
                        <input type="checkbox" value="1" name="select" lay-skin="switch">
                    </div>
                </div>


                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@include('layouts.message')
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset ('org/layui/css/layui.css')}}">
@endpush
@push('js')
    <script src="{{asset ('org/layui/layui.js')}}"></script>
    <script src="{{asset ('org/shop/js/list.js')}}"></script>

    <script src="{{asset ('org/distpicker/dist/distpicker.js')}}"></script>
    <script>
        $('#distpicker').distpicker({
            province: '---- 所在省 ----',
            city: '---- 所在市 ----',
            district: '---- 所在区 ----'
        });
        layui.use(['form', 'layedit', 'laydate'], function () {
            var form = layui.form
                , layer = layui.layer
                , laydate = layui.laydate;
            //日期
            laydate.render({
                elem: '#date'
            });
            form.on('select(a)', function (data) {
                console.log(data)
                $("#a").val(data.value).change();
                form.render();
            })

            form.on('select(b)', function (data) {
                $("#b").val(data.value).change();
                form.render();
            })

            form.on('select(c)', function (data) {
                $("#c").val(data.value).change();
                form.render();
            })
        });



    </script>
@endpush
