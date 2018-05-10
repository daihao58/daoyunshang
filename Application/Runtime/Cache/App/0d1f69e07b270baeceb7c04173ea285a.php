<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=100%, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title id="oti"></title>
    <link rel="stylesheet" href="/Public/App/shoplist/css/style.css?v=7">
    <link rel="stylesheet" href="/Public/App/shoplist/css/shop.css?v=2">
    <link rel="stylesheet" href="/Public/App/shoplist/icon/iconfont.css?v=2">
    <link rel="stylesheet" href="/Public/App/shoplist/js/skin/layer.css">
    <script src="/Public/App/shoplist/js/jquery.min.js" type="text/javascript"></script>
    <script src="/Public/App/shoplist/js/jquery.cookie.js" type="text/javascript"></script>
    
    <script src="/Public/App/shoplist/js/layer.js" type="text/javascript"></script>
</head>

<body>
    <div id="main">
        <div class="header-bar select-shopbar" style="position:fixed;">
            <div class="header-title" style="display:inline-block;width:100%;">选择店铺</div>
            <span id="pi_back" style="display:none" onclick="history.go(-1)"></span>
        </div>
        <div class="pi_sousuo1" style="">
            
            <input type="search" class="pi_input" name="name" placeholder="请输入店铺名称" style="">
            <span class="pi_sousuo" style="" onclick="searchShop()"></span>
              
            <!--<span class="pi_sousuo2" style="" onclick="searchShop()">搜索</span>-->
            <!--<a class="grst-block" href="<?php echo U('App/Shop/index',array('shopid'=>$vo['id']));?>">-->
            <!--onClick="alert(this.innerHTML)"-->
        </div>
        <div style="padding:5px 14px;background-color: #f5f5f5;">
            <i class="iconfont" style="color:A9A9A9;">&#xe600;</i>
            <span id="pi_address" style=""></span> 
        </div>
        <div class="shop-list" id="mod-desc">
       
        </div>
    </div>
    
    <!--<script src="/Public/App/shoplist/js/jweixin-1.0.0.js" type="text/javascript"></script>-->
    <script>
        var baseurl = '';
        var data = {
            'wxConfig': <?php echo ($wxConfig? $wxConfig : '[]'); ?>,
        }

        // 微信定位
        wx.config({
            debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId: data.wxConfig.appId, // 必填，公众号的唯一标识
            timestamp: data.wxConfig.timestamp, // 必填，生成签名的时间戳
            nonceStr: data.wxConfig.nonceStr, // 必填，生成签名的随机串
            signature: data.wxConfig.signature,// 必填，签名，见附录1
            jsApiList: ['getLocation'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });
        //打开多店铺
        wx.ready(function () {
            wx.getLocation({
                type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
                success: function (res) {
                    lat = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                    lng = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                    var speed = res.speed; // 速度，以米/每秒计
                    var accuracy = res.accuracy; // 位置精度

                    locationmy();
                    shopList();            
                }
            });
        })
        
        var lng = '';//用户经度
        var lat = '';//用户纬度
        function locationmy(){
            // lng = 113.650035;//用户经度
            // lat = 34.7854;//用户纬度
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'http://restapi.amap.com/v3/geocode/regeo?output=json&location='+lng+','+lat+'&key=22f9022b217b7d764f5befb4aa74456f&radius=1000&extensions=all&callback=renderOption';
            document.head.appendChild(script);
        }
        function renderOption(response) {
            document.getElementById('pi_address').innerHTML = response.regeocode.formatted_address;
        }       


        $(".pi_input").keydown(function(){
            searchShop();
        });
//打开店铺
        function openTHisShop(id) {
            location.href = baseurl +"/App/Shop/index/shopid/"+id;
        }

        function shopList(){
            $.ajax({
                type: "post",
                url: "<?php echo U('App/Index/getShopList');?>",
                data: {
                    lng: lng,
                    lat: lat,
                },
                success: function (res) { 
                    var html = '';
                    $.each(res, function (index, value) {

                        html += '<a class="grst-block" onclick="openTHisShop('+value.id+')"><img class="grst-logo" style="opacity: 1; transition: opacity 0.5s;" alt="' + value.name +'" src="/Upload/' + value.savepath + value.savename + '"><div class="grst-detail"><div class="grst-name"><span class="ng-binding">'+value.name+'</span><span class="grst-misc ng-binding">&nbsp;&nbsp;'+value.km+'km</span></div><span class="grst-misc ng-binding">'+value.summary+'</span><div class="grst-misc"><span class="ng-binding">'+value.address+'</span></div><div class="grst-activity "><p class="grst-activity-detail "><span class="rst-badge ng-binding" style="background: rgb(240, 115, 115);">减</span> <span class="ng-binding">满减优惠</span><span class="activity-offline"> (满'+value.yftop+'减'+value.yf+')</span></p><p class="grst-activity-detail "><span class="rst-badge ng-binding" style="background: rgb(255, 78, 0);">付</span> <span class="ng-binding">在线支付</span></p></div></div></a>';
                    });

                    $('#mod-desc').html(html);
                },
                beforeSend: function () {
                    layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                },
                complete: function () {
                    layer.closeAll('loading');
                }

            });
        }

        //店铺搜索  
        function searchShop() {
            var name = $("input[name^='name']").val();;

            $.ajax({
                type: "post",
                url: "<?php echo U('App/Index/getShopList');?>",
                data: {
                    lng: lng,
                    lat: lat,
                    name: name,
                },
                success: function(res) {
                    var html = '';
                    $.each(res, function(index, value) {
                        // html += '<a class="grst-block" href=<?php echo U(App/Shop/index,array(shopid=>'value.id'));?> ><img class="grst-logo" style="opacity: 1; transition: opacity 0.5s;" alt="' + value.name + '" src="/Upload/' + value.savepath + value.savename + '"><div class="grst-detail"><div class="grst-name"><span class="ng-binding">' + value.name + '</span></div><span class="grst-misc ng-binding">' + value.summary + '</span><div class="grst-misc"><span class="ng-binding">' + value.address + '</span></div><div class="grst-activity "><p class="grst-activity-detail "><span class="rst-badge ng-binding" style="background: rgb(240, 115, 115);">减</span> <span class="ng-binding">满减优惠</span><span class="activity-offline"> (满' + value.yftop + '减' + value.yf + ')</span></p><p class="grst-activity-detail "><span class="rst-badge ng-binding" style="background: rgb(255, 78, 0);">付</span> <span class="ng-binding">在线支付</span></p></div></div></a>';
                        html += '<a class="grst-block" onclick="openTHisShop('+value.id+')"><img class="grst-logo" style="opacity: 1; transition: opacity 0.5s;" alt="' + value.name +'" src="/Upload/' + value.savepath + value.savename + '"><div class="grst-detail"><div class="grst-name"><span class="ng-binding">'+value.name+'</span><span class="grst-misc ng-binding">&nbsp;&nbsp;'+value.km+'km</span></div><span class="grst-misc ng-binding">'+value.summary+'</span><div class="grst-misc"><span class="ng-binding">'+value.address+'</span></div><div class="grst-activity "><p class="grst-activity-detail "><span class="rst-badge ng-binding" style="background: rgb(240, 115, 115);">减</span> <span class="ng-binding">满减优惠</span><span class="activity-offline"> (满'+value.yftop+'减'+value.yf+')</span></p><p class="grst-activity-detail "><span class="rst-badge ng-binding" style="background: rgb(255, 78, 0);">付</span> <span class="ng-binding">在线支付</span></p></div></div></a>';
                    });
                    $('#mod-desc').html(html);
                    return(false); 
                },
                beforeSend: function() {
                    layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                },
                complete: function() {
                    layer.closeAll('loading');
                }
            });               
    }
    </script>
</body>

</html>