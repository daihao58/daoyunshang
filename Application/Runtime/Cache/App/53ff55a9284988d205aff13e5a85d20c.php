<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
	<title>道合商城_品质生活，健康人生_健康养生平台</title>
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
	<link rel="stylesheet" href="/Public/App/css/layout2.css" />
	<link rel="stylesheet" href="/Public/App/css/style2.css" />
	<link rel="stylesheet" href="/Public/App/css/style.css" />
	<link rel="stylesheet" href="/Public/App/css/appslider.css" />
	<!--组件依赖js begin-->
	<script src="/Public/App/js/zepto.min.js"></script>
	<script src="/Public/App/js/fx.js"></script>
	<!--组件依赖js end-->
	<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
	<script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
	<script type="text/javascript" src="/Public/App/js/appslider.min.js"></script>

	<!--追入购物车角标-->
	<style>
		.dtl-shp {
			position: relative;
		}

		.dtl-shp b {
			position: absolute;
			padding: 4px;
			font-size: 0.5em;
			line-height: 0.5em;
			background: #FF0000;
			color: #FFFFFF;
			right: 0px;
			border-radius: 30px;
		}

		/*2017-6-13修改弹框样式*/

		.telnone {
			display: none;
			position: fixed;
			width: 100%;
			height: 100%;
			bottom: 0;
			z-index: 1000;
			background-color: rgba(0, 0, 0, 0.3);
			padding: 0 5%;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}

		#kefudianhua div.order-foot {
			position: relative;
			background-color: white;
			text-align: left;
			padding: 18px 14px;
			margin-top: 25%;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;

		}

		#kefudianhua div.order-foot>p {
			margin: 12px 0 !important;
			-webkit-margin-before: 1em;
			-webkit-margin-after: 1em;
			-webkit-margin-start: 0px;
			-webkit-margin-end: 0px;
		}

		#kefudianhua div.order-foot .state {
			font-size: 14px;
		}

		#kefudianhua div.order-foot div.bddh {
			margin: 20px auto;
			text-align: center;
			width: 90%;
			height: 42px;
			border-radius: 6px;
			background-color: #f80;
			color: #fff;
			font-size: 14px;
			line-height: 42px;
		}

		#kefudianhua .close-btn {
			position: absolute;
			top: 6px;
			right: 14px;
			width: 16px;
			height: 16px;
			background: url('/Public/App/img/guanbi.png') no-repeat center center;
			background-size: 100%;
		}

		.form-control {
			font-size: 14px;
			width: 100%;
			height: 40px;
			padding: 16px 8px;
			padding-left: 5px;
			padding-right: 5px;
			border: 1px solid #d9d9d9;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-appearance: none;
			appearance: none;
		}

		.left {
			width: 60%;
			border-bottom-right-radius: 0;
			border-top-right-radius: 0;
		}

		.send_pwd {
			float: right;
			width: 40%;
			font-size: 14px;
			height: 40px;
			line-height: 40px;
			display: block;
			background-color: #aaa;
			color: white;
			line-height: 40px;
			text-align: center;
			border-bottom-right-radius: 4px;
			border-top-right-radius: 4px;
		}

		.btn-red {
			background: #fd7708;
			border-radius: 4px;
			width: 48%;
			height: 40px;
			text-align: center;
			line-height: 40px;
			border: none;
			color: #fff;
			font-size: 14px;
			font-family: "Microsoft Yahei";
		}

		.btn-quxiao {
			background: #aaa;
		}

		.fr {
			float: right
		}

		.fengxiangwenjian {
			display: block;
			position: fixed;
			width: 20px;
			height: 20px;
			background: rgba(0, 0, 0, 0.3);
			font-size: 12px;
			color: #fff;
			padding: 5px 10px;
			z-index: 9999;
			right: 10px;
			top: 10px;
			border-radius: 5px;
		}

		.fanhui {
			left: 10px;
		}

		#shoucang.cur {
			color: #f80
		}

		#shoucang.cur .icon-follow:before {
			content: "\e8f8"
		}
		#App-slider.fixed {
			position: fixed;
			top: 0;
			left: 0;
			right: 0 ;
			bottom: 0;
			background: #000;
			z-index: 9999;
		}
		#App-slider.fixed ul {
			position: absolute;
			left: 0;
			top: 30%;
		}
	</style>
</head>

