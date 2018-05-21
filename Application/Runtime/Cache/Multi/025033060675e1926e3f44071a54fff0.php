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
    <style>
        .login-page {
            background:url('/Public/WallPage/bg.jpg') no-repeat center center;
            background-size: cover;
        }

        .login-box {
            width: 400px;
            margin: 9% auto;
        }

        .login-box-body {
            padding: 32px 42px;
            background-color: #fff
        }

        .login-logo {
            margin-bottom: 24px;
            font-weight: 500;
            text-align: center;
            letter-spacing: 2px;
            color: #2f6dc7;
        }

        .login-logo img {
            max-width: 40%;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-control {
            height: 38px;
            border-radius: 4px;
        }

        .btn.btn-flat {
            border-radius: 4px;
        }

        .btn-block {
            height: 40px;
            line-height: 30px;
        }

        .btn-primary {
            background-color: #2f6dc7;
            border-color: #2f6dc7;
        }

        .verfiy-inp {
            width: 70%;
            float: left;
            border-right: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .verifyImg {
            width: 30%;
            height: 38px;
            border: 1px solid #ccc;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .verifyImg.btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">    
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="login-logo">
            <!-- <img src="/Public/login/dist/img/logo.png" > -->
            东方道合后台系统
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
                <input type="text" class="form-control verfiy-inp" placeholder="验证码" name="verify" required>
                <img id="changeVerity" src="<?php echo U('Multi/Public/verify');?>" class="verifyImg">
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
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                </div>
                
               <!-- <div style="color:red;margin-left: 16px;">
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
                <div style="color:red;margin-left: 16px;">客服 Q Q：2034210985</div>-->
                <!-- /.col -->
            </div>
        </form>
        <!--<hr/>-->
       <!-- <a href="<?php echo U('Multi/Login/register');?>" class="text-center">开始注册</a><br/>
        <a href="<?php echo U('Multi/Login/forgetPassword');?>" class="text-center">忘记密码?</a>-->

        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!--<div class="common_footer">Powered by wemallshop | Copyright © <a href="http://www.wemallshop.com/"
                                                              target="_blank">www.wemallshop.com</a>
    All rights reserved.
</div>-->

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