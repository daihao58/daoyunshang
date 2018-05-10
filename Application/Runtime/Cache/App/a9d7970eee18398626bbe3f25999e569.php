<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <title>购物车</title>
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
		<link rel="stylesheet" href="/Public/App/css/style2.css" />
	    <!--组件依赖js begin-->
	    <script src="/Public/App/js/zepto.min.js"></script>
	    <!--组件依赖js end-->		
		<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
        <script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
	<style>
		.dtl-shp{position: relative;}
		.dtl-shp b{position: absolute; padding: 4px; font-size: 0.5em; line-height: 0.5em; background: #FF0000; color: #FFFFFF; right: 0px; border-radius: 30px;}
		/*2017-6-13修改弹框样式*/
		.telnone {
			display:none;
			position:fixed;
			width:100%;
			height:100%;
			bottom:0;
			z-index:1000;
			background-color:rgba(0,0,0,0.3);
			padding: 0 5%;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;	
		}
		
		#kefudianhua div.order-foot {
			background-color:white;
			text-align:left;
			padding: 18px 14px;
			margin-top:25%;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;	
			
		}
		
		#kefudianhua div.order-foot > p {
			margin: 12px 0 !important;
			-webkit-margin-before: 1em;
			-webkit-margin-after: 1em;
			-webkit-margin-start: 0px;
			-webkit-margin-end: 0px;
		}
		
		#kefudianhua div.order-foot .state {
			font-size: 14px;
		}
		
		#kefudianhua div.order-foot div.bddh{
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
		
        .form-control{
			font-size: 14px;
			width: 100%;
			height:40px;
			padding: 16px 8px;
			border:1px solid #d9d9d9;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-appearance: none;			 
			appearance: none;
		}
		
		.left{			
			width:60%;			
			border-bottom-right-radius: 0;
			border-top-right-radius: 0;
		}
		
		.send_pwd{
			float: right;
			width:40%;
			font-size: 14px;
			height:40px;
			line-height: 40px;
			display:block;
			background-color:#aaa;
			color:white;
			line-height:40px;
			text-align:center;
			border-bottom-right-radius: 4px;
			border-top-right-radius: 4px;
		}
		
		.btn-red{
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
		
		.btn-quxiao{
			background: #aaa;
		}
		
		.fr {
			float: right
		}

	</style>

</head>
<body class="back2 color6">
		<div class="bsk-hd ovflw">
			<span class="bsk-hj"><i class="bak-sum">共 <b id="totalnum"><?php echo ($totalnum); ?></b> 件商品</i>合计：<em class="fonts18 color3">￥<i id="totalprice1"><?php echo ($totalprice); ?></i></em></span>
			<span class="fr ads-btn fonts9 back3" style="display: block;text-align: center;border-radius: 3px;line-height: 18px" id="clearbasket"><i class="iconfont">&#xe6b4</i>清空</span>
		</div>
		<div class="bsk-cc">
			<div class="border-t1">
			<ul class="ovflw" id="allgoods">
				<?php if(is_array($cache)): foreach($cache as $key=>$vo): ?><li class="ovflw border-b1">
						<div class="fl bsk-del goodsdel" data-id="<?php echo ($vo["id"]); ?>"><i class="iconfont fl">&#xe658</i></div>
						<div class="fl ovflw bsk-rgt">
							<div class="bsk-img fl"><img src="<?php echo ($vo["pic"]); ?>"/></div>
							<h3 class="bsk-tt font-visib"><?php echo ($vo["name"]); ?></h3>
							<p class="bsk-sx"><?php echo ($vo["skuattr"]); ?></p>
							<p class="bsk-prc color3">￥<?php echo ($vo["price"]); ?></p>	
							<p class="bsk-sx" style="visibility: hidden;">[库存：<?php echo ($vo["total"]); ?>]</p>	
							<div class="bsk-ipt ovflw"><p class="bsk-item" data-id="<?php echo ($vo["id"]); ?>" data-goodsid='<?php echo ($vo["goodsid"]); ?>' data-sku='<?php echo ($vo["sku"]); ?>' data-num='<?php echo ($vo["num"]); ?>' data-total='<?php echo ($vo["total"]); ?>' data-price='<?php echo ($vo["price"]); ?>' style="display: none;"></p><span class="fl text-c bsk-dec">-</span><input type="text" value="<?php echo ($vo["num"]); ?>" class="text-c fl bsk-total" disabled="disabled"/><span class="fl text-c bsk-add">+</span></div>
						</div>
					</li><?php endforeach; endif; ?>				
			</ul>
			</div>
		</div>
		<div class="insert1"></div>
		<div class="dtl-ft ovflw">
				<div class=" fl dtl-icon dtl-bck ovflw">
					<a href="javascript:history.go(-1)">
						<i class="iconfont">&#xe679</i>
					</a>
				</div>
				<a href="#" class="fr ads-btn fonts9 back3" id="makeorder">确认</a>
				<span class="fr ads-sum"><em class="fonts9">合计：</em><em class="fonts1">￥<i id="totalprice2"><?php echo ($totalprice); ?></i></em></span>
		</div>
		<div  id="kefudianhua"  class="telnone"  style="position:fixed;width:100%;height:100%;bottom:0;z-index:1000;background-color:rgba(0,0,0,0.3);padding: 0 5%">			
			<div class="order-foot">
				<div class="close-btn" id="guanbid"></div>
				<p class="state">为了确保能更好的为您提供服务,<span style="color: #23cc77;">请绑定您的手机</span></p>				
				<p><input type="text" class="form-control" name="mobile" placeholder="输入您的手机号" data-bv-notempty="true" data-bv-notempty-message="不能为空"></p>
				<p><input type="text" class="form-control left" name="sms" placeholder="输入验证码" data-bv-notempty="true" data-bv-notempty-message="不能为空"><a href="javascript:getSms()" class="send_pwd">获取动态密码</a></p>
				<p><button id="telquxiao" class="btn-red btn-quxiao">取消</button><button class="btn-red fr" onclick="loginByCode()">确认绑定</button></p>
			</div>
		</div>
		<!--全局封装-->
		<script type="text/javascript">
            var vipid="<?php echo ($_SESSION["WAP"]["vipid"]); ?>";
		</script>
		<!--封装购物车-->
		<script type="text/javascript">
            $('#telquxiao').click(function(){
                $('#kefudianhua').hide();
            });
            $('#guanbid').click(function(){
                $('#kefudianhua').hide();
            });
			var totalprice1=$('#totalprice1');
			var totalprice2=$('#totalprice2');
			var totalnum=$('#totalnum');
			var allgoods=$('#allgoods');
			var goodsdec=$('.bsk-dec');
			var goodsadd=$('.bsk-add');
			var goodsdel=$('.goodsdel');
			var basketurl="<?php echo ($basketurl); ?>";
			var basketloginurl="<?php echo ($basketloginurl); ?>";
			var basketlasturl="<?php echo ($basketlasturl); ?>";
			var lasturlencode="<?php echo ($lasturlencode); ?>";
			$(goodsadd).on('click',function(){
				var num=Number($(this).parent().find('.bsk-total').val());
				var left=Number($(this).parent().find('.bsk-item').data('total'));
				var total=(num+1)<=left?(num+1):left;
				var item=$(this).parent().find('.bsk-item');
				$(this).parent().find('.bsk-total').val(total);
				$(item).data('num',total);
				var pc=Number($(totalprice1).html())+Number($(item).data('price'));
				$(totalprice1).html(pc);
				$(totalprice2).html(pc);
				$(totalnum).html(Number($(totalnum).html())+1);
				return false;
			});
			$(goodsdec).on('click',function(){
				var num=Number($(this).parent().find('.bsk-total').val());
				var total=(num-1)>=1?(num-1):1;
				var item=$(this).parent().find('.bsk-item');
				$(this).parent().find('.bsk-total').val(total);
				$(item).data('num',total);
				if((num-1)>=1){
					var pc=Number($(totalprice1).html())-Number($(item).data('price'));
					$(totalprice1).html(pc);
					$(totalprice2).html(pc);
					var nm=Number($(totalnum).html())-1;
					$(totalnum).html(nm);
				}				
				return false;
			});
			//购物车删除
			$('.goodsdel').on('click',function(){
				var tourl="<?php echo U('App/Shop/delbasket',array('sid'=>0));?>";
				var dt=$(this).data('id');
				var tt=$(this);
				$.ajax({
					type:"post",
					url:tourl,
					dataType:'json',
					data:{'id':dt},
					success:function(info){
						window.location.href=basketurl;
						App_gmuMsg(info['msg']);
						return false;
					},
					error:function(xh,o){
						App_gmuMsg('通讯失败！请重试！');
						return false;
					}
				});
				
			});
			//购物车清空
			$('#clearbasket').on('click',function(){
				var items=$('.bsk-item');
				if(!$(items).length){
					App_gmuMsg('您的购物车是空的，请先挑选商品!');
					return false;
				}
				var tourl="<?php echo U('App/Shop/clearbasket',array('sid'=>0));?>";
				$.ajax({
					type:"post",
					url:tourl,
					dataType:'json',
					data:'nodata',
					success:function(info){
						if(info['status']==3){
							var fun=function(){
								window.location.href=basketloginurl;
							}
							App_gmuMsg(info['msg'],fun);
							return false;
						}else if(info['status']==2){
							$(totalprice1).html(0);
							$(totalprice2).html(0);
							$(totalnum).html(0);
							$(allgoods).remove();
							App_gmuMsg(info['msg']);
							return false;
						}else{
							App_gmuMsg(info['msg']);
							return false;
						}
					},
					error:function(xh,o){
						App_gmuMsg('通讯失败！请重试！');
						return false;
					}
				});
				
			});
			//生成订单
			$('#makeorder').on('click',function(){
				var items=$('.bsk-item');
				//var dt=new Array();
				//var dt='';
				var dt=new Object();
				var tourl="<?php echo U('App/Shop/checkbasket',array('sid'=>0));?>";
				//保证订单生成页的返回
				var orderurl="<?php echo U('App/Shop/orderMake',array('sid'=>0,'lasturl'=>$lasturlencode));?>";
				if(!$(items).length){
					App_gmuMsg('您的购物车是空的，请先挑选商品!');
					return false;
				}
                if(!vipid){
                    var fun=function(){
                        window.location.href=loginback;
                    }
                    App_gmuMsg('您还未登录，2秒后自动跳转登陆界面！',fun);
                    return false;
                }
                var vipidd={'vipid':vipid};
                $.ajax({
                    type:"post",
                    url:"<?php echo U('App/yanzheng/yzphone');?>",
                    dataType:'json',
                    data:vipidd,
                    success:function(info){
                        if(info.res==3){
                            App_gmuMsg(info.msg);
                            return false;
                        }else if(info.res==0){
                            $('#kefudianhua').show();
                        }else if(info.res==1){
                            $(items).each(function(){
                                var id=$(this).data('id');
                                var num=$(this).data('num');
                                dt[id]=num;
                            });
                            $.ajax({
                                type:"post",
                                url:tourl,
                                dataType:'json',
                                data:dt,
                                success:function(info){
                                    if(info['status']==3){
                                        var fun=function(){
                                            window.location.href=basketloginurl;
                                        }
                                        App_gmuMsg(info['msg'],fun);
                                        return false;
                                    }else if(info['status']==2){
                                        var fun=function(){
                                            window.location.href=basketurl;
                                        }
                                        App_gmuMsg(info['msg'],fun);
                                        return false;
                                    }else if(info['status']==1){
                                        var fun=function(){
                                            window.location.href=orderurl;
                                        }
                                        App_gmuMsg(info['msg'],fun);
                                        return false;
                                    }else{
                                        App_gmuMsg(info['msg']);
                                        return false;
                                    }
                                }
                            });
						}
					},
                });
                return false;
			});

            //验证码60秒
            var countdown=60;
            function settime() {
                if (countdown == 0) {
                    $(".send_pwd").attr("href",'javascript:getSms()');
                    $(".send_pwd").text("获取验证码");
                    countdown = 60;
                    return ;
                } else {
                    $(".send_pwd").attr("href", 'javascript:void(0)');
                    $(".send_pwd").text("重新发送(" + countdown + ")");
                    countdown--;
                }
                setTimeout(function() {
                    settime()
                },1000)
            }

            //获得手机动态验证码
            function getSms(){
                var phone = $("[name='mobile']").val();
                if(phone==''){
                    alert('请输入手机号！');
                    return ;
                }else{
                    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
                    if(!myreg.test(phone)) {
                        alert('手机号非法！');
                        return ;
                    }
                }
                $.post(
                    "<?php echo U('App/Yanzheng/getSms');?>",
                    {
                        "phone": phone,
                        "gettype":7
                    },
                    function(data){

                        settime();
                    },
                    'json'
                );
            }
            function loginByCode(){
                var phone = $("[name='mobile']").val();
                var code= $("[name='sms']").val();
                if(phone==''){
                    alert('请输入手机号！');
                    return ;
                }else{
                    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
                    if(!myreg.test(phone)) {
                        alert('手机号非法！');
                        return ;
                    }
                }
                //验证手机是否可以绑定
                $.post(
                    "<?php echo U('App/Yanzheng/validatePhone');?>",
                    {
                        "phone": phone
                    },
                    function(data){

                        if(data.res==1){
                            //验证验证信息是否过期
                            $.post(
                                "<?php echo U('App/Yanzheng/valmobile');?>",
                                {
                                    "phone": phone,
                                    "code":code
                                },
                                function(data1){
                                    if(data1.res==1){
                                        $.post(
                                            "<?php echo U('App/Yanzheng/bangding');?>",
                                            {
                                                "phone": phone,
                                                "vipid":vipid
                                            },
                                            function(data2){
                                                if(data2.res==1){
                                                    App_gmuMsg(data2.msg);
                                                    window.location.reload();
                                                }else{
                                                    App_gmuMsg(data2.msg);
                                                    return false;
                                                    //window.location.reload();
                                                }

                                            },
                                            'json'
                                        );
                                    }else{
                                        App_gmuMsg(data1.msg);
                                        return false;
                                        //window.location.reload();
                                    }
                                },
                                'json'
                            );
                        }else{
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