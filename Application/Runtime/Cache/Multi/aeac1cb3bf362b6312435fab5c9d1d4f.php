<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->

<head>
    <meta charset="utf-8" />
    <title>WeMall分销管理</title>
    <meta name="description" content="blank page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/Public/Admin/img/favicon.png" type="image/x-icon">
    <!--Basic Styles-->
    <link href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/Public/Admin/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/Public/Admin/css/weather-icons.min.css" rel="stylesheet" />
    <!--Beyond styles-->
    <link id="beyond-link" href="/Public/Admin/css/beyond.min.css" rel="stylesheet" />
    <link href="/Public/Admin/css/demo.min.css" rel="stylesheet" />
    <link href="/Public/Admin/css/typicons.min.css" rel="stylesheet" />
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet" />
    <link href="/Public/Admin/css/appcms.css" rel="stylesheet" />
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <!--<script src="/Public/Admin/js/skins.min.js"></script>-->
    <style>
    .upimgwell {
        margin-bottom: 0px;
    }
    
    .clear {
        clear: both;
    }
    
    .FL {
        float: left;
    }
    
    .FR {
        float: right;
    }
    </style>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
    <div class="loading-container" id="App-loading-wrap">
        <div id="loading" style="top: 150px; display: block;"><div class="lbk"></div><div class="lcont"><img src="/Public/Admin/img/loading.gif" alt="loading...">正在加载...</div></div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left" style="text-align:center;margin-left: 10px; padding-top: 10px;">
                    <a href="javascript:void(0)" class="navbar-brand">
                        <small>
                        <!--<?php echo ($_SESSION["CMS"]["set"]["name"]); ?>-->
                        WeMall多用户分销管理
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
               <!--  <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div> -->
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings -->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">

                                    <section>
                                        <h2><span class="profile"><span><?php echo ($_SESSION["SYS"]["set"]["wxname"]); ?></span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a><?php echo ($_SESSION["SYS"]["set"]["wxname"]); ?></a></li>
                                    <!--/Theme Selector Area-->
                                    <li class="dropdown-footer">
                                        <a href="<?php echo U('Multi/Public/logout');?>">
                                            注销登录
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                            <!-- Settings -->
                        </ul>
                        <!-- Settings -->
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">

            <!-- Page Content -->
            <div class="page-content"style="margin-left: 0px;">
 
                <!-- Page Body -->
                <div id="App-loader" class="page-body">

