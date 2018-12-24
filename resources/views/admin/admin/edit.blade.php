
@extends('admin.layouts.master');
@section('content')
    <div class="card card-body">
        <h4 class="card-title">修改管理员</h4>

        <form class="form-horizontal m-t-40" action="{{route ('admin.admin.update',$admin)}}" method="post">
            @csrf @method('put')
            <div class="form-group">
                <label> <span class="help">名称 </span></label>
                <input type="text" name="username" class="form-control" value="{{$admin->username}}" >
            </div>
            <div class="form-group">
                <label> <span class="help"> 密码</span></label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <div class="form-group">
                <label> <span class="help"> 确认密码</span></label>
                <input type="password" name="password_confirmation" class="form-control" value="" >
            </div>
            <button  class="btn btn-rounded  btn-info">保存</button>
        </form>
    </div>
@endsection
