@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <form action="{{route ('admin.set_role_store',$admin)}}" method="post">
                    @csrf
                    <h4 class="card-title">设置角色</h4>
                    <ul class="icheck-list">
                        @foreach($roles as $role)
                            <div class="demo-checkbox">
                                <input type="checkbox" @if($admin->hasRole($role)) checked @endif
                                       name="name[]" value="{{$role->name}}" id="basic_checkbox_{{$role->id}}">
                                <label for="basic_checkbox_{{$role->id}}">{{$role->title}}</label>
                            </div>
                       @endforeach
                    </ul>


                   <div>
                       <button type="submit" class="btn waves-effect waves-light btn-info">保存</button>
                   </div>
                </form>

            </div>
        </div>
    </div>
    @endsection
