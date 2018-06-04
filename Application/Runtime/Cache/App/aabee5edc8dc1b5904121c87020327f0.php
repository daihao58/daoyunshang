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
	<link rel="stylesheet" href="/Public/App/css/layout.css">
	<link rel="stylesheet" href="/Public/App/css/style.css">
</head>
<style>
	.pages a,
	.pages span {
		display: inline-block;
		padding: 2px 5px;
		margin: 0 1px;
		border: 1px solid #f0f0f0;
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
	}

	.pages a,
	.pages li {
		display: inline-block;
		list-style: none;
		text-decoration: none;
		color: #58A0D3;
	}

	.pages a.first,
	.pages a.prev,
	.pages a.next,
	.pages a.end {
		margin: 0;
	}

	.pages a:hover {
		border-color: #50A8E6;
	}

	.pages span.current {
		background: #50A8E6;
		color: #FFF;
		font-weight: 700;
		border-color: #50A8E6;
	}
</style>
<body>
<div class="page page-prodList">
	<!-- 标题栏 -->
	<header class="bar bar-header">
		<a href="<?php echo U('App/Shop/index',array('shopid'=>21));?>" class="iconfont icon-back bar-btn pull-left"></a>
		<h1 class="title">分类</h1>
		<a href="<?php echo U('App/Shop/index',array('shopid'=>21));?>" class="iconfont icon-home-head bar-btn pull-right"></a>
	</header>

	<!-- 左边一级导航 -->
	<div class="left-menu-bar">
		<ul class="tab-links">
			<?php if(is_array($shop_cate)): $i = 0; $__LIST__ = $shop_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class='l-menu-it <?php if($cid == $vo['id']): ?>cur<?php else: endif; ?>'>
					<a href="<?php echo U('App/Shop/goods_kind',array('sid'=>0,'cid'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>

	<!-- content -->
	<section class="content">
		<!-- 排序 -->
		<div class="rank-block">
			<ul class="row">
				<li class="col-33" id="comprehensive">
					<a class='rank-item <?php if($order_num == 1): ?>cur<?php else: endif; ?> '>综合<i class="trian"></i></a>
				</li>
				<li class="col-33" id="price">
					<a class='rank-item <?php if(($order_num == 2) and ($price_order == asc)): ?>cur <?php elseif(($order_num == 2) and ($price_order == desc)): ?>cur asce<?php else: endif; ?> '>价格<i class="trian trian-double"></i></a>
					<input type="text" value="<?php echo ($price_order); ?>" name="price_order" id="price_order" style="display: none">
				</li>
				<!-- 第一次点降序 -->
				<!-- <li class="col-33">
                    <a class="rank-item cur">价格<i class="trian trian-double"></i></a>
                </li> -->
				<!-- 第二次点升序 -->
				<!-- <li class="col-33">
                    <a class="rank-item cur asce">价格<i class="trian trian-double"></i></a>
                </li> -->
				<li class="col-33" id="time">
					<a class='rank-item <?php if($order_num == 3): ?>cur<?php else: endif; ?> '>最新<i class="trian"></i></a>
				</li>
			</ul>
		</div>

		<div class="products-list mt-10">
			<ul class="row">

				<?php if(is_array($goods_list)): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="col-50 mt-12">
						<a href="<?php echo U('App/Shop/goods',array('sid'=>0,'cid'=>$cid,'id'=>$vo['id'],'ppid'=>$_SESSION['WAP']['vipid']));?>" class="link-wrap">
							<div class="prod-img">
								<img src="<?php echo ($vo["imgurl"]); ?>" alt="" width="125px" height="110px">
							</div>
							<h4 class="t-e mt-8"><?php echo ($vo["name"]); ?></h4>
							<p class="color-ora mt-8">￥<?php echo ($vo["price"]); ?></p>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div class="pages">
			<?php echo ($page); ?>
		</div>
	</section>
</div>
<script src="/Public/App/js/swiper-3.4.2.jquery.min.js"></script>
<script src="/Public/App/js/jquery-3.2.1.min.js"></script>


<script type="text/javascript">
	$("#price").click(function(){
		var con =$(".left-menu-bar .cur a").attr('href');
		var price_order=$("#price_order").val();
		var pir_href=con+"/price/"+price_order
		window.location.href=pir_href;
	});

	$("#time").click(function(){
		var con =$(".left-menu-bar .cur a").attr('href');

		var time_href=con+"/time/desc";
		window.location.href=time_href;
	});
	$("#comprehensive").click(function(){
		var con =$(".left-menu-bar .cur a").attr('href');

		var comprehensive_href=con+"/comprehensive/desc";
		window.location.href=comprehensive_href;
	});

</script>
</body>
</html>