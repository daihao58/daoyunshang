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
        <form action="/App/Shop/goods_kind" method="get">
            <a href="#" class="search-head"><input type="text" name="search_key" placeholder="请输入关键词"></a>
        </form>
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



                <!--<li class="col-20">
                    <a href="products.html#/bjsp" class="nav-lk"  id="lk-bjsp">
                        <i class="nav-icon"></i>
                        <span>保健食品</span>
                    </a>
                </li>
                <li class="col-20">
                    <a href="products.html#/dlq" class="nav-lk" id="lk-dlq">
                        <i class="nav-icon"></i>
                        <span>代理区</span>
                    </a>
                </li>
                <li class="col-20">
                    <a href="products.html#/mrhf" class="nav-lk" id="lk-mrhf">
                        <i class="nav-icon"></i>
                        <span>美容护肤</span>
                    </a>
                </li>
                <li class="col-20">
                    <a href="products.html#/rhcp" class="nav-lk" id="lk-rhcp">
                        <i class="nav-icon"></i>
                        <span>日化产品</span>
                    </a>
                </li>
                <li class="col-20">
                    <a href="products.html#/jsxl" class="nav-lk" id="lk-jsxl">
                        <i class="nav-icon"></i>
                        <span>酒水系列</span>
                    </a>
                </li>
                <li class="col-20">
                    <a href="products.html#/jkqx" class="nav-lk"  id="lk-jkqx">
                        <i class="nav-icon"></i>
                        <span>健康器械</span>
                    </a>
                </li>
                <li class="col-20">
                    <a href="products.html#/zcpz" class="nav-lk" id="lk-zcpz">
                        <i class="nav-icon"></i>
                        <span>资产配置</span>
                    </a>
                </li>
                <li class="col-20">
                    <a href="products.html#/ylmr" class="nav-lk" id="lk-ylmr">
                        <i class="nav-icon"></i>
                        <span>医疗美容</span>
                    </a>
                </li>-->
               <!-- <li class="col-20">
                    <a href="products.html#/qt" class="nav-lk" id="lk-qt">
                        <i class="nav-icon"></i>
                        <span>其他</span>
                    </a>
                </li>-->
            </ul>
            <!-- 公告 -->
            <div class="news-list mt-12 bor-t">
                <i class="iconfont icon-gonggao"></i>
                <div class="swiper-container" id="newsList">
                    <ul class="swiper-wrapper">
                        <?php if(is_array($notice)): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="swiper-slide"><a href=" <?php echo ($url); echo U('App/Artical/index' , array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

                        <!--<li class="swiper-slide"><a href="">访问量过万啦啦！</a></li>
                        <li class="swiper-slide"><a href="">版本更新呀呀呀呀！</a></li>-->
                    </ul>
                </div>
            </div>
        </div>

        <!-- 推荐 -->
        <div class="hotRecom-block content-block">
            <div class="row">
                <div class="col-33 recom-wrap-left">
                   <!-- <a class="link-wrap" style="background-image: url(/Public/App/images/hotRecom-hsh.png)">
                        <i class="tag">惠生活</i>
                        <h4>克丽美容SPA</h4>
                        <span class="type-tag">医疗美容</span>
                    </a>-->
                    <a href="<?php echo ($main_left['url']); ?>"><img src="<?php echo ($main_left['img_url']); ?>" ></a>
                </div>
                <div class="col-66 recom-wrap-right-top">
                   <!-- <a class="link-wrap" style="background-image: url(/Public/App/images/hotRecom-bml.png)">
                        <i class="tag">变美丽</i>
                        <h4>自然堂滋养系列</h4>
                        <span class="type-tag">美容护肤</span>
                    </a>-->
                    <a href="<?php echo ($main_right_top['url']); ?>"><img src="<?php echo ($main_right_top['img_url']); ?>" ></a>
                </div>
                <div class="col-33 recom-wrap-right-bottom-left">
                   <!-- <a class="link-wrap" style="background-image: url(/Public/App/images/hotRecom-gpw.png)">
                        <i class="tag">高品位</i>
                        <h4>张裕<br>解百纳</h4>
                        <span class="type-tag">酒水系列</span>
                    </a>-->
                    <a href="<?php echo ($main_right_bottom_left['url']); ?>"><img src="<?php echo ($main_right_bottom_left['img_url']); ?>" ></a>
                </div>
                <div class="col-33 recom-wrap-right-bottom-right">
                   <!-- <a class="link-wrap" style="background-image: url(/Public/App/images/hotRecom-xjk.png)">
                        <i class="tag">享健康</i>
                        <h4>养生堂口服液</h4>
                        <span class="type-tag">保健食品</span>
                    </a>-->
                    <a href="<?php echo ($main_right_bottom_right['url']); ?>"><img src="<?php echo ($main_right_bottom_right['img_url']); ?>" ></a>
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

               <!-- <li>
                    <a href="" class="item-content">
                        <div class="item-media"><img src="/Public/App/images/data2.jpg" alt=""></div>
                        <div class="item-inner">
                            <h4 class="t-e">自然套水润系列超值套盒</h4>
                            <p class="mt-10 font-12 color-light t-e">超值超级礼包，8.8折</p>
                            <p class="mt-18 price"><sub>￥</sub>1056</p>
                        </div>
                    </a>
                </li>-->
            </ul>
        </div>
        <br><br>
    </section>
</div>
<script src="/Public/App/js/jquery-3.2.1.min.js"></script>
<script src="/Public/App/js/swiper-3.4.2.jquery.min.js"></script>
<script>
    $(function() {
        new Swiper('#bannerTop', {
            speed: 500,
            autoplay: 3000,
            autoplayDisableOnInteraction: false,
            centeredSlides : true,
            slidesPerView: 3,
            spaceBetween : 15,
            loop: true
        })

        new Swiper('#newsList', {
            direction: 'vertical',
            speed: 500,
            autoplay: 2000,
            loop: true
        });
    });
</script>
</body>
</html>