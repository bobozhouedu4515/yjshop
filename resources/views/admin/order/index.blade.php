@extends('admin.layouts.master')
@section('content')
    <ul class="layui-nav layui-bg-black">
        <li class="layui-nav-item"><a href="">订单管理</a></li>
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
            <th>订单数量</th>
            <th>订单状态</th>

        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->number}}</td>
                <td>¥:{{$order->total_price}}元</td>
                <td>{{$order->total_num}}</td>
                <td>
                    <div class="layui-btn-group">
                        @if($order->status<=1)
                            <a href="JavaScript:;"
                               class="layui-btn layui-btn-normal">未支付</a>
                        @else
                            <a href="JavaScript:;" class="layui-btn  ">已支付</a>
                        @endif

                        @if($order->status>=4)
                            <a href="JavaScript:;"
                               class="layui-btn ">已发货</a>
                        @else
                            <a href="{{route ('admin.order.shipping',$order)}}" class="layui-btn layui-btn-normal">未发货</a>
                        @endif

                        @if($order->status==5)
                            <a href="JavaScript:;"
                               class="layui-btn layui-btn-normal">已收货</a>
                        @else
                            <a href="JavaScript:;" class="layui-btn  ">未收货</a>
                        @endif
                    </div>
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
@endpush
