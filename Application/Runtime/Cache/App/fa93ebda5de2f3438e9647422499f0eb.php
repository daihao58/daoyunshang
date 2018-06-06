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
		<link rel="stylesheet" href="/Public/App/css/iconfont/iconfont.css" />
		<link rel="stylesheet" href="/Public/App/css/layout.css" />
		<link rel="stylesheet" href="/Public/App/css/style2.css" />
		<script type="text/javascript" src="/Public/App/js/zepto.min.js"></script>
		<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
    <script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
	</head>
	<body>
		<div class="page">
				<header class="bar bar-header">
            <a href="<?php echo U('App/Vip/address');?>" class="iconfont icon-back bar-btn pull-left"></a>
            <h1 class="title"><?php echo ($cache["name"]); ?></h1>
            <a href="<?php echo U('App/Shop/index',array('shopid'=>$shopid));?>" class="iconfont icon-home-head bar-btn pull-right"></a>
        </header>

				<div class="content">
						<ul class="list-block mt-0">
							<li class="item-content"><div class="item-title label">所在省份</div>
								<div class="regiona2 wbox-1">
									<select name="province" class="sel" id="province">
										<?php if($province == ''): ?><option value="0">请选择</option><?php else: endif; ?>
										<?php if(is_array($provinceRs)): $i = 0; $__LIST__ = $provinceRs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$provinceRs): $mod = ($i % 2 );++$i;?><option value="<?php echo ($provinceRs["id"]); ?>" <?php if($province == $provinceRs['id']): ?>selected<?php else: endif; ?> ><?php echo ($provinceRs["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</li>
							<li class="item-content"><div class="item-title label">所在城市</div>
								<div class="regiona2 wbox-1">
									<select name="city" class="sel" id="city">
										<?php if(is_array($cityRs)): $i = 0; $__LIST__ = $cityRs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cityRs): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cityRs["id"]); ?>"><?php echo ($cityRs["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</li>
							<li class="item-content"><div class="item-title label">所在区县</div>
								<div class="regiona2 wbox-1">
									<select name="area" class="sel" id="area">
										<?php if(is_array($areaRs)): $i = 0; $__LIST__ = $areaRs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$areaRs): $mod = ($i % 2 );++$i;?><option value="<?php echo ($areaRs["id"]); ?>"><?php echo ($areaRs["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</li>

							<li class="item-content"><div class="item-title label">收货地址</div><input class="item-input t-r" type="text" placeholder="输入收货地址" value="<?php echo ($data["address"]); ?>" id="address"/></li>
							<li class="item-content"><div class="item-title label">联系人</div><input class="item-input t-r" type="text" value="<?php echo ($data["name"]); ?>" id="name"/></li>
							<li class="item-content"><div class="item-title label">手机号码</div><input class="item-input t-r" type="text" value="<?php echo ($data["mobile"]); ?>" id="mobile"/></li>
						</ul>
						<div class="plr-14 color3 font-12">注：请仔细填写联系人信息。</div>
						<div class="button-group mt-28">
							<?php if($data["id"] != ''): ?><a class="button button-red ads-del">删除联系人</a><?php endif; ?>
							<a class="button ads-btn" >确认修改</a>
						</div>
				</div>
				<input type="hidden" value="<?php echo ($data["id"]); ?>" id="id"/>
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

	$(function(){

		$('#province').bind('change',function(){
			$.post(
					"<?php echo U('app/vip/getCityByPid');?>",
					{
						'pid':$(this).val(),
					},
					function(data){
					console.log(data);
						if(data.status){
							console.log(11);
							var length = data.info.length;
							console.log(length);
							var option = '';
							var firstCityId;
							for(var i=0;i<length;i++){
								if(i == 0){
									firstCityId = data.info[i]['id'];
								}
								option +='<option value="'+data.info[i]['id']+'">'+data.info[i]['name']+'</option>';
							}
							$("#city").html(option);
							console.log(firstCityId);
							city(firstCityId);
						}
					}
			);
		});
		function city(pid){
			$.post(
					"<?php echo U('app/vip/getCityByPid');?>",
					{
						'pid':pid,
					},
					function(data){

						if(data.status){
							var length = data.info.length;
							var option = '';
							for(var i=0;i<length;i++){
								option +='<option value="'+data.info[i]['id']+'">'+data.info[i]['name']+'</option>';
							}
							$("#area").html(option);
						}else{

							$(window).showErrMessage(data.info);
						}
					}
			);
		}
		$('#city').bind('change',function(){
			$.post(
					"<?php echo U('app/vip/getCityByPid');?>",
					{
						'pid':$(this).val(),
					},
					function(data){

						if(data.status){
							var length = data.info.length;
							var option = '';
							for(var i=0;i<length;i++){
								option +='<option value="'+data.info[i]['id']+'">'+data.info[i]['name']+'</option>';
							}
							$("#area").html(option);
						}else{

							$(window).showErrMessage(data.info);
						}
					}
			);
		});
	})
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