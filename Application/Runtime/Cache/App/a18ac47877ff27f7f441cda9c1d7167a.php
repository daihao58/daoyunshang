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
    <link rel="stylesheet" href="/Public/App/css/layout.css">
    <link rel="stylesheet" href="/Public/App/css/style.css">
</head>
<script src="/Public/App/js/jquery-3.2.1.min.js"></script>
<script src="/Public/App/js/swiper-3.4.2.jquery.min.js"></script>
<body>
<div class="page page-user page-current" id="page-user">
    <!-- 标题栏 -->
    <header class="bar bar-header">
        <h1 class="title">我的</h1>
        <a href="/App/Vip/message" class="iconfont icon-msg bar-btn pull-right"></a>
    </header>

    <!-- 工具栏 -->
    		<div class="insert1"></div>
		<div class="ui-nav">
			<!--<ul class="ui-navul ovflw">
				<li><a href="<?php echo U('App/Shop/index',array('shopid'=>$shopid));?>" id="fthome"><span class="iconfont">&#xe6b8</span><p class="ui-navtt">首页</p></a></li>
				<li><a href="<?php echo U('App/Shop/orderList',array('sid'=>0));?>" id="ftorder"><span class="iconfont">&#xe699</span><p class="ui-navtt">订单</p></a></li>
				&lt;!&ndash; <li><a href="<?php echo U('App/Shop/basket',array('sid'=>0,'lasturl'=>$footlasturl));?>" id="ftbasket"><span class="iconfont">&#xe6af</span><p class="ui-navtt">购物车</p></a></li>&ndash;&gt;
				<li><a href="tel:<?php echo ($service_tel); ?>" id="ftorder"><span class="iconfont">&#xe6ff</span><p class="ui-navtt">客服</p></a></li>
				<li><a href="<?php echo U('App/Vip/index');?>" id="ftvip"><span class="iconfont">&#xe686</span><p class="ui-navtt">个人中心</p></a></li>
			</ul>-->
			<nav class="bar bar-nav">
				<a href="/App/Shop/index" class="nav-item <?php if($moren_tb == "shouye" ): ?>cur<?php else: endif; ?> ">
					<i class="iconfont icon-home-s"></i>
					<span class="tab-label">首页</span>
				</a>
				<a href="/App/Shop/orderList/sid/0" class="nav-item <?php if($moren_tb == "dingdan" ): ?>cur<?php else: endif; ?> ">
					<i class="iconfont icon-order"></i>
					<span class="tab-label">订单</span>
				</a>
				<a href="<?php echo U('App/Shop/basket/',array('sid'=>0,'lasturl'=>$lasturl));?>" class="nav-item">
					<i class="iconfont icon-cart"></i>
					<span class="tab-label">购物车</span>
				</a>
				<a href="tel:<?php echo ($_SESSION['SHOP']['set']['phone']); ?>" class="nav-item">
					<i class="iconfont icon-online"></i>
					<span class="tab-label">客服</span>
				</a>
				<a href="/App/Vip/index" class="nav-item <?php if($moren_tb == "wode" ): ?>cur<?php else: endif; ?> ">
					<i class="iconfont icon-user"></i>
					<span class="tab-label">我的</span>
				</a>
			</nav>
		</div>
		<script type="text/javascript">
			 var actname="<?php echo ($actname); ?>";
			 $('#'+actname).css('color','#19a5f3');
		</script>

    <!--内容区-->
    <div class="content">
        <!-- 用户信息 -->
        <div class="user-block">
            <div class="bg-semiCir"></div>
            <div class="user-infor">
                <span class="portrait" style="background-image: url(<?php echo ($data["headimgurl"]); ?>);"></span>
                <p class="user-name"><?php echo ($data["nickname"]); ?></p>
                <p class="user-level mt-12"><i class="iconfont icon-vip1"></i><span><?php echo ($data["fxname"]); ?></span></p>
            </div>
            <a href="" class="iconfont icon-right"></a>
        </div>

        <!-- 主要功能 -->
        <div class="card-block">
            <ul class="menu-nav row">
                <li class="col-25 nav-tjm">
                    <i class="m-nav-icon"></i>
                    <p class="font-12">推荐码</p>
                </li>
                <li class="col-25 nav-jf">
                    <p class="font-12">89ktrt</p>
                </li>
             <!--   <li class="col-25 nav-tyg">
                    <a href="">
                        <i class="m-nav-icon"></i>
                        <p class="font-12">体验馆</p>
                    </a>
                </li>-->
                <li class="col-25 nav-jf">
                    <i class="m-nav-icon"></i>
                    <p class="font-12">积分</p>
                </li>
                <li class="col-25 nav-jf">
                    <p class="font-12"><?php echo ($data["score"]); ?></p>
                </li>
              <!--  <li class="col-25 nav-xjb">
                    <a href="">
                        <i class="m-nav-icon"></i>
                        <p class="font-12">现金币</p>
                    </a>
                </li>-->
            </ul>
        </div>

        <!-- 收藏 -->
        <div class="list-block media-list mt-20 borTop-0">
            <ul>
                <li>
                    <a href="#" class="item-content">
                        <div class="item-media"><i class="iconfont icon-bill" style="color: #ff4178"></i></div>
                        <div class="item-title">现金币</div>
                        <span style="display: inline-block; float: right"><?php echo ($data["money"]); ?></span>
                    </a>
                </li>
              <!--  <li>
                    <a href="#" class="item-content">
                        <div class="item-media"><i class="iconfont icon-bill" style="color: #ff4178"></i></div>
                        <div class="item-title">体验馆</div>
                        <span><?php echo ($data["experience_hall"]); ?></span>
                    </a>
                </li>-->
                <li>
                    <a href="/App/Vip/bill/type/1" class="item-content">
                        <div class="item-media"><i class="iconfont icon-bill" style="color: #ff4178"></i></div>
                        <div class="item-title">账单查询</div>
                        <i class="more-link"></i>
                    </a>
                </li>
                <li>
                    <a href="/App/Vip/collection" class="item-content">
                        <div class="item-media"><i class="iconfont icon-addr" style="color: #10b8ff"></i></div>
                        <div class="item-title">我的收藏</div>
                        <i class="more-link"></i>
                    </a>
                </li>
                <li>
                    <a href="/App/Vip/address" class="item-content">
                        <div class="item-media"><i class="iconfont icon-addr" style="color: #10b8ff"></i></div>
                        <div class="item-title">收货地址</div>
                        <i class="more-link"></i>
                    </a>
                </li>
                <li>
                    <a href="/App/Vip/feedback" class="item-content">
                        <div class="item-media"><i class="iconfont icon-addr" style="color: #10b8ff"></i></div>
                        <div class="item-title">客户服务</div>
                        <i class="more-link"></i>
                    </a>
                </li>
                <?php if($data['experience_hall'] == 1): ?><li>
                        <a href="/App/Vip/agency" class="item-content">
                            <div class="item-media"><i class="iconfont icon-agency" style="color: #ff8c44"></i></div>
                            <div class="item-title">代理挂靠</div>
                            <i class="more-link"></i>
                        </a>
                    </li>
                    <?php else: endif; ?>

            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
</script>
</body>