<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>wemall微商城</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/Public/login/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/Public/login/dist/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/Public/login/dist/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/Public/login/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/Public/login/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/Public/login/dist/js/html5shiv.min.js"></script>
    <script src="/Public/login/dist/js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page" style="background-image:url('<?php echo ($wallpaper); ?>');background-size: cover;">
<div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body" style="margin-top:-65px">
        <div class="login-logo" style="margin: 30px 10px">
            <img src="/Public/login/dist/img/logo.png">
        </div>

        <form action="<?php echo U('Multi/Login/forgetPassword');?>" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="您注册时的邮箱" name="email" id="email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="邮箱验证码" name="smsVerify" required
                       style="width: 70%;float: left">
                <button class="btn btn-default" id="btnSendCode"  onclick="checkemail()"
                        style="width: 30%;border: 1px solid #ccc;border-radius:0px;height: 34px;border-left: 0px">发送验证码
                </button>
            </div>
            <!--<div class="form-group has-feedback">-->
            <!--    <input type="text" class="form-control" placeholder="验证码" name="verify" required-->
            <!--           style="width: 70%;float: left">-->
            <!--    <img id="changeVerity" src="<?php echo U('Multi/Login/getVerify');?>"-->
            <!--         style="width: 30%;border: 1px solid #ccc;height: 34px;border-left: 0px">-->
            <!--</div>-->
            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">找回密码</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <!--<hr/>-->
        <a href="<?php echo U('Multi/Public/login');?>" class="text-center">开始登录</a>

        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<div class="common_footer">Powered by wemallshop | Copyright © <a href="http://www.wemallshop.com/"
                                                                target="_blank">www.wemallshop.com</a>
    All rights reserved.
</div>

<!-- jQuery 2.1.4 -->
<script src="/Public/login/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="/Public/login/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/Public/login/plugins/iCheck/icheck.min.js"></script>
<!-- layer -->
<script src="/Public/login/layer/layer.js"></script>
<script>
      // var countdown=60;
    var InterValObj; //timer变量，控制时间
    var count = 60; //间隔函数，1秒执行
    var curCount;//当前剩余秒数
    
    function checkemail() {
        curCount = count;
        var email = $('#email').val();
        if (email) {
            //向后台发送处理数据
            var url0 = '<?php echo U("Multi/Login/checkemail");?>';
            $.post(url0, {email:$('#email').val()},
                function(data){
                    if(data == 0){
                        sendemail();
                        $('#email').focus(); 
                    }else{
                        layer.msg('该邮箱未被注册');
                        $('#email').focus(); 
                    }
                }
            );//这里返回的类型有：json,html,xml,text
        }
    }

    function sendemail() {
        //设置button效果，开始计时
        $("#btnSendCode").attr("disabled", true);
        $("#btnSendCode").html(curCount + "秒再获取");
        InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
        
        // //向后台发送处理数据
        var url = '<?php echo U("Multi/Login/emailsms");?>';
        $.post(url, {email:$('#email').val()},
            function(data){
                layer.msg(data);
                console.log(data);
            }
        );//这里返回的类型有：json,html,xml,text  
    }
    //timer处理函数
    function SetRemainTime() {
        if (curCount == 0) {                
            window.clearInterval(InterValObj);//停止计时器
            $("#btnSendCode").removeAttr("disabled");//启用按钮
            $("#btnSendCode").html("重新发送");  
        }
        else {
            curCount--;
            $("#btnSendCode").html(curCount + "秒再获取");
        }
    }


    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        $('#changeVerity').click(function () {
            $(this).attr('src', '<?php echo U('Multi/Login/getVerify');?>');
        });
        $('#changeVerity').click();
    });
</script>
</body>
</html>