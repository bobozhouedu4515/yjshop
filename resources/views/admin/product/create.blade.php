@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        {{--头部--}}
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">商城管理系统</h3>
                <ol class="breadcrumb " style="color: white">
                    <li class="breadcrumb-item "><a class="breadcrumb-item"
                                                    href="{{route ('admin.product.index')}}">主页</a></li>
                    <li class="breadcrumb-item active">添加类目</li>
                </ol>
            </div>
        </div>
        {{--表单--}}
        <form action="{{route ('admin.product.store')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">

                    <div class="card ">
                        {{----}}
                        <div class="form-group">
                            <label>商品类目</label>
                            <input type="text" name="name" class="form-control" placeholder="填写商品类目">
                        </div>
                        <div class="form-group">
                            <label>选择类目</label>

                            <select class="custom-select col-12" name="pid" id="inlineFormCustomSelect">
                                <option selected="" value="0">顶级分类</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">保存</button>
        </form>
    </div>
@endsection




