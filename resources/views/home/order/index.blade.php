@extends('home.user.layouts.master')
@section('content')
    <ul class="layui-nav layui-bg-green">
        <li class="layui-nav-item"><a href="">个人中心</a></li>
        <li class="layui-nav-item layui-this"><a href="">订单列表</a></li>
        <span class="layui-nav-bar" style="left: 283px; top: 55px; width: 0px; opacity: 0;"></span></ul>
    <table class="layui-table">

        <colgroup>
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>订单编号</th>
            <th>订单总价</th>
            <th>数量</th>
            <th>订单状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->number}}</td>
                <td>¥:{{$order->total_price}}元</td>
                <td>{{$order->total_num}}</td>
                <td>
                    <div class="layui-btn-group" style="width: 450px">
                        @if($order->status>1)
                            <a href="JavaScript:;"
                               class="layui-btn layui-btn-normal">已支付</a>
                        @else
                            <a href="{{route ('pay.pay_wechat',['id'=>$order->id])}}" class="layui-btn  ">去支付</a>
                        @endif

                        @if($order->status>3)
                            <a href="javaScript:;"
                               class="layui-btn layui-btn-normal">已发货</a>
                        @elseif($order->status!=5)
                            <a href="JavaScript:;" class="layui-btn ">未发货</a>
                        @endif

                        @if($order->status>=5)
                            <a href="javaScript:;"
                               class="layui-btn layui-btn-normal ">已经收货</a>
                        @else
                            <a href="{{route ('home.user.receipt',$order)}}" class="layui-btn " >确认收货</a>
                        @endif
                            @if($order->status==5)
                            <a href="{{route ('home.comment.create',['id'=>$order->id])}}" class="layui-btn " >去评价</a>
                                @elseif($order->status==6)
                                <a href="JavaScript:;" class="layui-btn layui-btn-normal " >已评价</a>
                            @endif
                            @if($order->status==6)
                                <a href="javaScript:;"
                                   class="layui-btn layui-btn-normal ">交易完成</a>
            @endif
                    </div>
                </td>
                <td>
                    <a href="JavaScript:;" onclick="del()">
                        <button class="layui-btn layui-btn-danger">删除</button>
                    </a>
                    <form action="" method="post">
                        @csrf  @method('delete')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
@push('css')
    <link rel="stylesheet" href="{{asset ('org/layui/css/layui.css')}}">
@endpush
@push('js')
    <script src="{{asset ('org/layui/layui.js')}}"></script>
    <script>
        function del() {
            swal("你还没登录,点确定去登录", {
                buttons: {
                    cancel: "取消",
                    catch: {
                        text: "确定",
                        value: "catch",
                    },
                },
            }).then((value) => {
                switch (value) {
                    case "catch":

                        break;
                    default:
                }
            });
        }
    </script>


@endpush
