@extends('home.user.layouts.master')
@section('content')
    <ul class="layui-nav layui-bg-green">
        <li class="layui-nav-item"><a href="">个人中心</a></li>
        <li class="layui-nav-item layui-this"><a href="">地址列表</a></li>
        <span class="layui-nav-bar" style="left: 283px; top: 55px; width: 0px; opacity: 0;"></span></ul>
    <table class="layui-table">

        <colgroup>
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>收货人</th>
            <th>收货地址</th>
            <th>联系电话</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($addresses as $address)
        <tr>
            <td>{{$address->name}}</td>
            <td>{{$address->province}}/{{$address->city}}/{{$address->distinct}}/{{$address->detail}}</td>
            <td>{{$address->tel_num}}</td>
            <td>
                <div class="layui-btn-group">

                    <a href="JavaScript:;" onclick="my_select(this,{{$address->id}})">
                        <button class="layui-btn @if($address->select==1) layui-btn-warm @else layui-btn-primary @endif">
                            @if($address->select==1) 默认地址 @else 设为默认 @endif</button>
                    </a>
                    <a href="{{route ('home.address.edit',$address)}}">  <button class="layui-btn">编辑</button></a>

                    <a href="JavaScript:;" onclick="del(this)"><button class="layui-btn layui-btn-danger">删除</button></a>
                    <form action="{{route ('home.address.destroy',$address)}}" method="post">
                        @csrf  @method('delete')
                    </form>
                </div>
            </td>
        </tr>
@endforeach
        </tbody>
    </table>
    <a href="{{route ('home.address.create')}}">  <button class="layui-btn">添加地址</button></a>

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
       function my_select(obj,id) {
            $(obj).find('button').addClass('layui-btn-warm').removeClass('layui-btn-primary').parents('tr').siblings('tr').find('td').last().find('a').first().find('button').addClass('layui-btn-primary').removeClass('layui-btn-warm')
            // $(obj).find('button').addClass('layui-btn-warm').parents('tr').siblings('tr>td:last').find('button').removeClass('layui-btn-warm')
          $.post('/home/address/select_adr',{_token:'{{csrf_token ()}}', id:id},function () {

          })

       }
    </script>



    @endpush
