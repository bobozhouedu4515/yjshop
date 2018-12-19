@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">商城管理系统</h3>
                <ol class="breadcrumb " style="color: white">
                    <li class="breadcrumb-item "><a class="breadcrumb-item"
                                                    href="{{route ('admin.product.index')}}">主页</a></li>
                    <li class="breadcrumb-item active">商品列表</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">商品列表</h4>
                <a href="{{route ('admin.good.create')}}" type="button" class="btn btn-success waves-effect waves-light m-r-10">添加商品</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>商品名称</th>
                            <th>商品描述</th>
                            <th>商品图片</th>
                            <th>商品价格</th>
                            <th class="text-nowrap">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($goods as $good)
                            <tr>
                                <td>{{$good->name}}</td>
                                <td>{{$good->description}}</td>
                                <td><img src="{{$good->picture}}" alt="" width="50"></td>
                                <td>{{$good->price}}</td>
                                <td class="text-nowrap">
                                    <a href="{{route ('admin.good.edit',$good)}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a href="#!" onclick="del(this)" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                    <form action="{{route ('admin.good.destroy',$good)}}" method="post">
                                        @csrf @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
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


