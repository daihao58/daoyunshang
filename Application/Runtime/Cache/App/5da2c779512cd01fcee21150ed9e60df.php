<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta content="yes" name="apple-touch-fullscreen" />
	<meta content="black" name="apple-mobile-web-app-status-bar-style" />
	<meta content="telephone=no" name="format-detection" />
	<title></title>
	<meta name="keywords" content=" " />
	<meta name="description" content=" " />
	<link rel="stylesheet" href="/Public/App/css/iconfont/iconfont.css">
	<link rel="stylesheet" href="/Public/App/css/swiper-3.4.2.min.css">
	<link rel="stylesheet" href="/Public/App/css/style2.css">
	<link rel="stylesheet" href="/Public/App/css/layout.css">
	<link rel="stylesheet" href="/Public/App/css/style.css" />
</head>

<script type="text/javascript" src="/Public/App/js/zepto.min.js"></script>
<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
<script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
<body>
<div class="page page-login" id="page-regist">

	<!--内容区-->
	<div class="content">
		<div class="title-logo">
			<img src="/Public/App/images/logo2.png" alt="东方合道">
		</div>
		<div class="content-block borTop-0 borBot-0">
			<form action="">
				<ul class="form-group">
					<li>
						<input type="text" class="inp" name="phone" id="phone" placeholder="请输入手机号">
						<label for="" class="iconfont icon-mobile"></label>
					</li>
					<li>
						<input type="text" class="inp" name="password" id="password" placeholder="请填输入密码">
						<label for="" class="iconfont icon-password1"></label>
					</li>
					<li>
						<input type="text" class="inp" name="recommend_code" id="recommend_code" placeholder="请输入推荐码">
						<label for="" class="iconfont icon-mobile"></label>
					</li>
					<li>
						<input type="text" class="inp" name="code" id="code" placeholder="请填输入验证码">
						<label for="" class="iconfont icon-password"></label>
						<a href="javascript:getSms()" class="btn-verfiy send_pwd">获取验证码</a>
						<!-- <a class="btn-verfiy active">已发送(59)s</a> -->
					</li>
					<li class="mt-40">
						<input type="button" class="button sub" value="注册">
					</li>
					<li class="font-12 color-light t-c">
						已有账号，
						<a href="<?php echo U('App/vip/login');?>" class="color-blue">马上登录</a>
					</li>
				</ul>
			</form>
		</div>

	</div>
</div>
<script type="text/javascript">
	var code_id='';
	//获得手机动态验证码
	function getSms(){
		var phone = $("[name='phone']").val();
		var re = /^1\d{10}$/;
		if(re.test(phone)){
			$.ajax({
				url:"<?php echo U('App/Vip/sendmsg');?>",
				data:{
					phone: phone,
					gettype:1,
				},
				type:'post',
				dataType: "json",
				success: function(data){
					//console.log(data);
					if(data.state_code==1){
						code_id =data.id;
						settime();
					}else{
						//alert(data.msg);
						zbb_msg(data.msg);
					}
				},
			})
		}else{
			zbb_msg("手机号码错误");
		}

	}

	//验证码60秒
	var countdown=60;
	function settime() {
		if (countdown == 0) {
			$(".send_pwd").attr("href",'javascript:getSms()');
			$(".send_pwd").text("获取验证码");
			countdown = 60;
			return ;
		} else {
			$(".send_pwd").attr("href", 'javascript:void(0)');
			$(".send_pwd").text("重新发送(" + countdown + ")");
			countdown--;
		}
		setTimeout(function() {
			settime()
		},1000)
	}


	$(".sub").click(function(){
		var phone = $("[name='phone']").val();
		var password = $("[name='password']").val();
		var recommend_code = $("[name='recommend_code']").val();
		var code = $("[name='code']").val();

		if(password==''){
			zbb_msg('请输入密码');
		}else if(phone==''){
			zbb_msg('请输入手机号');
		}else if(recommend_code==''){
			zbb_msg('请输入推荐码');
		}else if(code==''){
			zbb_msg('请输入验证码');
		}else{
			var fun=function(){
				window.location.href="http://daoyunshang.com/App/vip/login";
			}
			$.ajax({
				url:"<?php echo U('App/Vip/regist');?>",
				data:{
					phone:phone,
					password:password,
					code_id:code_id,
					code:code,
					recommend_code:recommend_code,
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