@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        {{--头部--}}
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">商城管理系统</h3>
                <ol class="breadcrumb " style="color: white">
                    <li class="breadcrumb-item "><a class="breadcrumb-item"
                                                    href="{{route ('admin.product.index')}}">主页</a></li>
                    <li class="breadcrumb-item active">添加类目</li>
                </ol>
            </div>
        </div>
        {{--表单--}}
        <form action="{{route ('admin.good.store')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="card col-8">
                            {{----}}
                            <div class="form-group">
                                <label>商品类目</label>
                                <input type="text" name="name" class="form-control" placeholder="填写商品类目">
                            </div>
                            <div class="form-group">
                                <label>商品价格</label>
                                <input type="number" name="price" min="0" step="0.01"  class="form-control" placeholder="填写商品价格">
                            </div>
                            <div class="form-group">
                                <label>选择类目</label>
                                <select class="custom-select col-12" name="product_id" id="inlineFormCustomSelect">
                                    <option selected="" value="0">顶级类目</option>
                                    @foreach($products as $v)
                                        <option value="{{$v['id']}}">{!! $v['_name'] !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">商品列表图片</label>
                                <div class="col-md-9">
                                    <div class="layui-upload-drag" id="test1">
                                        <i class="layui-icon"></i>
                                        <p>点击上传，或将文件拖拽到此处</p>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-upload">
                                <button type="button" class=" btn btn-success" id="test2">多图片上传</button>
                                <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                    预览图：
                                    <div class="layui-upload-list" id="demo2"></div>
                                </blockquote>

                            </div>
                            <div class="form-group">

                                <label>商品描述</label>
                                <textarea name="description" class="form-control" rows="2" ></textarea>
                            </div>
                            {{--编辑器--}}
                            <div class="form-group">
                                <label>商品详情</label>
                                <textarea id="demo" name="content" style="display: none;"></textarea>
                            </div>
                        </div>
                        <div id="app" class="card col-4">
                            <div class="card-body" v-for="(v,k) in specs">
                                <div class="form-group">

                                    <label>商品规格</label>

                                    <input type="text"  v-model="v.size" class="form-control" placeholder="填写商品规格">
                                </div>
                                <div class="form-group">
                                <label>商品颜色</label>
                                <input type="text"  v-model="v.color" class="form-control" placeholder="填写颜色">
                            </div>

                                <div class="form-group">
                                    <label>商品库存</label>
                                    <input type="number" min="0"  v-model="v.total" class="form-control" placeholder="填写商品库存">
                                </div>
                                <button type="button" @click="del(k)" class="btn btn-danger waves-effect waves-light m-r-10">删除规格</button>

                            </div>
                            <textarea hidden name="specs"  cols="30" rows="10">@{{specs}}</textarea>

                            <button type="button" @click="add()" class="btn btn-success waves-effect waves-light m-r-10">添加规格</button>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">保存</button>
            </div>

        </form>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset ('org/layui')}}/css/layui.css" media="all">

@endpush
@push('js')
    <script src="{{asset ('org/layui')}}/layui.js" charset="utf-8"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        layui.use('upload', function () {
            var $ = layui.jquery
            upload = layui.upload;

            //普通图片上传
            var uploadInst = upload.render({
                elem: '#test1',
                url: '{{route ('util.upload')}}',
                done: function (res) {
                    //失败的回调
                    // console.log(res.data.src);
                    if (res.code > 0) {
                        return layer.msg('上传失败');
                    }
                    //成功的回调
                    $('#test1').html('<img src="' + res.data.src + '" alt="" width="50"><input type="hidden"  name="picture" value="' + res.data.src + '">')
                    return layer.msg('上传成功');
                },
            });
            //多图片上传
            upload.render({
                elem: '#test2'
                , url: '{{route ('util.upload')}}'
                , multiple: true,
                done: function (res) {
                    //成功的回调
                    if (res.code===0){
                        $('#demo2').append('<img src="' + res.data.src + '"  class="layui-upload-img"><input type="hidden" name="pictures[]" value="' + res.data.src + '">')
                        return layer.msg('上传成功');
                    }
                    //失败的回调
                    return layer.msg('上传失败');
                }
            });
        });
    </script>
    <script>

        //建立编辑器
        layui.use('layedit', function(){
            var layedit = layui.layedit;
            layedit.set({
                uploadImage: {
                    url: '{{route ('util.upload')}}' ,//接口url
                    type: '' ,//默认post
                    multiple: true,

                },
            });
            layedit.build('demo');
        });
    </script>
    <script src="https://cdn.bootcss.com/vue/2.5.18-beta.0/vue.min.js"></script>
    <script>
        //Vue数据绑定
        new Vue({
            el:'#app',
            data:{
                specs:[
                    {'size':'','total':'','color':''}
                ]
            },
            methods:{
                add(){
                    var spec={'size':'','total':'','color':''}
                    this.specs.push(spec)
                },
                del(k){
                    this.specs.splice(k,1)
                }
            }
        })
    </script>
@endpush


