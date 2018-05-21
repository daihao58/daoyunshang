<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>联系人管理</title>
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
    <script type="text/javascript" src="/Public/App/js/zepto.min.js"></script>
    <style>
        .list-block .button {
            padding: 0 .8rem;
            height: 1.6rem;
            line-height: 1.6rem;
            font-size: .65rem;
        }
    </style>
</head>

<body>
    <div class="page">
        <header class="bar bar-header">
            <a href="<?php echo U('App/Vip/index');?>" class="iconfont icon-back bar-btn pull-left"></a>
            <h1 class="title"></h1>
            <a href="<?php echo U('App/Shop/index',array('shopid'=>$shopid));?>" class="iconfont icon-home-head bar-btn pull-right"></a>
        </header>
        <footer class="bar bar-footer">
            <a href="<?php echo U('App/Vip/addressSet');?>" class="nav-button font-16">新增联系人</a>
        </footer>
        <div class="content">
            <ul class="list-block mt-0">
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo U('App/Vip/addressSet',array('id'=>$vo['id']));?>" class="vipaddress item-content" data-id="<?php echo ($vo["id"]); ?>">
                            <div>
                                <h3><?php echo ($vo["name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["mobile"]); ?></h3>
                                <p class="color-light font-12 mt-10"><?php echo ($vo["address"]); ?></p>
                            </div>
                            <div>
                                <span class="button">选择</span>
                            </div>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        //拦截选择地址
        var vipaddress = $('.vipaddress');
        var addressback = $('#addressback');
        var orderurl = "<?php echo ($_SESSION['WAP']['orderURL']); ?>";
        $(vipaddress).on('click', function () {
            var id = $(this).data('id');
            if (orderurl) {
                var tourl = orderurl + '/vipadd/' + id;
                window.location.href = tourl;
                return false;
            }
        });
        //拦截地址返回
        $(addressback).on('click', function () {
            if (orderurl) {
                var tourl = orderurl;
                window.location.href = tourl;
                return false;
            }
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