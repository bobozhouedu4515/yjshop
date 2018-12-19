<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            <h1>欢迎注册</h1>
        </div>
    </div>
</div>
<div class="beij_center">
    <div class="ger_zhuc_beij">
        <div class="ger_zhuc_biaot">
            <ul>
                <li class="ger_border_color"><a href="zhuc.html">个人注册</a></li>
                <i>丨</i>
                <li><a href="shenq_ruz.html">申请入驻</a></li>
                <p>我已经注册，现在就<a class="ftx-05 ml10" href="{{route ('home.user.login')}}">登录</a></p>
            </ul>
        </div>
        <div class="zhuc_biaod">
            <form action="{{route ('home.user.register_store')}}" method="post">
                @csrf
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">用户名：</label>
              	</span>
                    <input class="i-text" name="name" type="text">
                    <!--备注————display使用 inline-block-->
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">设置密码：</label>
              	</span>
                    <input class="i-text" type="text" name="password">
                    <!--备注————display使用 inline-block-->

                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">确认密码：</label>
              	</span>
                    <input class="i-text " name="password_confirmation" type="text">
                    <!--备注————display使用 inline-block-->

                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">邮箱地址：</label>
              	</span>
                    <input class="i-text" type="email" name="email" value="13934873532@163.com" id="email">
                    <!--备注————display使用 inline-block-->
                    <div class="msg-box">
                        <div class="msg-weak err-tips" style="display:none;">
                            <div>手机号不能为空</div>
                        </div>
                    </div>
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">验证码：</label>
              	</span>
                    <input class="i-text i-short" name="code" type="text">
                    <div class="check check-border" style="position:relative;left:0">
                        <a class="check-phone" style="padding:11px 10px 14px 10px;*line-height:60px;" onclick="send()">获取验证码</a>
                    </div>
                    <!--备注————display使用 inline-block-->
                    <div class="msg-box">
                        <div class="msg-weak err-tips" style="display:none;">
                            <div>请输入短信验证码</div>
                        </div>
                    </div>
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name"> </label>
              	</span>
                    <div class="dag_biaod">
                        <input type="checkbox" value="english">
                        阅读并同意
                        <a href="#" class="ftx-05 ml10">《wangdi通城用户注册协议》</a>
                        <a href="#" class="ftx-05 ml10">《隐私协议》</a>
                    </div>
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name"> </label>
              	</span>
                    <input class="reg-btn" value="立即注册" type="submit">
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
        <p>京ICP备：14012449号 黔ICP证：B2-20140009号 </p>
        <p class="gonga_bei">京公网安备：11010602030054号</p>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function send() {
        var data = document.getElementById('email').value;
        // console.log(data)
        $.ajax({
            url: '{{route ('util.code.send')}}',
            type: 'post',
            data: {email: data},
            dataType: 'json',
            success: function (res) {
                if (res.code==1) {
                    swal({
                        text:'发送成功',
                        icon:'success',
                        button:false
                    })
                }else {
                    swal({
                        text:'服务器繁忙',
                        icon:'danger',
                        button:false
                    })
                }
            }
        })
    }
</script>
@include('layouts.message')
</body>
</html>
