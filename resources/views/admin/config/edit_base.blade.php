@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <form method="post" action="{{route('admin.config.update',['name'=>$name])}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">网站标题</label>
                        <input type="text" name="title" value="{{$config['content']['title']}}" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">网站关键词</label>
                        <input type="text" name="keyword" value="{{$config['content']['keyword']}}" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">网站描述</label>
                        <input type="text" name="description" value="{{$config['content']['description']}}" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">icp</label>
                        <input type="text" name="icp" class="form-control" value="{{$config['content']['icp']}}" id="exampleInputEmail1" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary">保存</button>
                </form>

            </div>

        </div>
    </div>
@endsection
