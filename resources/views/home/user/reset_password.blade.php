<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <title>WangID通城——个人注册</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/ziy.css">
    <!--  <script src="js/jquery-1.11.3.min.js" ></script>
    <script src="js/index.js" ></script>  -->
    <!-- <script type="text/javascript" src="js/jquery1.42.min.js"></script> -->
    <!--
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
     <script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.source.js"></script> -->

</head>
<body>
<!--dengl-->
<div class="yiny">
    <div class="beij_center">
        <div class="dengl_logo">
            <img src="{{asset ('org/shop')}}/images/logo_1.png">
            <h1>修改密码</h1>
        </div>
    </div>
</div>
<div class="beij_center">
    <div class="ger_zhuc_beij">
        <div class="ger_zhuc_biaot">
            <ul>
                <li class="ger_border_color"><a href="zhuc.html">找回密码</a></li>
                <i>丨</i>
                <li><a href="shenq_ruz.html">申请入驻</a></li>
                <p>我想起来密码了!<a class="ftx-05 ml10" href="{{route ('home.user.login')}}">登录</a></p>
            </ul>
        </div>
        <div class="zhuc_biaod">
            <form action="{{route ('home.user.reset_password_store')}}" method="post">
                @csrf
                <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">邮箱地址：</label>
              	</span>
                    <input   class="i-text" type="email" name="email" value="13934873532@163.com">
                    <!--备注————display使用 inline-block-->
                    <div class="msg-box">
                        <div class="msg-weak err-tips"  style="display:none;"><div>手机号不能为空</div></div>
                    </div>
                </div>

                <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">设置密码：</label>
              	</span>
                    <input   class="i-text" type="password" name="password">
                    <!--备注————display使用 inline-block-->

                </div>
                <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">确认密码：</label>
              	</span>
                    <input   class="i-text " name="password_confirmation" type="password">
                    <!--备注————display使用 inline-block-->

                </div>

                <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">验证码：</label>
              	</span>
                    <input   class="i-text i-short" name="code" type="text">
                    <div class="check check-border" style="position:relative;left:0">
                        <a class="check-phone" style="padding:11px 10px 14px 10px;*line-height:60px;" id="bt">获取验证码</a>
                    </div>
                    <!--备注————display使用 inline-block-->
                    <div class="msg-box">
                        <div class="msg-weak err-tips"  style="display:none;" ><div>请输入短信验证码</div></div>
                    </div>
                </div>
                <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name"> </label>
              	</span>

                </div>
                <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name"> </label>
              	</span>
                    <input class="reg-btn"  value="提交资料" type="submit">
                </div>
            </form>
        </div>
        <div class="xiaogg">
            <img src="{{asset ('org/shop')}}/images/cdsgfd.jpg">
        </div>
    </div>
</div>


<div class="jianj_dib jianj_dib_1">
    <div class="beia_hao">
        <p>京ICP备：14012449号 黔ICP证：B2-20140009号  </p>
        <p class="gonga_bei">京公网安备：11010602030054号</p>
    </div>
</div>
{{--<script src="{{asset ('org')}}/hdjs/require.js"></script>--}}
{{--<script src="{{asset ('org')}}/hdjs/config.js"></script>--}}
{{--<script src="{{asset ('org')}}/hdjs/hdjs.js"></script>--}}
{{--<script src="{{asset ('org')}}/hdjs/.js"></script>--}}
{{--<script>--}}
{{--require(['hdjs','bootstrap'], function (hdjs) {--}}
{{--alert(1);--}}
{{--let option = {--}}

{{--//按钮--}}
{{--el: '#bt',--}}
{{--//后台链接--}}
{{--url: '{{route ('util.code.send')}}',--}}
{{--//验证码等待发送时间--}}
{{--timeout: 60,--}}
{{--//表单，手机号或邮箱的INPUT表单--}}
{{--input: '[name="code"]'--}}
{{--};--}}
{{--hdjs.validCode(option);--}}
{{--})--}}
{{--</script>--}}
@include('layouts.message')
</body>
</html>
