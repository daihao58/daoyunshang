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
    <!-- <link rel="icon" href="favicon.ico" /> -->
    <link rel="stylesheet" href="/Public/App/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="/Public/App/css/style2.css">
    <link rel="stylesheet" href="/Public/App/css/layout.css">
    <link rel="stylesheet" href="/Public/App/css/style.css" >
</head>
<script type="text/javascript" src="/Public/App/js/zepto.min.js"></script>
<script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
<script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
<body>
<div class="page page-bill">
    <!-- 标题栏 -->
    <header class="bar bar-header">
        <a href="/App/Vip/index" class="iconfont icon-back bar-btn pull-left"></a>
        <h1 class="title">代理挂靠</h1>
        <a href="/App/Shop/index" class="iconfont icon-home-head bar-btn pull-right"></a>
    </header>

    <!-- content -->
    <section class="content">

        <ul class="list-block mt-0 borTop-0">
            <li class="item-content">
                <div class="item-title label">姓名</div>
                <input type="text" value="" name="aname" placeholder="请填写姓名" class="item-input t-r">
            </li>
            <li class="item-content">
                <div class="item-title label">手机号</div>
                <input type="text" value="" name="amobile" placeholder="请填写手机" class="item-input t-r">
            </li>
            <li class="item-content">
                <div class="item-title label">附件</div>
                <form id="uploadform" enctype="multipart/form-data" method="post" >
                <input type="file" value="" id="file" name="file" class="item-input t-r">
                </form>
            </li>
            <input type="hidden" id="savename" value="">
            <input type="hidden" id="savepath" value="">
   <!--         <li>
                <textarea placeholder="请填写详细信息" rows="4"></textarea>
            </li>-->
        </ul>

        <!-- 提交 -->
        <div class="plr-14 ptb-30"><button class="button button-big sub">提交</button></div>
    </section>
</div>

<script>
    $('input[type="file"]').on('change',doupload);
    function doupload(){
        var file = this.files[0];
        var formData= new FormData($("#uploadform")[0]);
        $.ajax({
            url:"<?php echo U('App/Vip/agency_img_ajax');?>",
            type:'post',
            data:formData,
            dataType: "json",
            async: false,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                $('#savename').val(data['file']['savename']);
                $('#savepath').val(data['file']['savepath']);
              // console.log(data);
            },
            /*   error:function (e) {
             layer.msg('服务器出错啦,请稍后再试');
             }*/
        })
    }

    $(".sub").click(function(){
        var aname = $("[name='aname']").val();
        var amobile = $("[name='amobile']").val();
        var savename = $('#savename').val();
        var savepath = $('#savepath').val();
        //alert(savepath);die;
        if(aname==''){
            zbb_msg('请输入姓名');
        }else if(amobile==''){
            zbb_msg('请输入手机号');
        }else{
            var fun=function(){
                window.location.reload();
            }
            $.ajax({
                url:"<?php echo U('App/Vip/agency_ajax');?>",
                data:{
                    aname:aname,
                    amobile:amobile,
                    savename:savename,
                    savepath:savepath,
                },
                type:'post',
                dataType: "json",
                success: function(data){
                    if(data.state_code==1){
                        zbb_msg(data.msg,fun);
                    }else{
                        zbb_msg(data.msg);
                    }
                },
                /*   error:function (e) {
                 layer.msg('服务器出错啦,请稍后再试');
                 }*/
            })
        };
    });
</script>

</body>
</html>