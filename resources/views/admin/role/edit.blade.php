
@extends('admin.layouts.master');
@section('content')
    <div class="card card-body">
        <h4 class="card-title">修改管理员</h4>

        <form class="form-horizontal m-t-40" action="{{route ('admin.role.update',$role)}}" method="post">
            @csrf @method('put')
            <div class="form-group">
                <label> <span class="help">名称 </span></label>
                <input type="text" name="title" class="form-control" value="{{$role->title}}" >
            </div>
            <div class="form-group">
                <label> <span class="help"> 英文标识</span></label>
                <input type="text" name="name" class="form-control" value="{{$role->name}}">
            </div>
            <div class="form-group">
                <label> <span class="help"> 守卫类型</span></label>
                <input type="text" name="guard_name" class="form-control" value="{{$role->guard_name}}" >
            </div>
            <button  class="btn btn-rounded  btn-info">保存</button>
        </form>
    </div>
@endsection
