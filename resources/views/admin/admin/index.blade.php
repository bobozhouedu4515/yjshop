@extends('admin.layouts.master');
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">管理员列表</h4>

                <a href="{{route ('admin.admin.create')}}"  class="btn btn-rounded  btn-info">添加管理员</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>

                        <tr>
                            <th>编号</th>
                            <th>名称</th>
                            <th>设置角色</th>
                            <th class="text-nowrap">操作</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($admins as $admin)
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->username}}</td>
                            <td><a href="{{route ('admin.set_role',$admin)}}" class="btn btn-info">设置角色</a></td>
                            <td class="text-nowrap">
                                <a href="{{route ('admin.admin.edit',$admin)}}" data-toggle="tooltip" data-original-title="修改"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="JavaScript:;" onclick="del(this)" data-toggle="tooltip" data-original-title="删除"> <i class="fa fa-close text-danger"></i> </a>
                                <form action="{{route ('admin.admin.destroy',$admin)}}" method="post">
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