<div class="row">
    <div class="col-xs-12 col-xs-12">
        <div class="widget radius-bordered">
            <div class="widget-header bg-blue">
                <i class="widget-icon fa fa-arrow-down"></i>
                <span class="widget-caption">店铺配置</span>
            </div>
            <div class="widget-body">
                <form id="AppForm" action="" method="post" class="form-horizontal" data-bv-message="" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">商城名称[分享]<sup>*</sup></label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="name" placeholder="必填" data-bv-notempty="true" data-bv-notempty-message="不能为空" value="<?php echo ($cache["name"]); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">商城图片[分享]</label>
                        <div class="col-lg-4">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" name="pic" value="<?php echo ($cache["pic"]); ?>" id="App-pic">
                                <span class="input-group-btn">
                                <button class="btn btn-default shiny" type="button" onclick="appImgviewer('App-pic')"><i class="fa fa-camera-retro"></i>预览</button><button class="btn btn-default shiny" type="button" onclick="appImguploader('App-pic',false)"><i class="glyphicon glyphicon-picture"></i>上传</button>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">商城简介[分享]</label>
                        <div class="col-lg-4">
                            <textarea class="form-control" name="summary" rows="5"><?php echo ($cache["summary"]); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">商城域名<sup>*</sup></label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="url" placeholder="请填写商城域名" data-bv-notempty="true" data-bv-notempty-message="不能为空" value="<?php echo ($cache["url"]); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">退货时间<sup>*</sup></label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="thtime" placeholder="必填,发货后几天内可以退货" data-bv-notempty="true" data-bv-notempty-message="不能为空" value="<?php echo ($cache["thtime"]); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">别名<sup>*</sup></label>
                        <div class="col-lg-2">
                            <div class="input-group input-group-xs">
                                <span class="input-group-btn">
                                    <button class="btn btn-darkorange" type="button">分销商：</button>
                                </span>
                                <input name="fxname" type="text" class="form-control" value="<?php echo ($cache["fxname"]); ?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group input-group-xs">
                                <span class="input-group-btn">
                                     <button class="btn btn-darkorange" type="button">佣金：</button>
                                 </span>
                                <input name="yjname" type="text" class="form-control" value="<?php echo ($cache["yjname"]); ?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group input-group-xs">
                                <span class="input-group-btn">
                                     <button class="btn btn-darkorange" type="button">团队：</button>
                                 </span>
                                <input name="tdname" type="text" class="form-control" value="<?php echo ($cache["tdname"]); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">分销级别<sup>*</sup></label>
                        <div class="col-lg-2">
                            <div class="input-group input-group-xs">
                                <span class="input-group-btn">
                                    <button class="btn btn-darkorange" type="button">一级：</button>
                                </span>
                                <input name="fx1name" type="text" class="form-control" value="<?php echo ($cache["fx1name"]); ?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group input-group-xs">
                                <span class="input-group-btn">
                                     <button class="btn btn-darkorange" type="button">二级：</button>
                                 </span>
                                <input name="fx2name" type="text" class="form-control" value="<?php echo ($cache["fx2name"]); ?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group input-group-xs">
                                <span class="input-group-btn">
                             <button class="btn btn-darkorange" type="button">三级：</button>
                         </span>
                                <input name="fx3name" type="text" class="form-control" value="<?php echo ($cache["fx3name"]); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">开启退货</label>
                        <div class="col-lg-4">
                            <label>
                                <input type="hidden" name="isth" value="<?php echo ($cache["isth"]); ?>" id="isth">
                                <input class="checkbox-slider slider-icon colored-primary" type="checkbox" id="isthbtn" <?php if(($cache["isth"]) == "1"): ?>checked="checked"<?php endif; ?>>
                                <span class="text darkorange">&nbsp;&nbsp;&larr;重要：开启后用户前端允许退货。</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">开启邮费</label>
                        <div class="col-lg-4">
                            <label>
                                <input type="hidden" name="isyf" value="<?php echo ($cache["isyf"]); ?>" id="isyf">
                                <input class="checkbox-slider slider-icon colored-primary" type="checkbox" id="isyfbtn" <?php if(($cache["isyf"]) == "1"): ?>checked="checked"<?php endif; ?>>
                                <span class="text darkorange">&nbsp;&nbsp;&larr;重要：开启后邮费设置有效。</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-2">
                            <div class="input-group input-group-xs">
                                <span class="input-group-btn">
                           <button class="btn btn-primary" type="button">邮费：</button>
                      </span>
                                <input name="yf" type="text" class="form-control" value="<?php echo ($cache["yf"]); ?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group input-group-xs">
                                <span class="input-group-btn">
                             <button class="btn btn-primary" type="button">包邮价格：</button>
                         </span>
                                <input name="yftop" type="text" class="form-control" value="<?php echo ($cache["yftop"]); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">一键拨号</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="phone" placeholder="选填" value="<?php echo ($cache["phone"]); ?>">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">一键导航</label>
                            <div class="col-lg-4">
                                <div class="input-group input-group-sm">
                                    <input id="App-address" name="address" type="text" class="form-control" value="<?php echo ($cache["address"]); ?>">
                                    <span class="input-group-btn">
                                  <button class="btn btn-default shiny" type="button" onclick="baiduDitu('App-address','App-lng','App-lat')"><i class="glyphicon glyphicon-picture"></i>地图</button>
                              </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label"></label>
                            <div class="col-lg-2">
                                <div class="input-group input-group-xs">
                                    <span class="input-group-btn">
                           <button class="btn btn-palegreen" type="button">坐标：Lng</button>
                      </span>
                                    <input id="App-lng" name="lng" type="text" class="form-control" value="<?php echo ($cache["lng"]); ?>">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="input-group input-group-xs">
                                    <span class="input-group-btn">
                             <button class="btn btn-palegreen" type="button">坐标：Lat</button>
                         </span>
                                    <input id="App-lat" name="lat" type="text" class="form-control" value="<?php echo ($cache["lat"]); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">首页轮播</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="indexalbum" placeholder="填写首页轮播广告ID，例如：1,2" value="<?php echo ($cache["indexalbum"]); ?>">
                                <span class="text darkorange">填写 商城管理中 广告管理 添加的广告ID，例如：1,2</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">首页分类</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="indexgroup" placeholder="填写首页产品分组ID，例如：1,2" value="<?php echo ($cache["indexgroup"]); ?>">
                                <span class="text darkorange">填写 商城管理中 商品分类 添加的分类ID，例如：1,2</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">关于我们</label>
                            <div class="col-lg-4">
                                <input type="hidden">
                                <script type="text/plain" id="J-ueditor" style="width: 600px;height:380px;position:relative">
                                <?php echo (htmlspecialchars_decode($cache["content"])); ?>
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-4">
                                <button class="btn btn-primary btn-lg" type="submit">保存</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-palegreen btn-lg" type="reset">重填</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>


                </div>
                <!--图片库-->
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->
    </div>
    <!--全局隐藏控件-->
    <div class="hide">
        <!--AppReloader-->
        <a id="App-reloader" href="#">JOELRELOADER</a>
        <!--单图片上传控件-->
        <iframe style="display:none" name='doupimg_frame' id="doupimg_frame"></iframe>
        <form enctype="multipart/form-data" action="<?php echo U('Multi/Upload/doupimg');?>" method="post" id="App-form-upimg" target="doupimg_frame">
            <input type="file" id="jupimg" name="jupimg" accept="image/*">
        </form>
    </div>
    <!--基础脚本-->
    <script src="/Public/Admin/js/jquery-2.0.3.min.js"></script>
    <script src="/Public/Admin/js/bootstrap.min.js"></script>
    <script src="/Public/Admin/js/beyond.min.js"></script>
    <script src="/Public/Admin/js/toastr/toastr.js"></script>
    <script src="/Public/Admin/js/validation/bootstrapValidator.js"></script>
    <script src="/Public/Admin/js/bootbox/bootbox.js"></script>

    <!-- layer -->
    <script src="/Public/login/layer/layer.js"></script>
    <!--百度地图类库-->
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=StGl5qQsPbsCVg8tizbLbkOw"></script>
    <!--App全局API-->
    <!-- <script src="/Public/Admin/js/appapi.js"></script> -->

    <script type="text/javascript">
    var RootPath = ""; 

    //App默认图片上传管理器
    function appImguploader(fbid, isall) {
            //fbid 查找带回的文本框ID,全局唯一
            //isall 多图,单图模式
            $.ajax({
                type: "post",
                url: "<?php echo U('Multi/Upload/indeximg');?>",
                data: {
                    'fbid': fbid,
                    'isall': isall
                },
                dataType: "json",
                //beforeSend:$.App.loading(),
                success: function(mb) {
                    //$.App.loading();
                    bootbox.dialog({
                        message: mb,
                        title: "图片上传管理器",
                        className: "modal-darkorange",
                        buttons: {
                            "追加": {
                                className: "btn-success",
                                callback: function() {
                                    if (isall == 'false') {
                                        $('#' + fbid).val($('#App-uploader-findback').val());
                                    } else {
                                        $('#' + fbid).val($('#' + fbid).val() + $('#App-uploader-findback').val());
                                    }
                                }
                            },
                            "替换": {
                                className: "btn-blue",
                                callback: function() {
                                    $('#' + fbid).val($('#App-uploader-findback').val());
                                }
                            },
                            "取消": {
                                className: "btn-danger",
                                callback: function() {}
                            }
                        }
                    });
                },
                error: function(xhr) {
                    $.App.alert('danger', '通讯失败！请重试！');
                }
            });
            return false;
        }
        //App默认图片预览器
    function appImgviewer(fbid) {
            //fbid 查找带回的文本框ID,全局唯一
            //isall 多图,单图模式
            var ids = $('#' + fbid).val();
            if (!ids) {
                $.App.alert('danger', '您还没有图片可以预览！');
                return false;
            }
            $.ajax({
                type: "post",
                url: "<?php echo U('Multi/Index/appImgviewer');?>",
                data: {
                    'ids': ids
                },
                dataType: "json",
                success: function(mb) {
                    bootbox.dialog({
                        message: mb,
                        title: "图片预览器",
                        className: "modal-darkorange",
                        buttons: {
                            success: {
                                label: "确定",
                                className: "btn-blue",
                                callback: function() {}
                            },
                            "取消": {
                                className: "btn-danger",
                                callback: function() {}
                            }
                        }
                    });
                },
                error: function(xhr) {
                    $.App.alert('danger', '通讯失败！请重试！');
                }
            });
            return false;
        }
        //App默认百度地图控件
    function baiduDitu(fbaddid, fblngid, fblatid) {
            var fbadd = $('#' + fbaddid);
            var fblng = $('#' + fblngid);
            var fblat = $('#' + fblatid);
            if (!fbadd || !fblng || !fblat) {
                $.App.alert('danger', '回调控件不完整!');
            }
            //fbid 查找带回的文本框ID,全局唯一      
            $.ajax({
                type: "post",
                url: "<?php echo U('Multi/Public/baiduDitu');?>",
                data: {
                    'address': $(fbadd).val(),
                    'lng': $(fblng).val(),
                    'lat': $(fblat).val()
                },
                dataType: "json",
                success: function(mb) {
                    bootbox.dialog({
                        message: mb,
                        title: "百度地图控件",
                        className: "modal-darkorange",
                        buttons: {
                            success: {
                                label: "确定",
                                className: "btn-blue",
                                callback: function() {
                                    $(fbadd).val($('#baiduDituaddress').val());
                                    $(fblng).val($('#baiduDitulng').val());
                                    $(fblat).val($('#baiduDitulat').val());
                                }
                            },
                            "取消": {
                                className: "btn-danger",
                                callback: function() {}
                            }
                        }
                    });
                },
                error: function(xhr) {
                    $.App.alert('danger', '通讯失败！请重试！');
                }
            });
            return false;
        }

    </script>
    <!--百度编辑器-->
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/ueditor/ueditor.all.min.js"></script>
    <!--编辑器封装-->
    <script type="text/javascript">
    UE.getEditor('J-ueditor', {
        textarea: 'content' //提交字段名，必须填写，数据库必须有此字段
    });
    </script>
    <!--/编辑器封装-->
    <!--表单验证与提交封装-->
    <script type="text/javascript">
    $('#AppForm').bootstrapValidator({
        submitHandler: function(validator, form, submitButton) {
            var tourl = "<?php echo U('Multi/Public/addShop');?>";
            var data = $('#AppForm').serialize();
            layer.load(0, {shade: false});
            $.ajax({
                type: 'post',
                url: tourl,
                data: data,
                global: false,
                dataType: "json",
                success: function (info) {
                    if (info.status) {
                        layer.msg(info.msg, {icon: 6});
                        window.location.href='<?php echo U("Multi/Public/shopList");?>';
                    } else {
                        layer.msg(info.msg, {icon: 5});
                    }
                }, //成功时执行Response函数
                error: function (info) {
                    alert('操作失败，请重试或检查网络连接3！')
                }//失败时调用函数
            })
        },
    });
    </script>
    <!--/表单验证与提交封装-->
    <script type="text/javascript">
    $('#isyfbtn').on('click', function() {
        var value = $(this).prop('checked') ? 1 : 0;
        $('#isyf').val(value);
    });
    $('#isthbtn').on('click', function() {
        var value = $(this).prop('checked') ? 1 : 0;
        $('#isth').val(value);
    });
    </script>
</body>
<!--  /Body -->

</html>