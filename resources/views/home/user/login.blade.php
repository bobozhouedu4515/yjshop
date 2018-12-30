<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <title>{{hd_config ('base.title')}}——登录</title>
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/ziy.css">
</head>
<body>
<!--dengl-->
<div class="beij_center">
    <div class="dengl_logo">
        <img src="{{asset ('org/shop')}}/images/logo_1.png">
        <h1>欢迎登录</h1>
    </div>
</div>
<div class="dengl_beij">

    <div class="banner_xin">
        <img src="{{asset ('org/shop')}}/images/ss.jpg">
    </div>
    <form action="{{route ('home.user.login_store',['from'=>Request::query ('from')])}}" method="post">
        @csrf
    <div class="beij_center dengl_jvz">
        <div class="login_form">

            <div class="kengl_kuang">
                <div class="txt_kuang">
                    <input type="text" class="itxt"  placeholder="账号" name="account">
                    <input type="text" class="itxt"  placeholder="密码" name="password">
                </div>
                <div class="remember">
                    <div class="fl">
                        <input type="checkbox" name="remember" >
                        <label for="autoLoginFlag">自动登录</label>
                    </div>
                    <div class="fr">
                        <a href="{{route ('home.user.reset_password')}}" class="fl" target="_blank" title="忘记密码">忘记密码?</a>
                    </div>
                </div>
                <input type="submit" tabindex="5" value="登 录" class="btnnuw">
            </div>
            <div class="corp_login">
                <div class="mingb_shoq"><a href="{{route ('home.user.qq_connect')}}">QQ登录:<img src="{{asset ('org/shop/images/qq.png')}}" width="24px" alt=""></a></div>
                <div class="regist_link"><a href="{{route ('home.user.register')}}" target="_blank"><b></b>立即注册</a></div>
            </div>
        </div>
    </div>
    </form>
</div>


<div class="jianj_dib">
    <div class="beia_hao">
        <p>{{hd_config ('base.icp')}}</p>
        <p class="gonga_bei">京公网安备：11010602030054号</p>
    </div>
</div>
@include('layouts.message')

</body>
</html>
