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

<body>
<!-- 首页 -->
<div class="page page-index">
    <!-- 标题栏 -->
    <header class="bar bar-header">
        <a href="/App/Shop/sousuolist" class="search-head"><i class="iconfont icon-search pr-4"></i><input type="text" name="search_key" placeholder="请输入关键词"></a>
    </header>

    <!-- 工具栏 -->
    
		
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
		



    <!-- content -->
    <section class="content">
        <!-- banner -->
        <div class="swiper-outer-wrapper">
            <div class="bg-semiCir"></div>
            <div class="swiper-container" id="bannerTop">
                <ul class="swiper-wrapper">
                    <?php if(is_array($indexalbum)): foreach($indexalbum as $key=>$vo): ?><li class="swiper-slide"><a href="<?php echo ($vo["url"]); ?>"> <img src="<?php echo ($vo["imgurl"]); ?>" alt=""></a></li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>

        <!-- 产品分类/公告 -->
        <div class="nav-block content-block mt-0">
            <!-- 分类导航 -->
            <ul class="row">
                <?php if(is_array($indexicons)): $k = 0; $__LIST__ = array_slice($indexicons,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="col-20">
                        <a href="<?php echo U('App/Shop/goods_kind',array('sid'=>0,'cid'=>$vo['id'],'ppid'=>$_SESSION['WAP']['vipid']));?>" class="nav-lk" id="lk-<?php echo ($k); ?>">
                            <i class="nav-icon"></i>
                            <span><?php echo ($vo["name"]); ?></span>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <!-- 公告 -->
            <div class="news-list mt-12 bor-t">
                <i class="iconfont icon-gonggao"></i>
                <div class="swiper-container" id="newsList">
                    <ul class="swiper-wrapper">
                        <?php if(is_array($notice)): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="swiper-slide"><a href=" <?php echo ($url); echo U('App/Artical/index' , array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 推荐 -->
        <div class="hotRecom-block content-block">
            <div class="row">
                <div class="col-33 recom-wrap-left">
                    <a href="<?php echo ($main_left['url']); ?>" style="background-image: url('<?php echo ($main_left['img_url']); ?>')" class="recom-lkImg"></a>
                </div>
                <div class="col-66 recom-wrap-right-top">
                    <a href="<?php echo ($main_right_top['url']); ?>" style="background-image: url('<?php echo ($main_right_top['img_url']); ?>')" class="recom-lkImg"></a>
                </div>
                <div class="col-33 recom-wrap-right-bottom-left">
                    <a href="<?php echo ($main_right_bottom_left['url']); ?>" style="background-image: url('<?php echo ($main_right_bottom_left['img_url']); ?>')" class="recom-lkImg"></a>
                </div>
                <div class="col-33 recom-wrap-right-bottom-right">
                    <a href="<?php echo ($main_right_bottom_right['url']); ?>" style="background-image: url('<?php echo ($main_right_bottom_right['img_url']); ?>')" class="recom-lkImg"></a>
                </div>
            </div>
        </div>

        <!-- 产品中心 -->
        <div class="products-list list-block media-list">
            <h2 class="title-index"><span>产品中心</span></h2>
            <ul>
                <?php if(is_array($cache)): $i = 0; $__LIST__ = $cache;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo U('App/Shop/goods',array('sid'=>0,'id'=>$vo['id'],'ppid'=>$_SESSION['WAP']['vipid']));?>" class="item-content">
                            <div class="item-media"><img src="<?php echo ($vo["imgurl"]); ?>" alt=""></div>
                            <div class="item-inner">
                                <h4 class="t-e"><?php echo ($vo["name"]); ?></h4>
                                <p class="mt-10 font-12 color-light t-e"><?php echo ($vo["promotional"]); ?></p>
                                <p class="mt-18 price"><sub>￥</sub><?php echo ($vo["price"]); ?></p>
                            </div>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <a id="backTop"><i class="iconfont icon-backTop"></i></a>
    </section>
</div>
<script src="/Public/App/js/jquery-3.2.1.min.js"></script>
<script src="/Public/App/js/swiper-3.4.2.jquery.min.js"></script>
<script>
    $(function() {
        if ($('#bannerTop .swiper-slide').length < 2) {
            $('#bannerTop').css('width', '90%')
        } else {
            new Swiper('#bannerTop', {
                speed: 500,
                autoplay: 3000,
                autoplayDisableOnInteraction: false,
                centeredSlides: true,
                slidesPerView: 3,
                spaceBetween: 15,
                loop: true
            })
        }

        new Swiper('#newsList', {
            direction: 'vertical',
            speed: 500,
            autoplay: 2000,
            loop: true
        });

        $('.content').scroll(function () {
			if ($(this).scrollTop() >= 100) {
			    $('#backTop').show();
			} else {
			    $('#backTop').hide();
			}
		});

		$('#backTop').on('click',function(e) {
			e.preventDefault();
			$('.content').animate({scrollTop: 0},300);
		});
    });
</script>
</body>
</html>