@extends('home.layouts.master')
@section('content')

    <!--美食-->

    <div class="beij_center">
        <div class="meis_kuang">
            <h4>为您找到{{$goods->count()}}件商品</h4><h2>{{$kw}}</h2>
            <div class="meis_biaot">

            </div>
            <div class="meis_neir_lieb">
                <ul>
                    @foreach($goods as $good)
                        <li>
                            <a href="{{route ('home.goods.show',['id'=>$good->id])}}" class="meis_tup_kuang"><img src="{{$good->picture}}"></a>
                            <div class="meis_neir">
                                <a href="#">{{$good->description}}</a>
                                <p>提供免费WiFi</p>
                                <h4>门面价：￥{{$good->price}}</h4>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="meis_chak_quanb"><a href="#">查看全部</a></div>
        </div>
    </div>


@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/ziy.css">
@endpush
