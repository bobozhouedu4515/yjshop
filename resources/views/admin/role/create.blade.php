@extends('admin.layouts.master');
@section('content')
    <div class="card card-body">
        <h4 class="card-title">添加管理员</h4>

        <form class="form-horizontal m-t-40" action="{{route ('admin.role.store')}}" method="post">
           @csrf
            <div class="form-group">
                <label> <span class="help">名称 </span></label>
                <input type="text" name="title" class="form-control" >
            </div>
            <div class="form-group">
                <label> <span class="help"> 英文标识</span></label>
                <input type="text" name="name" class="form-control" >
            </div>
            <div class="form-group">
                <label> <span class="help"> 守卫类型</span></label>
                <input type="text" name="guard_name" class="form-control" >
            </div>
         <button  class="btn btn-rounded  btn-info">保存</button>
        </form>
    </div>
@endsection
