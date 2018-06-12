<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta content="yes" name="apple-touch-fullscreen" />
	<meta content="black" name="apple-mobile-web-app-status-bar-style" />
	<meta content="telephone=no" name="format-detection" />
	<title>道合商城_品质生活，健康人生_健康养生平台</title>
	<meta name="keywords" content="道合商城,东方道合,东方道合国际,保健产品,生殖美疗,保健食品,美容护肤,日化产品,酒水系列,健康器械,资产配置,医疗美容,隆力奇" />
	<meta name="description" content="东方道合，致力于为全球家庭提供健康美丽的生活方式，提供品质高端的养生健康产品，专业为您的健康美丽保驾护航！ " />
	<link rel="stylesheet" href="/Public/App/css/iconfont/iconfont.css">
	<link rel="stylesheet" href="/Public/App/css/swiper-3.4.2.min.css">
	<link rel="stylesheet" href="/Public/App/css/style2.css">
	<link rel="stylesheet" href="/Public/App/css/layout.css">
	<link rel="stylesheet" href="/Public/App/css/style.css" >
</head>

<script type="text/javascript" src="/Public/App/js/zepto.min.js"></script>
<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
<script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
<body>
<div class="page page-login" id="page-login">

	<!--内容区-->
	<div class="content">
		<div style="float:right;margin-right:10px;padding-top:10px;">
			<a href="<?php echo U('App/Shop/index',array('shopid'=>21));?>" class="iconfont icon-home-head" style="font-size: 1.1rem;color: white;"></a>
		</div>
		<div class="title-logo">

			<img src="/Public/App/images/logo.png" alt="东方合道">

		</div>

		<div class="content-block borTop-0 borBot-0">
			<form action="">
				<ul class="form-group">
					<li>
						<input type="text" class="inp" name="mobile" id="mobile" placeholder="请输入手机号">
						<label for="" class="iconfont icon-mobile"></label>
					</li>
					<li>
						<input type="password" class="inp" name="password" id="password" placeholder="请填输入密码">
						<label for="" class="iconfont icon-password1"></label>
					</li>
				<!--	<li>
						<input type="text" class="inp" name="" placeholder="请填输入验证码">
						<label for="" class="iconfont icon-password"></label>
						<a class="btn-verfiy">获取验证码</a>
						&lt;!&ndash; <a class="btn-verfiy active">已发送(59)s</a> &ndash;&gt;
					</li>-->
					<li class="mt-40">
						<input type="button" class="button sub" value="登录">
					</li>
					<li class="font-12 color-light">
						<a href="<?php echo U('App/Vip/retrieve');?>" class="pull-left">找回密码</a>
						<a href="<?php echo U('App/Vip/reg');?>" class="pull-right" >注册账号</a>
					</li>
				</ul>
			</form>
		</div>

	</div>
</div>
<script type="text/javascript">
	$(".sub").click(function(){
		var re = /^1\d{10}$/;
		var phone = $("[name='mobile']").val();
		var password = $("[name='password']").val();

		if(!re.test(phone)){
			zbb_msg("手机号码错误");
		}else if(password==''){
			zbb_msg('请输入密码');
		}else{
			var fun=function(){
				window.location.href="/App/vip/index";
			}
			$.ajax({
				url:"<?php echo U('App/Vip/login_ajax');?>",
				data:{
					mobile:phone,
					password:password,
				},
				type:'post',
				dataType: "json",
				success: function(data){
					if(data.state_code==1){
						zbb_msg(data.msg,fun);
					}else{
						zbb_msg(data.msg);
					}
				},
				/*   error:function (e) {
				 layer.msg('服务器出错啦,请稍后再试');
				 }*/
			})
		};
	});
</script>
</body>