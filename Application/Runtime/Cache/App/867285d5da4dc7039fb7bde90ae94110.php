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
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" href="/Public/App/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="/Public/App/css/style2.css">
    <link rel="stylesheet" href="/Public/App/css/layout.css">
    <link rel="stylesheet" href="/Public/App/css/style.css" >
</head>
<script type="text/javascript" src="/Public/App/js/zepto.min.js"></script>
<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
<script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
<body>
<div class="page page-user-follow">
    <!-- 标题栏 -->
    <header class="bar bar-header">
        <a href="user.html" class="iconfont icon-back bar-btn pull-left"></a>
        <h1 class="title">我的收藏</h1>
        <a href="index.html" class="iconfont icon-home-head bar-btn pull-right"></a>
    </header>

    <!-- content -->
    <section class="content">
        <div class="list-block media-list mt-0">
            <ul>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="item-content">
                        <div class="item-media">
                            <a href="/App/Shop/goods/sid/0/id/<?php echo ($vo["good_id"]); ?>/ppid/<?php echo ($vo["uid"]); ?>"><img src="<?php echo ($vo["imgurl"]); ?>" alt=""></a> <!--两个a标签都要加链接-->
                        </div>
                        <div class="item-title">
                            <a href="/App/Shop/goods/sid/0/id/<?php echo ($vo["good_id"]); ?>/ppid/<?php echo ($vo["uid"]); ?>">
                                <h4 class="t-e"><?php echo ($vo["title"]); ?></h4>
                                <p class="t-e-2 color-light font-12 mt-4"><?php echo ($vo["des"]); ?></p>
                            </a> <!--两个a标签都要加链接-->
                            <p class="color-light font-12 mt-12">
                                <span>2018-05-12</span>
                                <button class="pull-right" onclick="quxiao(<?php echo ($vo["id"]); ?>)"><i class="iconfont icon-delete mr-4"></i>取消</button>
                            </p>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
        </div>
    </section>
</div>

<script type="text/javascript">
    function quxiao(id){
        var id = id;
        var fun=function(){
            window.location.reload();
        }
        $.ajax({
            type:"post",
            url:"<?php echo U('App/Vip/quxiao');?>",
            dataType:'json',
            data:{
                id:id,
            },
            success: function(data){
                //console.log(data);
                if(data.state_code==1){
                    zbb_msg(data.msg,fun);

                }else{
                    zbb_msg(data.msg);
                }
            },
            error:function(xh,obj){
                App_gmuMsg('通讯失败，请重试！');
            }
        });
    }
</script>
</body>

</html>