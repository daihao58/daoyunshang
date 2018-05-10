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
<div class="page page-bill">
    <!-- 标题栏 -->
    <header class="bar bar-header">
        <a href="/App/Vip/index" class="iconfont icon-back bar-btn pull-left"></a>
        <h1 class="title">账单查询</h1>
        <a href="/App/Shop/index" class="iconfont icon-home-head bar-btn pull-right"></a>
    </header>
    <!-- content -->
    <section class="content">
        <div class="rank-block">
            <ul class="row">
                <li class="col-33" id="comprehensive">
                    <a href="/App/Vip/bill/type/1" class="rank-item <?php if($cur == 1): ?>cur<?php else: endif; ?> ">购买</a>
                </li>
                <li class="col-33" id="price">
                    <a href="/App/Vip/bill/type/2" class="rank-item <?php if($cur == 2): ?>cur<?php else: endif; ?> ">返利</i></a>
                </li>
                <li class="col-33" id="time">
                    <a href="/App/Vip/bill/type/3" class="rank-item <?php if($cur == 3): ?>cur<?php else: endif; ?> ">充值</a>
                </li>
            </ul>
        </div>
        <div class="list-block mt-0">
            <?php if($cur == 1): ?><ul>
                    <?php if(is_array($data_pay)): $i = 0; $__LIST__ = $data_pay;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="item-content">
                            <div class="item-inner">
                                <span class="pull-right font-16">-<?php echo ($vo["totalprice"]); ?></span>
                                <div class="t-e">购买-订单:<?php echo ($vo["oid"]); ?></div>
                                <div class="mt-12 color-light font-12"><?php echo date('Y-m-d H:i:s',$vo['paytime']) ?></div>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            <?php elseif($cur == 2): ?>
                <ul>
                    <?php if(is_array($data_pay)): $i = 0; $__LIST__ = $data_pay;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="item-content">
                            <div class="item-inner">
                                <span class="pull-right font-16">+<?php echo ($vo["rebate_money"]); ?></span>
                                <div class="t-e"><?php echo ($vo["content"]); ?></div>
                                <div class="mt-12 color-light font-12"><?php echo ($vo["time"]); ?></div>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            <?php elseif($cur == 3): ?>
                <ul>
                    <?php if(is_array($data_pay)): $i = 0; $__LIST__ = $data_pay;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="item-content">
                            <div class="item-inner">
                                <span class="pull-right font-16">+<?php echo ($vo["money"]); ?></span>
                                <div class="t-e">充值-账号:<?php echo ($vo["mobile"]); ?></div>
                                <div class="mt-12 color-light font-12"><?php echo ($vo["time"]); ?></div>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            <?php else: endif; ?>

        </div>
    </section>
</div>
</body>

</html>