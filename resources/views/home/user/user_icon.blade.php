@extends('home.user.layouts.master')
@section('content')
    <div class="jib_xinx_kuang">
        <div class="wt">
            <ul>
                <li><a href="{{route ('home.user.user_info',['id'=>auth ()->id (),'type'=>'info'])}}">个人信息</a></li>
                <li class="dangq_hongx"><a href="{{route ('home.user.user_info',['id'=>auth ()->id (),'type'=>'icon'])}}">设置头像</a></li>
                <li><a href="{{route ('home.user.user_info',['id'=>auth ()->id (),'type'=>'more'])}}">更多个人信息</a></li>
            </ul>
        </div>
        <div class="wd">
            <div class="up_avater">
                <div class="warp_tip">
                    <div id="up_avater_btn" class="avater_btn">+上传头像</div>
                    <div class="upload_tip">
                        <p class="upload_text">仅支持JPG、JPEG、PNG图片文件，且文件小于2M</p>
                    </div>
                    <div class="upload_main">
                        <div class="up-left">
                            <div class="pic-show">
                                <div class="pic-wrap ">
                                    <img src="{{asset ('org/shop')}}/images/7_170312181624_2.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="up-right">
                            <div class="up-right-title">
                                <h5>效果预览</h5>
                                <p>你上传的图片会自动生成3种尺寸，请注意小尺寸的图片是否清晰</p>
                            </div>
                            <div class="up-top">
                                <div class="pic-100-box">
                                    <div class="pic-100 ">
                                        <img src="{{asset ('org/shop')}}/images/7_170312181624_2.jpg">
                                    </div>
                                    <span class="pic-tip">100X100像素</span>
                                </div>
                            </div>
                            <div class="uc_container">
                                <div class="up-bottom uc-pic-img">
                                    <div class="pic-60-box">
                                        <div class="pic-60 ">
                                            <img src="{{asset ('org/shop')}}/images/7_170312181624_2.jpg">
                                        </div>
                                        <span class="pic-tip">60X60像素</span>
                                    </div>
                                </div>
                                <div class="uc-min uc-pic-img">
                                    <div class="pic-30-box">
                                        <div class="pic-30 ">
                                            <img src="{{asset ('org/shop')}}/images/7_170312181624_2.jpg">
                                        </div>
                                        <span class="pic-tip">30X30像素</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="upload_btn_box">
                    <input type="button" value="保存" class="save-btn">
                </div>
            </div>
        </div>
    </div>
@endsection
