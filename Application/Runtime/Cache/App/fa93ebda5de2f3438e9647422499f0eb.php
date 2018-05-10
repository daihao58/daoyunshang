<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>修改联系人</title>
	    <meta charset="utf-8" />
		<!--页面优化-->
		<meta name="MobileOptimized" content="320">
		<!--默认宽度320-->
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
		<!--viewport 等比 不缩放-->
		<meta http-equiv="cleartype" content="on">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<!--删除苹果菜单-->
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<!--默认颜色-->
		<meta name="apple-mobile-web-app-title" content="yes">
		<meta name="apple-touch-fullscreen" content="yes">
		<!--加载全部后 显示-->
		<meta content="telephone=no" name="format-detection" />
		<!--不识别电话-->
		<meta content="email=no" name="format-detection" />
		<link rel="stylesheet" href="/Public/App/css/style2.css" />
		<script type="text/javascript" src="/Public/App/js/zepto.min.js"></script>
		<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
        <script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
	</head>
	<body class="back1">
		<div class="add-ads back2">
			<ul class="add-ul">
				<li class="border-b1 ovflw"><span class="fl">收货地址</span><input type="text" placeholder="输入收货地址" value="<?php echo ($data["address"]); ?>" id="address"/></li>
				<li class="border-b1 ovflw"><span class="fl">联系人</span><input type="text" value="<?php echo ($data["name"]); ?>" id="name"/></li>
				<li class="ovflw"><span class="fl">手机号码</span><input type="text" value="<?php echo ($data["mobile"]); ?>" id="mobile"/></li>
			</ul>			
		</div>
		<p class="add-tips color3 fonts2">注：请仔细填写联系人信息。</p>
		<input type="hidden" value="<?php echo ($data["id"]); ?>" id="id"/>
		<div class="insert1"></div>
		<div class="dtl-ft ovflw">
				<div class=" fl dtl-icon dtl-bck ovflw">
					<a href="<?php echo U('App/Vip/address');?>">
						<i class="iconfont">&#xe679</i>
					</a>
				</div>
				<a href="#" class="fr ads-btn fonts9 back3">确认保存</a>
				<?php if($data["id"] != ''): ?><a href="#" class="fr ads-del fonts9 back4">删除联系人</a><?php endif; ?>
		</div>
	</body>
</html>
<script>
	$('.ads-btn').click(function(){
		var id=$('#id').val();
		var xqid=1;//取消小区ID
		var address=$('#address').val();
		var name=$('#name').val();
		var mobile=$('#mobile').val();
		var re = /^1\d{10}$/;
		if(address==''){
			zbb_msg("请填写身份证号码！");
			return;
		}else if(name==''){
			zbb_msg("请填写联系人！");
			return;
		}else if(mobile==''){
			zbb_msg("请填写手机号码！");
			return;
		}else if (re.test(mobile)==false) {
			zbb_msg("手机号码格式不正确！");
			return;
		}
		$.ajax({
			type:'post',
			data:{'id':id,'xqid':xqid,'address':address,'name':name,'mobile':mobile},
			url:"<?php echo U('Vip/addressSet');?>",
			dataType:'json',
			success:function(e){
				if (e.status==1) {
					zbb_alert(e.msg,function(){location.href="<?php echo U('App/Vip/address');?>";});
				} else {
					zbb_msg(e.msg);
				}
				return false;
			},
			error:function(){
			    zbb_alert('通讯失败！');
				return false;
			}
		});	
		return false;
	});
	
	$('.ads-del').click(function(){
		var id=$('#id').val();
		$.ajax({
			type:'post',
			data:{'id':id},
			url:"<?php echo U('Vip/addressDel');?>",
			dataType:'json',
			success:function(e){
				if (e.status==1) {
					zbb_alert(e.msg,function(){location.href="<?php echo U('App/Vip/address');?>";});
				} else {
					zbb_msg(e.msg);
				}
				return false;
			},
			error:function(){
			    zbb_alert('通讯失败！');
				return false;
			}
		});	
		return false;
	});
</script>
<!--通用分享-->
<script type="text/javascript">
	function onBridgeReady(){
 		WeixinJSBridge.call('hideOptionMenu');
	}

	if (typeof WeixinJSBridge == "undefined"){
	    if( document.addEventListener ){
	        document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
	    }else if (document.attachEvent){
	        document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
	        document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
	    }
	}else{
	    onBridgeReady();
	}	
</script>