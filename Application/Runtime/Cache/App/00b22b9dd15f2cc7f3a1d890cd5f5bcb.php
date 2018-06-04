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
	<link rel="stylesheet" href="/Public/App/css/swiper-3.4.2.min.css">
	<link rel="stylesheet" href="/Public/App/css/layout.css">
	<link rel="stylesheet" href="/Public/App/css/style.css" />
	<link rel="stylesheet" href="/Public/App/css/style2.css" />

	<!--组件依赖js begin-->
	<script src="/Public/App/js/zepto.min.js"></script>
	<!--组件依赖js end-->
	<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
	<script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
</head>

<body>
	<div class="page page-order">
		<!-- 标题栏 -->
		<header class="bar bar-header">
			<h1 class="title">订单</h1>
		</header>
		<!-- 底部导航 -->
		
		
<nav class="bar bar-nav">
	<a href="/App/Shop/index" class="nav-item <?php if($moren_tb == "shouye" ): ?>cur<?php else: endif; ?>">
		<i class="iconfont <?php if($moren_tb == "shouye" ): ?>icon-home-s<?php else: ?>icon-home<?php endif; ?>"></i>
		<span class="tab-label">首页</span>
	</a>
	<a href="/App/Shop/orderList/sid/0" class="nav-item <?php if($moren_tb == "dingdan" ): ?>cur<?php else: endif; ?>">
		<i class="iconfont <?php if($moren_tb == "dingdan" ): ?>icon-order-s<?php else: ?>icon-order<?php endif; ?>"></i>
		<span class="tab-label">订单</span>
	</a>
	<a href="<?php echo U('App/Shop/basket/',array('sid'=>0,'lasturl'=>$lasturl));?>" class="nav-item <?php if($moren_tb == "gouwuche" ): ?>cur<?php else: endif; ?>">
		<i class="iconfont <?php if($moren_tb == "gouwuche" ): ?>icon-cart-s<?php else: ?>icon-cart<?php endif; ?>"></i>
		<span class="tab-label">购物车</span>
	</a>
	<a href="tel:<?php echo ($_SESSION['SHOP']['set']['phone']); ?>" class="nav-item">
		<i class="iconfont icon-online"></i>
		<span class="tab-label">客服</span>
	</a>
	<a href="/App/Vip/index" class="nav-item <?php if($moren_tb == "wode" ): ?>cur<?php else: endif; ?>">
		<i class="iconfont <?php if($moren_tb == "wode" ): ?>icon-user-s<?php else: ?>icon-user<?php endif; ?>"></i>
		<span class="tab-label">我的</span>
	</a>
</nav>
		


		<!-- tabs -->
		<div class="ads-tabs bor-b">
			<a href="<?php echo U('App/Shop/orderList',array('sid'=>0,'type'=>4));?>" class="fl text-c">
				<span <?php if(($type) == "4"): ?>class='active'<?php endif; ?>>全部</span>
			</a>
			<a href="<?php echo U('App/Shop/orderList',array('sid'=>0,'type'=>1));?>" class="fl text-c ">
				<span <?php if(($type) == "1"): ?>class='active'<?php endif; ?>>未支付</span>
			</a>
			<a href="<?php echo U('App/Shop/orderList',array('sid'=>0,'type'=>2));?>" class="fl text-c">
				<span <?php if(($type) == "2"): ?>class='active'<?php endif; ?>>已支付</span>
			</a>
			<a href="<?php echo U('App/Shop/orderList',array('sid'=>0,'type'=>3));?>" class="fl text-c">
				<span <?php if(($type) == "3"): ?>class='active'<?php endif; ?>>待收货</span>
			</a>
		</div>
		<div class="content">
			<?php if(is_array($cache)): $i = 0; $__LIST__ = $cache;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="content-block mt-0">
						<p class="pb-14 border-b1"><?php echo ($vo["oid"]); ?>
							<span class="fr color3 font-12">
								<?php switch($vo["status"]): case "0": ?>已取消<?php break;?>
									<?php case "1": ?>未支付<?php break;?>
									<?php case "2": ?>已支付<?php break;?>
									<?php case "3": ?>待收货<?php break;?>
									<?php case "4": ?>退货中<?php break;?>
									<?php case "5": ?>已完成<?php break;?>
									<?php case "6": ?>已关闭<?php break;?>
									<?php case "7": ?>退货完成<?php break; endswitch;?>
							</span>
						</p>
						<?php if(is_array($vo["items"])): $i = 0; $__LIST__ = $vo["items"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vt): $mod = ($i % 2 );++$i;?><a href="<?php echo U('App/Shop/goods',array('sid'=>0,'cid'=>$cid,'id'=>$vt['goodsid'],'ppid'=>$_SESSION['WAP']['vipid']));?>">
							<div class="ads_orinfol ptb-14 border-b1 clearfix">
								<!-- 图片大小为147*101 -->
								<img src="<?php echo ($vt["pic"]); ?>" class="ads_or_img pull-left" />
								<h3><?php echo ($vt["name"]); ?></h3>
								<?php if(!empty($vt["skuattr"])): ?><p class="color-light font-12"><?php echo ($vt["skuattr"]); ?></p><?php endif; ?>
								<div class="ads_orprice">
									<p>
										<em class="font-sm">￥</em>
										<em><?php echo ($vt["price"]); ?></em>
									</p>
									<p class="dtl-prc2 mt-8">
										<em class="font-sm">￥</em>
										<em><?php echo ($vt["cprice"]); ?></em>
									</p>
									<p class="mt-12 color-light">
										<em class="font-sm">x</em>
										<em class="font-12"><?php echo ($vt["num"]); ?></em>
									</p>
								</div>
							</div>
							</a><?php endforeach; endif; else: echo "" ;endif; ?>
						<div class="ptb-12 font-12 border-b1 clearfix">
							<p class="color-light mt-4 pull-left">共<?php echo ($vo["totalnum"]); ?>件商品</p>
							<p class="pull-right">实付：
								<span class="font-sm">￥</span>
								<em class="font-18"><?php echo ($vo["payprice"]); ?></em>
							</p>
						</div>
						<p class="t-r mt-10">
								<?php if(($vo["status"]) == "1"): endif; ?>
								<a href="<?php echo U('App/Shop/orderDetail',array('sid'=>0,'orderid'=>$vo['id']));?>" class="home-cz">查看订单</a>
								<?php if(($vo["status"]) == "1"): ?><a href="<?php echo U('App/Shop/pay',array('sid'=>0,'orderid'=>$vo['id'],'paytype'=>$vo['paytype']));?>" class="home-rz">付款</a><?php endif; ?>
								<?php if(($vo["status"]) == "3"): if(($shopset["isth"]) == "1"): ?><a href="<?php echo U('App/Shop/orderTuihuo',array('sid'=>0,'orderid'=>$vo['id']));?>" class="home-cz">我要退货</a><?php endif; ?>
									<a href="<?php echo U('App/Shop/orderOK',array('sid'=>0,'orderid'=>$vo['id']));?>" class="home-rz">确认收货</a><?php endif; ?>
						</p>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php if(empty($cache)): ?><div class="list_none text-c">
					<p class="color6">暂无订单</p>
				</div><?php endif; ?>
		</div>
	</div>
</body>
</html>