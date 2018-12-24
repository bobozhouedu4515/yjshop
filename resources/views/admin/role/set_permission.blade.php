@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <form action="{{route ('admin.set_permission_store',$role)}}" method="post">
                    @csrf
                    <h4 class="card-title">设置权限</h4>
                    <ul class="icheck-list">
                        @foreach($permissions as $permission)
                            <div class="demo-checkbox">
                                <input type="checkbox" name="name[]" @if($role->hasPermissionTo($permission)) checked @endif
                                       value="{{$permission->name}}" id="basic_checkbox_{{$permission->id}}" >
                                <label for="basic_checkbox_{{$permission->id}}">{{$permission->title}}</label>

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
