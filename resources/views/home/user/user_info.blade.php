@extends('home.user.layouts.master')
@section('content')
    <div class="jib_xinx_kuang">
        <div class="wt">
            <ul>
                <li class="dangq_hongx"><a href="{{route ('home.user.user_info',['id'=>auth ()->id (),'type'=>'info'])}}">个人信息</a></li>
                <li><a href="{{route ('home.user.user_info',['id'=>auth ()->id (),'type'=>'icon'])}}">设置头像</a></li>
            </ul>
        </div>
        <form action="{{route ('home.user.update',auth ()->user ())}}"  method="post">
            @csrf @method('put')
        <div class="wd">
            <div class="user_set">
                <div class="item_meic">
                    <span class="label_meic"><em>*</em> 昵称：</span>
                    <div class="fl_e">
                        <input type="text" class="itxt_succ itxt_succ_url" maxlength="20" id="nickName" name="name" value="{{auth ()->user ()->name}}">
                    </div>
                </div>
                <div class="item_meic">
                    <span class="label_meic">登录邮箱：</span>
                    <div class="fl_e">
                        <strong>{{auth ()->user ()->email}}</strong>
                        <span class="ftx03">已验证</span>
                    </div>
                </div>

                <div class="item_meic">
                    <span class="label_meic">性别：</span>
                    <div class="fl_e">
                        <input type="radio" name="sex" class="jdradio" @if(auth ()->user ()->sex=='男')checked @endif value="男">
                        <label class="mr10">男</label>
                        <input type="radio" name="sex" class="jdradio" @if(auth ()->user ()->sex=='女')checked @endif  value="女">
                        <label class="mr10">女</label>
                        <input type="radio" name="sex" class="jdradio" @if(auth ()->user ()->sex=='保密')checked @endif  value="保密">
                        <label class="mr10">保密</label>
                    </div>
                </div>


                <div class="item_meic">
                    <span class="label_meic"><em>*</em> 姓名：</span>
                    <div class="fl_e">
                        <input type="text" name="username" value="{{auth ()->user ()->username}}" class="user_address">
                        <p class="youh_tis ftx03">输入真实姓名，不得超过20个英文或10个汉字</p>
                    </div>
                </div>
                <div class="item_meic">
                    <span class="label_meic"> </span>
                    <div class="fl_e">
                        <input type="submit" value="保存" class="savebtn">
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    @endsection
