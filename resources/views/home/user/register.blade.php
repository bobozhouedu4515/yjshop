<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <title>{{hd_config ('base.title')}}--个人注册</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset ('org/shop')}}/css/ziy.css">

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
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">设置密码：</label>
              	</span>
                    <input class="i-text" type="text" name="password">
                </div>
                <div class="reg-items">
              	<span class="reg-label">
                	<label for="J_Name">确认密码：</label>
              	</span>
                    <input class="i-text " name="password_confirmation" type="text">
                    <!--备注————display使用 inline-block-->

                </div>
                <div class="reg-items" id="reg_info">
              	<span class="reg-label">
                	<label for="J_Name">登录账号：</label>
              	</span>
                    <input class="i-text" type="text" name="account" onchange="is_exist()" value="" id="email">
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
                        <button id="send_btn" type="button"  style="height:40px" onclick="send(this)" >获取验证码</button>
                    </div>
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
        <p>{{hd_config ('base.icp')}} </p>

    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var status=0;
    function is_exist() {
        var data = $('#email').val();
        $.post('/home/user/is_exist',{data: data},function (res) {
            if (res.code==0){
                status=1;
                console.log(status)
                if (status==1){
                    // console.log(11)
                    //验证 如果状态码==1,说明账号存在,改变button的属性为disabled
                    $('#send_btn').attr('disabled',true);
                    $('#reg_info').append('<p style="color: red;">×账号存在</p>');

                }
            }
        });
    }

    function send(obj) {

        // alert(1);
        return;
        //抓取元素的value,初步验证数据格式
        var data = document.getElementById('email').value;
        console.log(data);
        var preg_email=/^\w+@\w+\.\w+$/;
        var  preg_pho=/[0-9]{11}/;
        if (!preg_email.test(data)&&!preg_pho.test(data)) {
            swal({
                text: '邮箱或者手机格式不正确',
                icon: 'success',
                button: false
            });
            return
        }
        //异步请求验证码
        $.ajax({
            url: '{{route ('util.code.send')}}',
            type: 'post',
            data: {account: data},
            dataType: 'json',
            success: function (res) {
                // $(obj).addClass('disabled');
                var time=60;
                var timer=setInterval(function () {
                    time--;
                    if (time==0){
                        $(obj).html('发送验证码');
                        clearInterval(timer);
                        // $(obj).html('发送验证码')
                        return;
                    }
                    $(obj).html(time+'s后重新发送')
                },1000)

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
