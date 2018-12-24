@extends('home.user.layouts.master')
@section('content')
    <div class="jib_xinx_kuang">
        <div class="wt">
            <ul>
                <li><a href="{{route ('home.user.user_info',['id'=>auth ()->id (),'type'=>'info'])}}">个人信息</a></li>
                <li class="dangq_hongx"><a href="{{route ('home.user.user_info',['id'=>auth ()->id (),'type'=>'icon'])}}">设置头像</a></li>
            </ul>
        </div>
        <div class="wd">
            <form action="{{route ('home.user.update',auth ()->user ())}}" method="post">
                @csrf @method('put')
            <div class="layui-upload-drag" id="test10">

                <i class="layui-icon"></i>
                <p>点击上传，或将文件拖拽到此处</p>
                <span>图片格式:jpg,png</span>
                <span>图片大小:不大于200kb</span>

            </div>
                <div>
                    <button class="layui-btn">保存</button>
                </div>


            </form>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset ('org/layui/css/layui.css')}}">
    @endpush
@push('js')
    <script src="{{asset ('org/layui/layui.js')}}"></script>
    <script>
        layui.use('upload', function() {
            var $ = layui.jquery,
                 upload = layui.upload;
            upload.render({
                elem: '#test10'
                ,url: '{{route ('util.upload')}}',
                data:{_token:'{{csrf_token ()}}'},
                done: function(res){
                    // console.log(res)
                    $('#test10').html('<img src="'+res.data.src+'" alt="" width="100px" class="layui-circle"> ' +
                        '<input hidden type="text" name="icon" value="'+res.data.src+'">')

                    // $('#test10').html('<img src="' + res.data.src + '" alt="" width="50"><input type="hidden"  name="picture" value="' + res.data.src + '">')

                }

            });

        })


    </script>
    @endpush
