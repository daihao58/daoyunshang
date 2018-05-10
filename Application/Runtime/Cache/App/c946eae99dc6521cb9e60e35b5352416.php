<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <title>订单确认</title>
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
	    <!--组件依赖js begin-->
	    <script src="/Public/App/js/zepto.min.js"></script>
	    <!--组件依赖js end-->		
		<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
        <script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
    

</head>
<body class="back1 color6">
		<form action="" method="post" id="orderform">
		<!-- 地址  -->
		<div class="ads-hd border-b1 back2 ovflw mr-b">
			<div class="ads-line"></div>
			<a href="#" class="ads-chs" id="changeaddress">
				<?php if(empty($vip)): ?>请选择联系人<i class="iconfont fr">&#xe6a3</i>
					<?php else: ?>
					联系人：<?php echo ($vip["name"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($vip["mobile"]); ?><i class="iconfont fr">&#xe6a3</i>
					<p class="fonts9">收货地址：<?php echo ($vip["address"]); ?></p><?php endif; ?>
			</a>
			<input type="hidden" name="sid" value="<?php echo ($sid); ?>">
			<input type="hidden" name="paytype" value="" id="paytype">
			<input type="hidden" name="vipid" value="<?php echo ($vip["vipid"]); ?>" id="ordervip">
			<input type="hidden" name="vipopenid" value="<?php echo ($_SESSION['WAP']['vip']['openid']); ?>">
			<input type="hidden" name="vipname" value="<?php echo ($vip["name"]); ?>">
			<input type="hidden" name="vipaddress" value="<?php echo ($vip["address"]); ?>">
			<input type="hidden" name="vipmobile" value="<?php echo ($vip["mobile"]); ?>">
			<!--<input type="hidden" name="vipxqid" value="<?php echo ($vip["xqid"]); ?>">
			<input type="hidden" name="vipxqname" value="<?php echo ($vip["xqname"]); ?>">-->
			<input type="hidden" name="totalnum" value="<?php echo ($totalnum); ?>">
			<input type="hidden" name="totalprice" value="<?php echo ($totalprice); ?>">
			<input type="hidden" name="totalprice_bate" value="<?php echo ($totalprice_bate); ?>">
			<textarea name="items" style="display: none;"><?php echo ($allitems); ?></textarea>
			<input type="hidden" name="isyf" value="<?php echo ($isyf); ?>">
		</div>
		<!-- 商品明细  -->
		<div class="ads-lst border-t1 border-b1 ovflw mr-b back2">
			<p class="ads-tt border-b1">商品明细</p>
			<?php if(is_array($cache)): foreach($cache as $key=>$vo): ?><div class="ads_orinfo ads_padding3 ovflw border-b1">
						<div class="ads_orinfol ovflw fl">
							<div class="ads_or_img fl">
								<!-- 图片大小为147*101 -->
								<img src="<?php echo ($vo["pic"]); ?>"/>
							</div>
							<h3><?php echo ($vo["name"]); ?></h3>
							<p class="color3 fonts2"><?php echo ($vo["skuattr"]); ?></p>
						</div>
						<div class="ads_orprice ovflw ">
							<p ><em class="fonts85">￥</em><em class="fonts18"><?php echo ($vo["price"]); ?></em></p>
							<p class="ads_ornum fonts85">X<?php echo ($vo["num"]); ?></p>
						</div>
					</div><?php endforeach; endif; ?>
		<!--
			<p class="border-b1 ads_ortt3 fonts18 color3">&nbsp;使用代金卷<span class="fr"><select name="djqid" id="djqid" class="ads-sel"><option value="0" data-money="0">请选择有效代金卷</option><?php if(is_array($djq)): foreach($djq as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" data-money="<?php echo ($vo["money"]); ?>"><?php echo ($vo["money"]); ?>元代金卷</option><?php endforeach; endif; ?></select></span></p>
			<p class="border-b1 ads_ortt3 fonts85">&nbsp;邮费政策：<?php if(($isyf) == "1"): ?>全场定邮<?php echo ($yf); ?>元，订单满<?php echo ($yftop); ?>元包邮。<?php else: ?>全场包邮<?php endif; ?></p>
		-->
			<p class="border-b1 ads_ortt3 fonts85 ads"><input type="text" name="msg" class="ads_orinput" placeholder="给卖家留言，请输入出游日期" /></p>
			<p class=" ads_ortt3 fonts85 ovflw">
			    <span class="fr ">共<?php echo ($totalnum); ?>件商品&nbsp;&nbsp;&nbsp;&nbsp;商品：
    			    <em class="fonts18 color3">￥<b class="totalprice"><?php echo ($totalprice); ?></b></em>
					<!--&nbsp;&nbsp;&nbsp;&nbsp;
    			    邮费：<em class="fonts18 color3">￥<b><?php echo ($yf); ?></b></em> -->
			    </span>
			</p>
		</div>
		</form>
		<!-- 支付方式 -->
		<div class="ads-lst border-t1 border-b1 ovflw mr-b back2">
			<p class="ads-tt border-b1">支付方式</p>
					<div class="ads_pay ovflw ads_border_dashed" data-paytype = "money" data-disable="<?php echo ($isyue); ?>">
						<span class="iconfont fl ads_pay_lineh dtl_mar1">&#xe656</span>
						<div class="ads_orimg fl dtl_mar1">
							<img src="/Public/App/img/tue.jpg" />
						</div>
						<p class="ads_pay_p1 ads_pay_lineh1">余额：<i id='money' data-money='<?php echo ($_SESSION['WAP']['vip']['money']); ?>'>￥<?php echo ($_SESSION['WAP']['vip']['money']); ?></i></p>
						<p class="ads_pay_p2 ads_pay_lineh1 color10 ads_font_size2">余额不足由其他方式支付</p>
					</div>					
					<!--
					<div class="ads_pay ovflw" data-paytype = "alipayApp" data-disable="0">
						<span class="iconfont fl ads_pay_lineh dtl_mar1">&#xe656</span>
						<div class="ads_orimg fl dtl_mar1">
							<img src="/Public/App/img/zhif.jpg" />
						</div>
						<p class="ads_pay_lineh">手机支付宝支付</p>
					</div> -->
				<!--	<div class="ads_pay ovflw" data-paytype = "wxpay" data-disable="0">
						<span class="iconfont fl ads_pay_lineh dtl_mar1">&#xe656</span>
						<div class="ads_orimg fl dtl_mar1">
							<img src="/Public/App/img/wxpay.jpg" />
						</div>
						<p class="ads_pay_lineh">微信安全支付</p>
					</div>-->
					<!-- 银联支付备用 -->
					<!--<div class="ads_pay ovflw " data-paytype = "yinlian">
						<span class="iconfont fl ads_pay_lineh dtl_mar1">&#xe656</span>
						<div class="ads_orimg fl dtl_mar1">
							<img src="/Public/App/img/yl.jpg" />
						</div>
						<p class="ads_pay_lineh">银联支付</p>
					</div>-->
		</div>
		<div class="insert1"></div>
		<div class="dtl-ft ovflw">
				<div class=" fl dtl-icon dtl-bck ovflw">
					<a onclick="javscript: window.history.go(-1)">
						<i class="iconfont">&#xe679</i>
					</a>
				</div>
				<a href="#" class="fr ads-btn fonts9 back3" id="orderconfirm">确认</a>
				<span class="fr ads-sum"><em class="fonts9">商品:</em><em class="fonts1">￥<b class="totalprice"><?php echo ($totalprice); ?></b></em><!--&nbsp;&nbsp;&nbsp;&nbsp;邮费:<em class="fonts18 color3">￥<b><?php echo ($yf); ?></b></em>--></span>
		</div>
		<script type="text/javascript">
			var sid="<?php echo ($sid); ?>";
			var lasturlencode="<?php echo ($lasturlencode); ?>";
			var paytype=$('#paytype');
			$('#changeaddress').on('click',function(){
				var tourl="<?php echo U('App/Shop/orderAddress',array('sid'=>$sid,'lasturl'=>$lasturlencode));?>";
				window.location.href=tourl;
			});
			$('.ads_pay').click(function(){
				var isdis=$(this).data('disable');
				if(isdis==0){
					var sp=$('.ads_pay span');
					$(sp).css('color',' #cfcfcf');
					$(this).find('span').css('color',' #ff3000');
					$(paytype).val($(this).data('paytype'));
				}else{
					App_gmuMsg('请使用其它方式！');
				}
			});
			$('#orderconfirm').on('click',function(){
				if(!$('#ordervip').val()){
					App_gmuMsg('请选择联系人！');
					return false;
				}
				if(!$('#paytype').val()){
					App_gmuMsg('请选择支付方式！');
					return false;
				}
				var okfun=function(){$('#orderform').submit();}
				//alert($('#djqid').val());
				if($('#djqid').val()==0){
					//App_gmuAlert('确认？','确认现在生成订单并付款吗？',false,okfun);
					okfun();
				}else{					
					//App_gmuAlert('确认？','您选择使用代金卷，生成订单后此代金卷将立刻作废，不可再次使用！确认现在生成订单并付款吗？',false,okfun);
					okfun();
				}
				
			});
			//代金卷特效
			var totalprice=$('.totalprice');
			var nowtotal="<?php echo ($totalprice); ?>";
			var djqops=document.getElementById("djqid");
			djqops.addEventListener('change',function(){
				var newmoney=Number(nowtotal)-Number(djqops.options[djqops.selectedIndex].getAttribute('data-money'));
				// 初始支付限制
				$('.ads_pay').data('disable',0);
				$('.ads_pay span').css('color',' #cfcfcf');
				// 判断当前的是否小于0，小于0设置为0
				if(newmoney<=0){
					newmoney=0;
					$('.ads_pay').each(function(){
						// 允许只允许使用余额支付
						if($(this).data('paytype')=='wxpay'){
							$(this).data('disable',1);
						}
					});
				}
				// 判断可否使用余额支付
				var money = Number($('#money').data('money'));
				if(newmoney>money){
					$('.ads_pay').each(function(){
						if($(this).data('paytype')=='money'){
							$(this).data('disable',1);
						}
					});
				}
				$(totalprice).html(newmoney);
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

	</body>
</html>