<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>wemall多用户微商城</title>
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
            <img src="/Public/login/dist/img/logo.png" >
        </div>

        <form action="<?php echo U('Multi/Public/login');?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="账号" name="username" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="密码" name="userpass" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="验证码" name="verify" required
                       style="width: 70%;float: left">
                <img id="changeVerity" src="<?php echo U('Multi/Public/verify');?>"
                     style="width: 30%;border: 1px solid #ccc;height: 34px;border-left: 0px">
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <!-- <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> 记住我
                        </label>
                    </div> -->
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                </div>
                
                <div style="color:red;margin-left: 16px;">
                    超管后台地址：(体验账号/密码：admin/admin)
                    <a href="http://demo.wemallshop.com/wfx3/Admin/Public/login" class="text-center">
                        http://demo.wemallshop.com/wfx3/Admin
                    </a><br/>
                </div>
                <div style="color:red;margin-left: 16px;">
                    商家后台地址：(体验账号/密码：1/1)
                    <a href="http://demo.wemallshop.com/wfx3/Multi/Public/login" class="text-center">
                        http://demo.wemallshop.com/wfx3/Multi
                    </a><br/>
                </div>
                <div style="color:red;margin-left: 16px;">
                    微信前台地址：(请在微信端打开)
                    <a href="http://demo.wemallshop.com/wfx3/App/index/shop" class="text-center">
                        http://demo.wemallshop.com/wfx3/App/index/shop
                    </a><br/>
                </div>
                <hr style="height:1px;border:none;border-top:1px dashed #0066CC;" />
                <div style="color:red;margin-left: 16px;">客服 Q Q：2034210985</div>
                <!-- /.col -->
            </div>
        </form>
        <!--<hr/>-->
        <a href="<?php echo U('Multi/Login/register');?>" class="text-center">开始注册</a><br/>
        <a href="<?php echo U('Multi/Login/forgetPassword');?>" class="text-center">忘记密码?</a>

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
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        $('#changeVerity').click(function () {
            $(this).attr('src', '<?php echo U('Multi/Public/verify');?>');
        });
        $('#changeVerity').click();
    });
</script>
</body>
</html>