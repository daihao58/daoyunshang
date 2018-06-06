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
    <link rel="stylesheet" href="/Public/App/css/swiper-3.4.2.min.css">
    <link rel="stylesheet" href="/Public/App/css/layout.css">
    <link rel="stylesheet" href="/Public/App/css/style.css">
</head>
<script src="/Public/App/js/jquery-3.2.1.min.js"></script>
<script src="/Public/App/js/swiper-3.4.2.jquery.min.js"></script>
<script src="/Public/App/js/jquery.qrcode.min.js"></script>

<style>
    .er{
        position: absolute;
        top:30%;
        left: 25%;
        z-index: 999;
    }
    .c1{
        display: none;
    }
</style>
<body>
<div class="page page-user page-current" id="page-user">
    <!-- 标题栏 -->
    <header class="bar bar-header">
        <h1 class="title">我的</h1>
        <a href="/App/Vip/message" class="iconfont icon-msg bar-btn pull-right"></a>
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
		



    <!--内容区-->
    <div class="content">
        <!-- 用户信息 -->
        <div class="user-block">
            <div class="bg-semiCir"></div>
            <div class="user-infor">
                <span class="portrait" style="background-image: url(<?php echo ($data["headimgurl"]); ?>);"></span>
                <p class="user-name"><?php echo ($data["nickname"]); ?></p>
                <p class="user-level mt-12">
                    <i class="iconfont icon-vip1"></i><span><?php echo ($data["fxname"]); ?></span>                    
                </p>
                <?php if($data['experience_hall'] == 1): ?><a href="#" class="iconfont icon-shop"></a>
                <?php else: endif; ?>

            </div>
            
            <a href="/app/vip/userinfo" class="iconfont icon-right"></a>
        </div>

        <!-- 主要功能 -->
        <div class="card-block">
            <ul class="menu-nav row">
                <li class="col-25 nav-tjm">
                        <a href="/app/vip/ewm/ercode/<?php echo ($data["my_recommend_code"]); ?>">
                    <i class="m-nav-icon"></i>
                
                    <p class="font-12">推荐码</p>
                </a>
                </li>
                <li class="col-25">
                    <a href="/app/vip/ewm/ercode/<?php echo ($data["my_recommend_code"]); ?>"><p class="font-12 mt-14"><?php echo ($data["my_recommend_code"]); ?></p></a>
                </li>
                <!--<li class="col-25 nav-tyg">
                    <a href="">
                        <i class="m-nav-icon"></i>
                        <p class="font-12">体验馆</p>
                    </a>
                </li>-->
                <li class="col-25 nav-jf">
                    <i class="m-nav-icon"></i>
                    <p class="font-12">积分</p>
                </li>
                <li class="col-25">
                    <p class="font-12 mt-14"><?php echo ($data["score"]); ?></p>
                </li>
                <!--<li class="col-25 nav-xjb">
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
                <a href="/App/Vip/bill/type/3">
                <li class="item-content">

                        <div class="item-media"><i class="iconfont icon-money" style="color: #ff4178"></i></div>
                        <div class="item-title">现金币<span class="pull-right"><?php echo ($data["money"]); ?></span></div>

                </li>
                </a>
                <li>
                    <a href="/App/Vip/bill/type/1" class="item-content">
                        <div class="item-media"><i class="iconfont icon-bill" style="color: #0fe4ff"></i></div>
                        <div class="item-title">账单查询<i class="more-link pull-right"></i></div>
                    </a>
                </li>
                <li>
                    <a href="/App/Vip/collection" class="item-content">
                        <div class="item-media"><i class="iconfont icon-follow" style="color: #ffcb00"></i></div>
                        <div class="item-title">我的收藏<i class="more-link pull-right"></i></div>
                    </a>
                </li>
                <li>
                    <a href="/App/Vip/address" class="item-content">
                        <div class="item-media"><i class="iconfont icon-addr" style="color: #10b8ff"></i></div>
                        <div class="item-title">收货地址<i class="more-link pull-right"></i></div>
                    </a>
                </li>
                <li>
                    <a href="/App/Vip/feedback" class="item-content">
                        <div class="item-media"><i class="iconfont icon-kefu" style="color: #ff8c44"></i></div>
                        <div class="item-title">客户服务<i class="more-link pull-right"></i></div>
                    </a>
                </li>
                <?php if($data['experience_hall'] == 1): ?><li>
                        <a href="/App/Vip/agency" class="item-content">
                            <div class="item-media"><i class="iconfont icon-agency" style="color: #37c25e"></i></div>
                            <div class="item-title">代理挂靠<i class="more-link pull-right"></i></div>
                        </a>
                    </li>
                    <?php else: endif; ?>
                <li>
                    <a href="/App/Vip/tuiguang" class="item-content">
                        <div class="item-media"><i class="iconfont icon-kefu" style="color: #ff8c44"></i></div>
                        <div class="item-title">我的推广<i class="more-link pull-right"></i></div>
                    </a>
                </li>
                <li>
                    <div class=""><button class="button button-big tuichu">退出登录</button></div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="code" class="er "></div>
<script>
    var i=1;
    function erweima(){
        if(i==1){
            $("#code").qrcode({ //code_img是一个img标签的id
                render: "canvas",    //设置渲染方式，有table和canvas，使用canvas方式渲染性能相对来说比较好
                text: "http://yunshang.czcaizi.com/App/Vip/reg/tui_code/<?php echo ($data['my_recommend_code']); ?>",   //扫描二维码后显示的内容,可以直接填一个网址，扫描二维码后自动跳向该链接
                width: 200,              //二维码的宽度
                height: 200,
                background: "#ffffff",       //二维码的后景色
                foreground: "#000000",        //二维码的前景色
                src: $('#image').attr('src')             //二维码中间的图片
            });
            i++
        }else{
            $('.er').removeClass("c1");
        }

    }
    $('.er').click(function(){
        $(this).addClass("c1");
    })

    $(".tuichu").click(function(){
        window.location.href="/App/vip/logout";
    });
</script>
</body>
</html>