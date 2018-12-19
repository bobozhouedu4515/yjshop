@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">类目列表</h4>
            <a href="{{route ('admin.product.create')}}" type="button" class="btn btn-success waves-effect waves-light m-r-10">添加类目</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>类目名称</th>
                        <th>编号</th>
                        <th class="text-nowrap">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{!! $product['_name'] !!}</td>
                            <td>{{$product['pid']}}</td>
                            <td class="text-nowrap">
                                <a href="{{route ('admin.product.edit',$product['id'])}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="#!" onclick="del(this)" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                <form action="{{route ('admin.product.destroy',$product['id'])}}" method="post">
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


