<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
	<title>订单确认</title>
	<meta charset="utf-8" />
	<!--页面优化-->
	<meta name="MobileOptimized" content="320">
	<!--默认宽度320-->
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
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
	<!--组件依赖js begin-->
	<script src="/Public/App/js/zepto.min.js"></script>
	<!--组件依赖js end-->
	<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
	<script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
	<style>
		.checkbox {
			color: #999;
			vertical-align: middle;
		}

		.checkbox:before {
			content: "\e619";
		}

		.checkbox.checked {
			color: #1eb4d2
		}

		.checkbox.checked:before {
			content: "\e604";
		}

		.checkbox + img {
			width: 2rem!important;
			margin-left: .4rem;
			vertical-align: middle
		}
	</style>
</head>

<body>
	<div class="page">
		<!-- 标题栏 -->
		<header class="bar bar-header">
			<a href="javascript:" onclick="self.location=document.referrer;" class="iconfont icon-back bar-btn pull-left"></a>
			<h1 class="title"><?php echo ($cache["name"]); ?></h1>
			<a href="<?php echo U('App/Shop/index',array('shopid'=>$shopid));?>" class="iconfont icon-home-head bar-btn pull-right"></a>
		</header>
		<footer class="bar bar-footer">
			<div class="nav-txt">
				<span class="font-12">合计：</span>
				<b class="color-ora">
					<i>￥</i>
					<em class="totalprice font-16"><?php echo ($totalprice); ?></em>
				</b>
			</div>
			<a href="#" id="orderconfirm" class="nav-button">确认</a>
		</footer>
		<div class="content">
				<form action="" method="post" id="orderform">
					<!-- 地址 -->
					<div class="list-block media-list mt-0 mb-0">
						<a id="changeaddress" class="item-content">
							<i class="item-media iconfont icon-addr2"></i>
							<div class="item-title" style="width: 84%">
								<?php if(empty($vip)): ?><p>请选择联系人</p>
									<?php else: ?>
									<div>
										<p>联系人：<?php echo ($vip["name"]); ?>&nbsp;&nbsp;&nbsp;<span class="pull-right"><?php echo ($vip["mobile"]); ?></span></p>
										<p class="mt-12">收货地址：<?php echo ($vip["address"]); ?></p>
									</div><?php endif; ?>
							</div>
							<i class="iconfont icon-right"></i>
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
						<input type="hidden" name="yf" value="<?php echo ($yf); ?>">
						<textarea name="items" style="display: none;"><?php echo ($allitems); ?></textarea>
						<input type="hidden" name="isyf" value="<?php echo ($isyf); ?>">
					</div>
					<div class="ads-line"></div>
					<!-- 商品明细  -->
					<div class="list-block media-list">
						<div class="list-title">商品明细</div>
						<?php if(is_array($cache)): foreach($cache as $key=>$vo): ?><ul>
								<li class="item-content" style="min-width: 100%;width: auto;background-color: #fafafa;margin: 0 -.7rem;padding-left: .7rem;padding-right: .7rem">
									<div class="item-media prod-media">
										<!-- 图片大小为147*101 -->
										<img src="<?php echo ($vo["pic"]); ?>" />
									</div>
									<div class="item-title">
											<h3 class="t-e-2"><?php echo ($vo["name"]); ?></h3>
											<p class="olor-light font-12 mt-4"><?php echo ($vo["skuattr"]); ?></p>
											<p>
												<span class="color-ora">￥<em class="font-16"><?php echo ($vo["price"]); ?></em></span>
												<span class="pull-right mt-4">x<?php echo ($vo["num"]); ?></span>
											</p>
									</div>
								</li>
							</ul><?php endforeach; endif; ?>
						  <!--
								<p class="border-b1 ads_ortt3 fonts18 color3">&nbsp;使用代金卷<span class="fr"><select name="djqid" id="djqid" class="ads-sel"><option value="0" data-money="0">请选择有效代金卷</option><?php if(is_array($djq)): foreach($djq as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" data-money="<?php echo ($vo["money"]); ?>"><?php echo ($vo["money"]); ?>元代金卷</option><?php endforeach; endif; ?></select></span></p>
								<p class="border-b1 ads_ortt3 fonts85">&nbsp;邮费政策：<?php if(($isyf) == "1"): ?>全场定邮<?php echo ($yf); ?>元，订单满<?php echo ($yftop); ?>元包邮。<?php else: ?>全场包邮<?php endif; ?></p>
							-->
						<div class="item-content">
							<input type="text" name="msg" class="item-input font-12" placeholder="给卖家留言" />
						</div>
						<div class="item-content font-12">
							<span class="color-gray">共<?php echo ($totalnum); ?>件商品</span>
							<p>
								<span>商品：</span>
								<span class="color-ora"><i>￥</i><b class="totalprice font-16"><?php echo ($allshop); ?></b></span>
								<span>&nbsp;&nbsp;&nbsp;&nbsp;邮费：</span>
								<span class="color-ora"><i>￥</i><b class="font-16"><?php echo ($yf); ?></b></span>
							</p>
						</div>
					</div>
				</form>
				<!-- 支付方式 -->
				<div class="list-block media-list">
					<div class="list-title">支付方式</div>
					<ul>
						<li class="item-content ads_pay" style="padding: .7rem 0" data-paytype="money" data-disable="<?php echo ($isyue); ?>">
							<div class="item-media">
								<i class="checkbox iconfont"></i>
								<img src="/Public/App/img/tue.jpg"/>
							</div>
							<div class="item-title" style="width: 72%;">
								<p>
									<span>余额：</span>
									<i class="color-ora" id='money' data-money='<?php echo ($_SESSION[' WAP ']['vip ']['money ']); ?>'>￥<?php echo ($_SESSION['WAP']['vip']['money']); ?></i>
								</p>
								<!--<p class="color-light font-12 mt-8">余额不足请充值</p>-->
							</div>
						</li>
					</ul>

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
			</div>
	</div>

	<script type="text/javascript">
		var sid = "<?php echo ($sid); ?>";
		var dh ="<?php echo ($dh); ?>";
		console.log(dh);
		console.log(sid);
		var lasturlencode = "<?php echo ($lasturlencode); ?>";
		var $paytype = $('#paytype');
		$('#changeaddress').on('click', function (e) {
			e.preventDefault();
			var tourl = "<?php echo U('App/Shop/orderAddress',array('sid'=>$sid,'lasturl'=>$lasturlencode,'dh'=>$dh));?>";
			window.location.href = tourl;
		});
		$('.ads_pay').click(function () {
			var isdis = $(this).data('disable');
			if (isdis == 0) {
				var $sp = $(this).find('.checkbox');
				$sp.addClass('checked');
				$(this).siblings('.ads_pay').find('.checkbox').removeClass('checked');
				// $(this).find('span').css('color', ' #ff3000');
				$paytype.val($(this).data('paytype'));
			} else {
				App_gmuMsg('余额不足请充值！');
			}
		});
		$('#orderconfirm').on('click', function () {
			if (!$('#ordervip').val()) {
				App_gmuMsg('请选择联系人！');
				return false;
			}
			if (!$('#paytype').val()) {
				App_gmuMsg('请选择支付方式！');
				return false;
			}
			var okfun = function () {
				$('#orderform').submit();
			}

			 if ($('#djqid').val() == 0) {
				//App_gmuAlert('确认？','确认现在生成订单并付款吗？',false,okfun);
				okfun();
			} else {
				//App_gmuAlert('确认？','您选择使用代金卷，生成订单后此代金卷将立刻作废，不可再次使用！确认现在生成订单并付款吗？',false,okfun);
				 App_gmuAlert('确认？','确认现在生成订单并付款吗？',false,okfun);
				 //okfun();
			}

		});
		//代金卷特效
		var totalprice = $('.totalprice');
		var nowtotal = "<?php echo ($totalprice); ?>";
		var djqops = document.getElementById("djqid");
		/* djqops.addEventListener('change', function () {
			var newmoney = Number(nowtotal) - Number(djqops.options[djqops.selectedIndex].getAttribute('data-money'));
			// 初始支付限制
			$('.ads_pay').data('disable', 0);
			$('.ads_pay span').css('color', ' #cfcfcf');
			// 判断当前的是否小于0，小于0设置为0
			if (newmoney <= 0) {
				newmoney = 0;
				$('.ads_pay').each(function () {
					// 允许只允许使用余额支付
					if ($(this).data('paytype') == 'wxpay') {
						$(this).data('disable', 1);
					}
				});
			}
			// 判断可否使用余额支付
			var money = Number($('#money').data('money'));
			if (newmoney > money) {
				$('.ads_pay').each(function () {
					if ($(this).data('paytype') == 'money') {
						$(this).data('disable', 1);
					}
				});
			}
			$(totalprice).html(newmoney);
		}); */
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