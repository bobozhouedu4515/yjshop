@extends('admin.layouts.master')
@section('content')
    <div class="col-12">
        <div class="card-body">
            <form method="post" action="{{route('admin.config.update',['name'=>$name])}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">上传大小</label>
                    <input type="text" name="size" value="{{$config['content']['size']}}"
                           class="form-control" id="exampleInputEmail1" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">上传类型</label>
                    <input type="text" name="type" value="{{$config['content']['type']}}"
                           class="form-control" id="exampleInputEmail1" placeholder="">
                    <span class="help-block text-muted">类型如:jpg|png</span>
                </div>

                <button type="submit" class="btn btn-primary">保存</button>
            </form>
        </div>
    </div>
@endsection