<body>
	<div class="page page-prodDetails">
		<!-- 标题栏 -->
		<header class="bar bar-header">
			<a href="javascript:" onclick="self.location=document.referrer;"  class="iconfont icon-back bar-btn pull-left"></a>
			<h1 class="title"><?php echo ($cache["name"]); ?></h1>
			<a href="<?php echo U('App/Shop/index',array('shopid'=>$shopid));?>" class="iconfont icon-home-head bar-btn pull-right"></a>
		</header>

		<!-- 工具栏 -->
		<nav class="bar bar-nav ">
			<a href="#" class="nav-item <?php if($sfsc == 1): ?>cur<?php else: endif; ?>" id="shoucang">
				<span class="iconfont icon-follow"></span>
				<span class="tab-label"><?php if($sfsc == 1): ?>已收藏<?php else: ?>收藏<?php endif; ?></span>
			</a>
			<a href="<?php echo U('App/Shop/basket/',array('sid'=>0,'lasturl'=>$lasturl));?>" id="basket" class="nav-item">
				<span class="iconfont icon-cart"></span>
				<span class="tab-label">购物车</span>
				<b id="basketnum" class="badge"><?php echo ($basketnum); ?>
					<?php if(empty($basketnum)): ?>0<?php endif; ?>
				</b>
			</a>
			<a href="" class="nav-button">
				<span class="tab-label" id="addtocart">加入购物车</span>
			</a>
			<a href="" class="nav-button button-ora">
				<span class="tab-label" id="fastbuy">立即购买</span>
			</a>
		</nav>

		<div class="content">
			<?php if(!empty($appalbum)): ?><div id="App-slider">
					<ul>
						<?php if(is_array($appalbum)): foreach($appalbum as $key=>$vo): ?><li>
								<a>
									<img src="<?php echo ($vo["imgurl"]); ?>">
								</a>
							</li><?php endforeach; endif; ?>
					</ul>
					<div class="dot">
						<?php if(is_array($appalbum)): foreach($appalbum as $key=>$vo): ?><span></span><?php endforeach; endif; ?>
					</div>
					<!--<a id="zuoleft" class="fengxiangwenjian fanhui" href="<?php echo U('App/Shop/index',array('shopid'=>$shopid));?>"><img src="/Public/App/img/fanhui.png" width="17.5" height="17.5"></a>
				
							<?php if($cache["adpic"] != ''): ?><a id="youright" class="fengxiangwenjian" href="<?php echo U('App/Set/index',array('id'=>$cache['id']));?>"><img src="/Public/App/img/fenxiang.png" width="17.5" height="17.5"></a><?php endif; ?>-->
				</div><?php endif; ?>
			<?php if(empty($appalbum)): if(!empty($apppic)): ?><img src="<?php echo ($apppic["imgurl"]); ?>" width="100%"><?php endif; endif; ?>
			<div class="content-block mt-0">
				<h2><?php echo ($cache["name"]); ?></h2>
				<div class="mt-14">
					<em class="color-ora font-b">￥
						<i id="goods-price" class="font-20"><?php echo ($cache["price"]); ?></i>
					</em>
					<em class="dtl-prc2">&nbsp;&nbsp;￥<?php echo ($cache["oprice"]); ?></em>
					<em style="color: #999;" class="dtl-prc3">&nbsp;&nbsp;返积分:<?php echo ($cache["price_ceo_bate"]); ?></em>
					<em class="pull-right font-12 color-light mt-4">已售
						<?php if(($cache["issells"]) == "1"): echo ($cache["dissells"]); ?>
							<?php else: echo ($cache["sells"]); endif; ?>
					</em>
				</div>
				<!--	<div class="dtl-lbl ovflw">
							<?php if(is_array($cache["label"])): $i = 0; $__LIST__ = $cache["label"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo) != ""): ?><span class='fl margin2'><i class="iconfont">&#xe657</i>&nbsp;<?php echo ($vo); ?></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</div>-->
			</div>
			<div class="content-block">
				<?php if(($cache["issku"]) == "1"): ?><div id="sku-wrap">
						<?php if(is_array($skuinfo)): foreach($skuinfo as $key=>$vo): ?><div class="sku" data-attr="">
								<p class="dtl-pty"><?php echo ($vo["attrlabel"]); ?>：</p>
								<div class="dtl-col">
									<?php if(is_array($vo["allitems"])): foreach($vo["allitems"] as $key=>$vo2): if(!empty($vo2["checked"])): ?><span data-attr="<?php echo ($vo2["path"]); ?>"><?php echo ($vo2["name"]); ?></span><?php endif; endforeach; endif; ?>
								</div>
							</div><?php endforeach; endif; ?>
					</div><?php endif; ?>
				<p class="dtl-pty">数量：</p>
				<div class="ovflw dtl_num fl">
					<a href="#" class="dtl_mar1" style="width: 15%" id="goods-dec">-</a>
					<input type="text" value="1" style="width:30%" class="fl dtl_input dtl_mar1" id="goods-total" disabled="disabled" />
					<a href="#" class="" style="width: 15%" id="goods-add">+</a>
				</div>
				<span class="font-12 color-light mt-6 pull-right">剩余：
					<em id="goods-num"><?php echo ($cache["num"]); ?></em>件</span>
				<span id="finalsku" data-sku="" data-skuattr="" style="display: none;"></span>
				<div class="clr"></div>
			</div>
			<div class="dtl-prt back2 fonts9 border-t1">
				<?php echo (htmlspecialchars_decode($cache["content"])); ?>
			</div>
			<a id="backTop"><i class="iconfont icon-backTop"></i></a>
		</div>
		<div id="kefudianhua" class="telnone">
			<div class="order-foot">
				<div class="close-btn" id="guanbid"></div>
				<p class="state">为了确保能更好的为您提供服务,
					<span style="color: #23cc77;">请绑定您的手机</span>
				</p>
				<p>
					<input type="text" class="form-control" name="mobile" placeholder="输入您的手机号" data-bv-notempty="true" data-bv-notempty-message="不能为空">
				</p>
				<p>
					<input type="text" class="form-control left" name="sms" placeholder="输入验证码" data-bv-notempty="true" data-bv-notempty-message="不能为空">
					<a href="javascript:getSms()" class="send_pwd">获取动态密码</a>
				</p>
				<p>
					<button id="telquxiao" class="btn-red btn-quxiao">取消</button>
					<button class="btn-red fr" onclick="loginByCode()">确认绑定</button>
				</p>
			</div>
		</div>
	</div>
	<!--全局封装-->
	<script type="text/javascript">
		var goodsid = "<?php echo ($cache["id"]); ?>";
		var issku = "<?php echo ($cache["issku"]); ?>";
		var vipid = "<?php echo ($_SESSION["WAP"]["vipid"]); ?>";
		var vipmobile = "<?php echo ($_SESSION["WAP"]["vip"]["mobile"]); ?>";

		var loginback = "<?php echo ($loginback); ?>";
	</script>
	<!--封装图集-->
	<?php if(!empty($appalbum)): ?><script type="text/javascript">
			Zepto(function ($) {
				$('#App-slider').swipeSlide({
					autoSwipe: true,
					lazyLoad: false,
					speed: 3000
				}, function (i) {
					$('#App-slider .dot').children().eq(i).addClass('cur').siblings().removeClass('cur');
				});
				$('#App-slider').on('click', function () {
					$(this).toggleClass('fixed');
				})
			});
		</script><?php endif; ?>

	<!--收藏-->
	<script type="text/javascript">
		$("#shoucang").on('click', function () {
			if($(this).hasClass("cur")){
				$(this).removeClass('cur');
				$(this).find('.tab-label').text('收藏')
			}else{
				$(this).addClass('cur');
				$(this).find('.tab-label').text('已收藏')
			}
			var goodsid = "<?php echo ($cache["id"]); ?>";
			$.ajax({
				type: "post",
				url: "<?php echo U('App/Shop/shoucang');?>",
				dataType: 'json',
				data: {
					goodsid: goodsid,
				},
				success: function (data) {
					//console.log(data);
					if (data.state_code == 1) {
						zbb_msg(data.msg);
					}else if(data.state_code == 5){
						window.location.href = '/app/vip/login';
					} else {
						zbb_msg(data.msg);
					}
				},
				error: function (xh, obj) {
					App_gmuMsg('通讯失败，请重试！');
				}
			});
		});
	</script>
	<!--封装SKU-->
	<script type="text/javascript">
		var goodsid = "<?php echo ($cache["id"]); ?>";
		var skujson = $.parseJSON('<?php echo ($skujson); ?>');
		var skuwrap = $('#sku-wrap');
		var allsku = $('.sku');
		var allskuattr = $('.sku span');
		var finalsku = $('#finalsku');
		var goodsprice = $('#goods-price');
		var goodsnum = $('#goods-num');
		$(allskuattr).on('click', function () {
			var fasku = $(this).parent().parent('.sku');
			var fa = $(this).parent();
			var son = $(fa).find('span');
			$(fasku).data('attr', $(this).data('attr'));
			$(son).css({
				'background': '#FFFFFF',
				'color': '#636363',
				'border': '1px solid #e5e5e5'
			});
			$(this).css({
				'background': '#f7194d',
				'color': '#FFFFFF',
				'border': '1px solid #f7194d'
			});
			var str = '';
			var totalsku = 0;
			var totalattr = 0;
			$(allsku).each(function () {
				var dt = $(this).data('attr');
				if (dt) {
					str = str + dt + '-';
					totalattr = totalattr + 1;
				}
				totalsku = totalsku + 1;
			});
			str = str.substring(0, str.length - 1);
			if (totalsku == totalattr) {
				str = goodsid + '-' + str;
				$tmpsku = skujson[str];
				$(finalsku).data('sku', $tmpsku['sku']);
				$(finalsku).data('skuattr', $tmpsku['skuattr']);
				$(goodsnum).html($tmpsku['num']);
				//			$(goodsprice).html($tmpsku['price']);
			}

		});
	</script>
	<!--封装购物车-->
	<script type="text/javascript">
		$('.content').scroll(function () {
			if ($(this).scrollTop() >= 100) {
				/* $('#zuoleft').hide();
				$('#youright').hide(); */
				$('#backTop').show();

			} else {
				/* $('#zuoleft').show();
				$('#youright').show(); */
				$('#backTop').hide();
			}
		});

		$('#backTop').on('click',function(e) {
			e.preventDefault();
			setTimeout(function() {
				$('.content')[0].scrollTop = 0;
			}, 100);
		});

		$('#telquxiao').click(function () {
			$('#kefudianhua').hide();
		});
		$('#guanbid').click(function () {
			$('#kefudianhua').hide();
		});
		var goodsnum = $('#goods-num');
		var goodsdec = $('#goods-dec');
		var goodsadd = $('#goods-add');
		var goodstotal = $('#goods-total');
		var goodsprice = $('#goods-price');
		var addtocart = $('#addtocart');
		var fastbuy = $('#fastbuy');
		var basketnum = $('#basketnum');
		$(goodsadd).on('click', function () {
			var num = Number($(goodstotal).val());
			var left = Number($(goodsnum).html());
			var total = (num + 1) <= left ? (num + 1) : left;
			$(goodstotal).val(total);
			return false;
		});
		$(goodsdec).on('click', function () {
			var num = Number($(goodstotal).val());
			var total = (num - 1) >= 1 ? (num - 1) : 1;
			$(goodstotal).val(total);
			return false;
		});
		$(addtocart).on('click', function () {
			var goodsnum = Number($('#goods-num').html());
			var num = Number($(goodstotal).val());
			var finalsku = $('#finalsku');
			//sku模式
			if (issku == '1') {
				if (goodsnum - num <= 0) {
					App_gmuMsg('该属性产品库存不足！请调整购买数量或选择其他属性！');
					return false;
				}
				if (!$(finalsku).data('sku')) {
					App_gmuMsg('请选择产品属性！');
					return false;
				}
			} else {
				if (goodsnum - num <= 0) {
					App_gmuMsg('该产品库存不足！请调整购买量或选择其他产品！');
					return false;
				}
			}
			if (!vipid || vipmobile == '') {
				var fun = function () {
					window.location.href = loginback;
				}
				App_gmuMsg('您还未登录，2秒后自动跳转登陆界面！', fun);
				return false;
			}
			var sku = $(finalsku).data('sku');
			var skuattr = $(finalsku).data('skuattr');
			var price = $(goodsprice).html();
			var num = $(goodstotal).val();
			var dt = {
				'sid': 0,
				'goodsid': goodsid,
				'vipid': vipid,
				'sku': sku,
				'num': num
			};
			$.ajax({
				type: "post",
				url: "<?php echo U('App/Shop/addtobasket');?>",
				dataType: 'json',
				data: dt,
				success: function (info) {
					if (info['status'] ==1 ) {
						App_gmuMsg(info['msg']);
						$(basketnum).html(info['total']);
					}else if(info['status'] ==5){
						window.location.href = '/app/vip/login';
					} else {
						App_gmuMsg('发生未知错误,请重新尝试！');
					}
					return false;
				},
				error: function (xh, obj) {
					App_gmuMsg('通讯失败，请重试！');
				}
			});
			return false;
		});
		//立刻购买特效
		$(fastbuy).on('click', function () {
			var goodsnum = Number($('#goods-num').html());
			var num = Number($(goodstotal).val());
			var finalsku = $('#finalsku');
			//sku模式
			if (issku == '1') {
				if (goodsnum - num <= 0) {
					App_gmuMsg('该属性产品库存不足！请调整购买量或选择其他属性！');
					return false;
				}
				if (!$(finalsku).data('sku')) {
					App_gmuMsg('请选择产品属性！');
					return false;
				}
			} else {
				if (goodsnum - num <= 0) {
					App_gmuMsg('该产品库存不足！请调整购买量或选择其他属性！');
					return false;
				}
			}
			if (!vipid || vipmobile == '') {
				var fun = function () {
					window.location.href = loginback;
				}
				App_gmuMsg('您还未登录，2秒后自动跳转登陆界面！', fun);
				return false;
			}
			var sku = $(finalsku).data('sku');
			var skuattr = $(finalsku).data('skuattr');
			var price = $(goodsprice).html();
			var num = $(goodstotal).val();
			//				alert(vipid);
			var vipidd = {
				'vipid': vipid
			};
			$.ajax({
				type: "post",
				url: "<?php echo U('App/yanzheng/yzphone');?>",
				dataType: 'json',
				data: vipidd,
				success: function (info) {
					if (info.res == 3) {
						App_gmuMsg(info.msg);
						return false;
					} else if (info.res == 0) {
						//					$('#kefudianhua').show();
						window.location.href = "<?php echo U('App/Vip/login');?>";
					} else if (info.res == 1) {

						var dt = {
							'sid': 0,
							'goodsid': goodsid,
							'vipid': vipid,
							'sku': sku,
							'num': num
						};
						//保证订单生成页的返回
						var orderurl = "<?php echo U('App/Shop/orderMake',array('sid'=>0,'lasturl'=>$lasturl));?>";
						var fun = function () {
							window.location.href = orderurl;
						}
						$.ajax({
							type: "post",
							url: "<?php echo U('App/Shop/fastbuy');?>",
							dataType: 'json',
							data: dt,
							success: function (info) {
								if (info['status'] == 1) {
									App_gmuMsg2(info['msg'], fun);
								}else if(info['status'] ==5){
									window.location.href = '/app/vip/login';
								} else {
									App_gmuMsg('发生未知错误,请重新尝试！');
								}
								return false;
							},
							error: function (xh, obj) {
								App_gmuMsg('通讯失败，请重试123！');
							}
						});


					}
				},
			});
			return false;
		});
		//验证码60秒
		var countdown = 60;

		function settime() {
			if (countdown == 0) {
				$(".send_pwd").attr("href", 'javascript:getSms()');
				$(".send_pwd").text("获取验证码");
				countdown = 60;
				return;
			} else {
				$(".send_pwd").attr("href", 'javascript:void(0)');
				$(".send_pwd").text("重新发送(" + countdown + ")");
				countdown--;
			}
			setTimeout(function () {
				settime()
			}, 1000)
		}

		//获得手机动态验证码
		function getSms() {
			var phone = $("[name='mobile']").val();
			if (phone == '') {
				alert('请输入手机号！');
				return;
			} else {
				var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
				if (!myreg.test(phone)) {
					alert('手机号非法！');
					return;
				}
			}
			$.post(
				"<?php echo U('App/Yanzheng/getSms');?>", {
					"phone": phone,
					"gettype": 7
				},
				function (data) {
					settime();
				},
				'json'
			);
		}

		function loginByCode() {
			var phone = $("[name='mobile']").val();
			var code = $("[name='sms']").val();
			if (phone == '') {
				alert('请输入手机号！');
				return;
			} else {
				var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
				if (!myreg.test(phone)) {
					alert('手机号非法！');
					return;
				}
			}
			//验证手机是否可以绑定
			$.post(
				"<?php echo U('App/Yanzheng/validatePhone');?>", {
					"phone": phone

				},
				function (data) {
					if (data.res == 1) {
						//验证验证信息是否过期
						$.post(
							"<?php echo U('App/Yanzheng/valmobile');?>", {
								"phone": phone,
								"code": code
							},
							function (data1) {
								if (data1.res == 1) {
									$.post(
										"<?php echo U('App/Yanzheng/bangding');?>", {
											"phone": phone,
											"vipid": vipid
										},
										function (data2) {
											if (data2.res == 1) {
												App_gmuMsg(data2.msg);
												window.location.reload();
											} else {
												App_gmuMsg(data2.msg);
												return false;
												//window.location.reload();
											}
										},
										'json'
									);
								} else {
									App_gmuMsg(data1.msg);
									return false;
									//window.location.reload();
								}
							},
							'json'
						);
					} else {
						App_gmuMsg(data.msg);
						return false;
						//window.location.reload();
					}
				},
				'json'
			);
		}
	</script>

	<!--通用分享-->
	<!--新版分享特效-->
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
		var share_url =
			"http://<?php echo ($_SERVER['HTTP_HOST']); ?>/App/Shop/goods/ppid/<?php echo ($_SESSION['WAP']['vipid']); ?>/id/<?php echo ($cache["id"]); ?>";
		var share_title = "<?php echo ($cache["name"]); ?>";
		var share_content = "<?php echo ($cache["summary"]); ?>";
		//	var share_img="<?php echo ($_SESSION['WAP']['shopset']['url']); echo ($apppic["imgurl"]); ?>";
		var share_img = "http://<?php echo ($_SERVER['HTTP_HOST']); ?><?php echo ($apppic["imgurl"]); ?>";

		wx.config({
			debug: false,
			appId: "<?php echo ($jsapi['appId']); ?>",
			timestamp: "<?php echo ($jsapi['timestamp']); ?>",
			nonceStr: "<?php echo ($jsapi['nonceStr']); ?>",
			signature: "<?php echo ($jsapi['signature']); ?>",
			jsApiList: [
				'checkJsApi',
				'onMenuShareTimeline',
				'onMenuShareAppMessage',
				'onMenuShareQQ',
				'onMenuShareWeibo',
				'hideMenuItems',
				'showMenuItems',
				'hideAllNonBaseMenuItem',
				'showAllNonBaseMenuItem',
				//      'translateVoice',
				//      'startRecord',
				//      'stopRecord',
				//      'onRecordEnd',
				//      'playVoice',
				//      'pauseVoice',
				//      'stopVoice',
				//      'uploadVoice',
				//      'downloadVoice',
				//      'chooseImage',
				//      'previewImage',
				//      'uploadImage',
				//      'downloadImage',
				//      'getNetworkType',
				//      'openLocation',
				//      'getLocation',
				//      'hideOptionMenu',
				//      'showOptionMenu',
				//      'closeWindow',
				//      'scanQRCode',
				//      'chooseWXPay',
				//      'openProductSpecificView',
				//      'addCard',
				//      'chooseCard',
				//      'openCard'
			]
		});

		wx.ready(function () {
			//开启菜单
			wx.showOptionMenu();
			//隐藏菜单
			//wx.hideOptionMenu();
			//分享给朋友
			wx.onMenuShareAppMessage({
				title: share_title,
				desc: share_content,
				link: share_url,
				imgUrl: share_img,
				trigger: function (res) {
					//alert('用户点击发送给朋友');
				},
				success: function (res) {
					//alert('已分享');
				},
				cancel: function (res) {
					//alert('已取消');
				},
				fail: function (res) {
					//alert(JSON.stringify(res));
				}
			});
			//分享到朋友圈
			wx.onMenuShareTimeline({
				title: share_title,
				link: share_url,
				imgUrl: share_img,
				trigger: function (res) {
					//alert('用户点击分享到朋友圈');
				},
				success: function (res) {
					//alert('已分享');
				},
				cancel: function (res) {
					//alert('已取消');
				},
				fail: function (res) {
					//alert(JSON.stringify(res));
				}
			});
			//分享到QQ
			wx.onMenuShareQQ({
				title: share_title,
				desc: share_content,
				link: share_url,
				imgUrl: share_img,
				trigger: function (res) {
					//alert('用户点击分享到QQ');
				},
				complete: function (res) {
					//alert(JSON.stringify(res));
				},
				success: function (res) {
					//alert('已分享');
				},
				cancel: function (res) {
					//alert('已取消');
				},
				fail: function (res) {
					//alert(JSON.stringify(res));
				}
			});
		});
	</script>
</body>

</html>