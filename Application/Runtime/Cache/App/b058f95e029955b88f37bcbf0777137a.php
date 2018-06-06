<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
	<title>订单列表</title>
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
	<link rel="stylesheet" href="/Public/App/css/iconfont/iconfont.css">
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
	<div class="page page-orderDetail">
		<header class="bar bar-header">
			<a href="<?php echo U('App/Shop/orderList/sid/0');?>" class="iconfont icon-back bar-btn pull-left"></a>
			<h1 class="title">订单信息</h1>
			<a href="<?php echo U('App/Shop/index',array('shopid'=>$shopid));?>" class="iconfont icon-home-head bar-btn pull-right"></a>
		</header>

		<div class="content">
			<!-- 物流信息 -->
			<div class="list-block media-list mt-0">
				<?php if(!empty($cache["fahuokd"])): ?><div class="item-content">
						<i class="item-media iconfont icon-wuliu color-green"></i>
						<div class="item-title">
							<div class="color-green"><?php echo ($cache["fahuokd"]); ?></div>
							<p class="color-light font-12 mt-8"><?php echo ($cache["fahuokdnum"]); ?></p>
						</div>
					</div><?php endif; ?>
				<div class="item-content">
					<i class="item-media iconfont icon-addr2 color-gray"></i>
					<div class="item-title color-gray">
						<p>
							<span>收件人：</span>
							<em><?php echo ($cache["vipname"]); ?></em>
							<span class="pull-right"><?php echo ($cache["vipmobile"]); ?></span>
						</p>
						<p class="mt-8" style="text-align:justify; line-height: 1.5; white-space: normal;">
							<span>收货地址：</span>
							<em><?php echo ($cache["vipaddress"]); ?></em>
						</p>
					</div>
				</div>
			</div>
			<div class="list-block media-list">
				<div class="list-title">商品明细</div>
				<?php if(is_array($cache["items"])): $i = 0; $__LIST__ = $cache["items"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vt): $mod = ($i % 2 );++$i;?><ul style="margin: 0 -.7rem;background-color: #fafafa;padding: 0 .7rem;">
						<a href="<?php echo U('App/Shop/goods',array('sid'=>0,'cid'=>$cid,'id'=>$vt['goodsid'],'ppid'=>$_SESSION['WAP']['vipid']));?>">
						<li class="item-content">
							<div class="item-media prod-media">
								<img src="<?php echo ($vt["pic"]); ?>"/>
							</div>
							<div class="item-title">
								<div class="pull-right t-r">
									<p class="mt-6">
										<em class="font-sm">￥</em>
										<em><?php echo ($vt["price"]); ?></em>
									</p>
									<p class="dtl-prc2 mt-8">
										<em class="font-sm">￥</em>
										<em>156</em>
									</p>
									<p class="mt-12 color-light"><i class="font-sm">x</i><?php echo ($vt["num"]); ?></p>
								</div>
								<h3 class="t-e-2"><?php echo ($vt["name"]); ?></h3>
								<?php if(!empty($vt["skuattr"])): ?><p class="color-light font-12 mt-4"><?php echo ($vt["skuattr"]); ?></p><?php endif; ?>
							</div>
						</li>
						</a>
					</ul><?php endforeach; endif; else: echo "" ;endif; ?>
				<!-- 金额详情 -->
				<div class="item-content">
					<ul class="item-inner font-12 color-light">
						<li>
							<span>邮费</span>
							<span class="pull-right"><em class="font-sm">￥</em><?php echo ($cache["yf"]); ?></span></li>
						<li class="mt-12">
							<span>订单总额</span>
							<em class="pull-right"><?php echo ($cache["payprice"]); ?></em></li>
					</ul>
				</div>
				<div class="item-content">
					<span class="font-12 color-light">共<?php echo ($cache["totalnum"]); ?>件商品</span>
					<span>实付：
							￥<em class="font-16"><?php echo ($cache["payprice"]); ?></em>
					</span>
				</div>
				<?php if(($cache["status"]) == "1"): ?><div class="item-content"><a href="<?php echo U('App/Shop/orderCancel',array('sid'=>0,'orderid'=>$cache['id']));?>" class="home-cz">取消订单</a><?php endif; ?>
				<?php if(($cache["status"]) == "3"): ?><!-- <div class="item-content"><a href="<?php echo U('App/Shop/orderOK',array('sid'=>0,'orderid'=>$cache['id']));?>" class="home-rz">确认收货</a></div> --><?php endif; ?>
			</div>
			<div class="list-block">
				<div class="list-title">订单信息</div>
				<div class="item-content">
					<ul class="item-inner font-12 color-light">
						<li>
							<span>订单状态</span>
							<em class="color3 pull-right">
								<?php switch($cache["status"]): case "0": ?>已取消<?php break;?>
									<?php case "1": ?>未支付<?php break;?>
									<?php case "2": ?>已支付<?php break;?>
									<?php case "3": ?>待收货<?php break;?>
									<?php case "4": ?>退货中<?php break;?>
									<?php case "5": ?>已完成-<?php echo (date("Y/m/d",$cache["etime"])); break;?>
									<?php case "6": ?>已关闭-<?php echo (date("Y/m/d",$cache["closetime"])); break; endswitch;?>
							</em>
						</li>
						<li class="mt-12">
							<span>订单编号</span>
							<em class="pull-right"><?php echo ($cache["oid"]); ?></em>
						</li>
						<li class="mt-12">
							<span>创建时间</span>
							<em class="pull-right"><?php echo (date("Y/m/d H:i:s",$cache["ctime"])); ?></em>
						</li>
						<li class="mt-12">
							<span>备注</span>
							<em class="pull-right"><?php echo ($cache["msg"]); ?></em>
						</li>
					</ul>
				</div>
			</div>
			<div class="list-block">
				<div class="list-title">订单进度</div>
				<div class="item-content">
					<ul class="item-inner font-12 color-light">
						<li>
							<span>订单生成</span>
							<span class="pull-right"><?php echo (date("Y/m/d H:i",$cache["ctime"])); ?></span></li>
						<?php if(($cache["status"]) == "0"): ?><li class="mt-12">
								<em class="color3">订单已取消，不再跟踪状态。</em>
							</li><?php endif; ?>
						<?php if(is_array($log)): foreach($log as $key=>$vo): ?><li class="mt-12">
								<span><?php echo ($vo["msg"]); ?></span>
								<span class="pull-right"><?php echo (date("Y/m/d H:i",$vo["ctime"])); ?></span>
							</li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
			<!--<?php if(!empty($cache["fahuokd"])): ?><div class="list-block">
					<div class="list-title">发货物流</div>
					<div class="item-content">
						<ul class="item-inner font-12 color-light">
							<li>
								<span>快递公司</span>
								<em class="pull-right"><?php echo ($cache["fahuokd"]); ?></em>
							</li>
							<li class="mt-12">
								<span>快递单号</span>
								<em class="pull-right"><?php echo ($cache["fahuokdnum"]); ?></em>
							</li>
						</ul>
					</div>
				</div><?php endif; ?>-->

			<?php if(($cache["status"]) == "1"): ?><div class="list-block">
					<div class="list-title">更换支付方式</div>
					<ul>
						<li class="item-content ads_pay" style="padding: .7rem 0" data-paytype="money" data-disable="<?php echo ($isyue); ?>">
							<div class="item-media">
								<i class="checkbox iconfont" id="ccmoney"></i>
								<img src="/Public/App/img/tue.jpg"/>
							</div>
							<div class="item-title" style="width: 72%;">
								<p>
									<span>余额：</span>
									<i class="color-ora">￥<?php echo ($_SESSION['WAP']['vip']['money']); ?></i>
								</p>
								<p class="color-light font-12 mt-8">余额不足由其他方式支付</p>
							</div>
						</li>
						<!--<li class="item-content ads_pay" style="padding: .7rem 0" data-paytype="alipayApp" data-disable="0">
							<div class="item-media">
								<i class="checkbox iconfont" id="ccalipayApp"></i>
								<img src="/Public/App/img/zhif.jpg"/>
							</div>
							<div class="item-title" style="width: 72%;">手机支付宝支付</div>
						</li>
						<li class="item-content ads_pay" style="padding: .7rem 0" data-paytype="wxpay" data-disable="0">
							<div class="item-media">
								<i class="checkbox iconfont" id="ccalipayApp"></i>
								<img src="/Public/App/img/wxpay.jpg"/>
							</div>
							<div class="item-title" style="width: 72%;">手机支付宝支付</div>
						</li>-->
					</ul>
					<!-- <div class="ads_pay ovflw ads_border_dashed" data-paytype="alipayApp" data-disable="0">
						<span class="iconfont fl ads_pay_lineh dtl_mar1">&#xe656</span>
						<div class="ads_orimg fl dtl_mar1">
							<img src="/Public/App/img/wxpay.jpg" />
						</div>
						<p class="ads_pay_lineh">微信安全支付</p>
					</div>
					<div class="ads_pay ovflw" data-paytype="wxpay" data-disable="0">
						<span class="iconfont fl ads_pay_lineh dtl_mar1">&#xe656</span>
						<div class="ads_orimg fl dtl_mar1">
							<img src="/Public/App/img/wxpay.jpg" />
						</div>
						<p class="ads_pay_lineh"></p>
					</div> -->
					<!-- 银联支付备用 -->
					<!--<div class="ads_pay ovflw " data-paytype = "yinlian">
											<span class="iconfont fl ads_pay_lineh dtl_mar1">&#xe656</span>
											<div class="ads_orimg fl dtl_mar1">
												<img src="/Public/App/img/yl.jpg" />
											</div>
											<p class="ads_pay_lineh">银联支付</p>
										</div>-->
					<p class=" ads_ortt3 fonts85 ovflw">
						<span class="fr">
							<a href="<?php echo U('App/Shop/orderList',array('sid'=>0));?>" class="home-cz">返回列表</a>
							<?php if(($cache["status"]) == "1"): ?><a href="<?php echo U('App/Shop/orderCancel',array('sid'=>0,'orderid'=>$cache['id']));?>" class="home-cz">取消订单</a><?php endif; ?>
							<?php if(($cache["status"]) == "1"): ?><a href="#" class="home-rz" id="paybtn" data-paytype="<?php echo ($cache["paytype"]); ?>">付款</a><?php endif; ?>
						</span>
					</p>
				</div><?php endif; ?>
		</div>
	</div>

	<!--未支付时的支付方式-->
	<?php if(($cache["status"]) == "1"): ?><script type="text/javascript">
			var nowtype = "<?php echo ($cache["paytype"]); ?>";
			var $paybtn = $('#paybtn');
			var oid = "<?php echo ($cache["oid"]); ?>";
			$('#cc' + nowtype).css('color', ' #ff3000');
			$('.ads_pay').click(function () {
				var isdis = $(this).data('disable');
				if (isdis == 0) {
					var $sp = $(this).find('.checkbox');
					$sp.addClass('checked');
					$(this).siblings('.ads_pay').find('.checkbox').removeClass('checked');
					// $(this).find('span').css('color', ' #ff3000');
					$paybtn.data('paytype', $(this).data('paytype'));
				} else {
					App_gmuMsg('您的余额不足，请使用其它方式！');
				}
			});
			$paybtn.on('click', function () {
				var pt = $(paybtn).data('paytype');
				var tourl = "<?php echo U('App/Shop/pay',array('sid'=>0,'price'=>$cache['payprice'],'orderid'=>$cache['id']));?>" + '/type/' +
					pt;
				window.location.href = tourl;
			});
		</script><?php endif; ?>
</body>

</html>