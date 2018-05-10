<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <title>我要退货</title>
    <meta charset="utf-8" />
		<!--页面优化-->
		<meta name="MobileOptimized" content="320">
		<!--默认宽度320-->
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
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
		<link rel="stylesheet" href="/Public/App/css/style.css" />
	    <!--组件依赖js begin-->
	    <script src="/Public/App/js/zepto.min.js"></script>
	    <!--组件依赖js end-->		
		<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
        <script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
    

</head>
<body class="back1 ">
		<div class="odrd_cc back2 ovflw color9 border-b1 border-t1 mr-b" >
			<div class="border-b1 odrd_tt">订单信息</div>
			<div class="odrd_stu">
				<p>订单状态：<em class="color3"><?php switch($cache["status"]): case "0": ?>已取消<?php break;?>
					<?php case "1": ?>待付款<?php break;?>
					<?php case "2": ?>待发货<?php break;?>
					<?php case "3": ?>待收货<?php break;?>
					<?php case "4": ?>退货中<?php break;?>
					<?php case "5": ?>已完成-<?php echo (date("Y/m/d",$cache["etime"])); break;?>
					<?php case "6": ?>已关闭-<?php echo (date("Y/m/d",$cache["closetime"])); break; endswitch;?></em></p>
				<p>实付总额：<em class="color3"><?php echo ($cache["payprice"]); ?></em></p>
				<p>订单编号：<?php echo ($cache["oid"]); ?></p>
				<p>创建时间：<?php echo (date("Y/m/d H:i:s",$cache["ctime"])); ?></p>
				<p>收件人：<?php echo ($cache["vipname"]); ?></p>
				<p>联系方式：<?php echo ($cache["vipmobile"]); ?></p>
				<p>收货地址：<?php echo ($cache["vipaddress"]); ?></p>
				<p>邮费：<?php echo ($cache["yf"]); ?>元</p>
				<p>代金卷：<?php if(!empty($djq)): echo ($djq["money"]); ?>元代金卷<?php else: ?>未使用<?php endif; ?></p>
				<p>备注：<?php echo ($cache["msg"]); ?></p>
			</div>
		</div>
		<div class="ads-lst border-b1 ovflw mr-b back2 color6 border-t1">
			<p class="ads-tt border-b1 color9">商品明细</p>
			<?php if(is_array($cache["items"])): $i = 0; $__LIST__ = $cache["items"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vt): $mod = ($i % 2 );++$i;?><div class="ads_orinfo ads_padding3 ovflw border-b1">
						<div class="ads_orinfol ovflw fl">
							<div class="ads_or_img fl">
								<!-- 图片大小为147*101 -->
								<img  src="<?php echo ($vt["pic"]); ?>"/>
							</div>
							<h3><?php echo ($vt["name"]); ?></h3>
							<?php if(!empty($vt["skuattr"])): ?><p class="color3 fonts2"><?php echo ($vt["skuattr"]); ?></p><?php endif; ?>
						</div>
						<div class="ads_orprice ovflw ">
							<p ><em class="fonts85">￥</em><em class="fonts18"><?php echo ($vt["price"]); ?></em></p>
							<p class="ads_ornum fonts85">X<?php echo ($vt["num"]); ?></p>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<!-- 支付方式 -->
			<p class=" ads_ortt3 fonts85 ovflw border-b1"><span class="fl">共<?php echo ($cache["totalnum"]); ?>件商品</span><span class="fr">实付：<em class="fonts18">￥<?php echo ($cache["payprice"]); ?></em></span></p>
			</div>
		<div class="ads-lst border-b1 ovflw mr-b back2 color6 border-t1">
			<p class="ads-tt border-b1 color9">退货申请表</p>
			<div class="add-ads back2">
			<form action="<?php echo U('App/Shop/orderTuihuoSave');?>" method="post" id="thform">
			<input type="hidden" name="sid" value="0">
			<input type="hidden" name="orderid" value="<?php echo ($cache["id"]); ?>">
			<ul class="add-uls">
				<li class="border-b1 ovflw"><span class="fl">退货金额</span><input type="text" name="tuihuoprice" placeholder="必填" value="<?php echo ($cache["tuihuoprice"]); ?>" id="thprice"/></li>
				<li class="border-b1 ovflw"><span class="fl">快递公司</span><input type="text" name="tuihuokd" placeholder="必填" value="<?php echo ($cache["tuihuokd"]); ?>" id="kd"/></li>
				<li class="border-b1 ovflw"><span class="fl">快递单号</span><input type="text" name="tuihuokdnum"placeholder="必填" value="<?php echo ($cache["tuihuokdnum"]); ?>" id="kdnum"/></li>
				<li class="border-b1 ovflw"><span class="fl">退货说明</span><input type="text" name="tuihuomsg" placeholder="请输入退货理由或货品名称" value="<?php echo ($cache["tuihuomsg"]); ?>" id="msg"/></li>
			</ul>
			</div>
			<p class=" ads_ortt3 fonts85 ovflw"><span class="fr"><a href="<?php echo U('App/Shop/orderList',array('sid'=>0));?>" class="borders padd2 color6 mar5">返回列表</a><?php if(($cache["status"]) == "3"): ?><a href="javascritp:void(0)" id="toth" class="borders padd2 color6 mar5">确认退货</a><?php endif; ?></span></p>
			</form>
		</div>
		<script type="text/javascript">
			$('#toth').on('click',function(){
				var thprice=$('#thprice').val();
				var kd=$('#kd').val();
				var kdnum=$('#kdnum').val();
				if(!thprice){
					App_gmuMsg('请填写退货金额！');
					return false;
				}
				if(!kd){
					App_gmuMsg('请填写退货快递公司！');
					return false;
				}
				if(!kdnum){
					App_gmuMsg('请填写退货快递单号！');
					return false;
				}
				$('#thform').submit();
				//alert('aa');
				return false;
			});
		</script>
		<!-- 底部导航 -->
				<div class="insert1"></div>
		<div class="ui-nav">
			<ul class="ui-navul ovflw">
				<li><a href="<?php echo U('App/Shop/index',array('shopid'=>$shopid));?>" id="fthome"><span class="iconfont">&#xe6b8</span><p class="ui-navtt">首页</p></a></li>
				<li><a href="<?php echo U('App/Shop/orderList',array('sid'=>0));?>" id="ftorder"><span class="iconfont">&#xe699</span><p class="ui-navtt">订单</p></a></li>
				<li><a href="<?php echo U('App/Shop/basket',array('sid'=>0,'lasturl'=>$footlasturl));?>" id="ftbasket"><span class="iconfont">&#xe6af</span><p class="ui-navtt">购物车</p></a></li>
				<li><a href="<?php echo U('App/Vip/index');?>" id="ftvip"><span class="iconfont">&#xe686</span><p class="ui-navtt">个人中心</p></a></li>
			</ul>
		</div>
		<script type="text/javascript">
			 var actname="<?php echo ($actname); ?>";
			 $('#'+actname).css('color','#19a5f3');
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