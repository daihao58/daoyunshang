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
    <script src="/Public/Admin/js/skins.min.js"></script>
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
        <div id="loading" style="top: 150px; display: block;">
            <div class="lbk"></div>
            <div class="lcont"><img src="/Public/Admin/img/loading.gif" alt="loading...">正在加载...</div>
        </div>
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
            <div class="page-content" style="margin-left: 0px;">
                <!-- Page Body -->
                <div id="App-loader" class="page-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="table-toolbar">
                                        <a href="<?php echo U('Multi/Public/addShop/');?>" class="btn btn-primary" data-loader="App-loader" data-loadername="新增店铺">
                                            <i class="fa fa-plus"></i>新增店铺
                                        </a>
                                    </div>
                                    <table id="App-table" class="table table-bordered table-hover">
                                        <thead class="bordered-darkorange">
                                            <tr role="row">
                                                <th width="20px">
                                                    <div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
                                                        <label style="padding-left: 4px;">
                                                            <input type="checkbox" class="App-checkall colored-blue">
                                                            <span class="text"></span>
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>ID</th>
                                                <th>店名</th>
                                                <th>店铺Logo</th>
                                                <th>链接</th>
                                                <th>状态</th>
                                                <th>商城简介</th>
                                                <th>创建时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(is_array($cache)): $i = 0; $__LIST__ = $cache;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="item<?php echo ($vo["id"]); ?>">
                                                    <td>
                                                        <div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
                                                            <label style="padding-left: 4px;">
                                                                <input name="checkvalue" type="checkbox" class="colored-blue App-check" value="<?php echo ($vo["id"]); ?>">
                                                                <span class="text"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class=" sorting_1"><?php echo ($vo["id"]); ?></td>
                                                    <td class=" "><?php echo ($vo["name"]); ?></td>
                                                    <td class=" ">
                                                        <img src="/Upload/<?php echo ($vo["logo"]["savepath"]); echo ($vo["logo"]["savename"]); ?>" width="60" height="60" alt="<?php echo ($vo["name"]); ?>">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" style="margin: 0px">
                                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                                链接<span class="caret"></span></button>
                                                            <div class="dropdown-menu" style="padding: 10px;max-width: none;">
                                                                <?php echo ($url); echo U('App/Shop/index' , array('shopid'=>$vo['id']));?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php if($vo["status"] == -1): ?><span style="color: #A2A2A2">停业整顿</span><?php endif; ?>
                                                        <?php if($vo["status"] == 0): ?><span style="color: #EF473a">未审核</span><?php endif; ?>
                                                        <?php if($vo["status"] == 1): ?><span style="color: #202EE6">休息中</span><?php endif; ?>
                                                        <?php if($vo["status"] == 2): ?><span style="color: #53A93F">营业中</span><?php endif; ?>
                                                    </td>
                                                    <td class=" "><?php echo ($vo["summary"]); ?></td>
                                                    <td class=" "><?php echo (date('Y/m/d H:i',$vo["time"])); ?></td>
                                                    <td class="center ">
                                                        <a href="<?php echo U('Multi/Public/switchShop/',array('id'=>$vo['id']));?>" class="btn btn-info btn-xs">
                                                            <i class="fa fa-edit"></i> 管理
                                                        </a>&nbsp;&nbsp;
                                                        <?php if($vo["status"] == 1): ?><a href="<?php echo U('Multi/Public/shopStatus/',array('id'=>$vo['id'],'status'=>'2'));?>" class="btn btn-success btn-xs">
                                        开业
                                        </a>&nbsp;&nbsp;<?php endif; ?>
                                                        <?php if($vo["status"] == 2): ?><a href="<?php echo U('Multi/Public/shopStatus/',array('id'=>$vo['id'],'status'=>'1'));?>" class="btn btn-warning btn-xs">
                                        休息
                                        </a>&nbsp;&nbsp;<?php endif; ?>
                                                        <a href="<?php echo U('Multi/Public/shopDel/',array('id'=>$vo['id']));?>" class="btn btn-danger btn-xs">
                                                            <i class="fa fa-trash-o"></i> 删除
                                                        </a>
                                                    </td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                    <div class="row DTTTFooter">
                                        <?php echo ($page); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--全选特效封装/全部删除-->
                    <script type="text/javascript">
                    //全选
                    var checkall = $('#App-table .App-checkall');
                    var checks = $('#App-table .App-check');
                    var trs = $('#App-table tbody tr');
                    $(checkall).on('click', function() {
                        if ($(this).is(":checked")) {
                            $(checks).prop("checked", "checked");
                        } else {
                            $(checks).removeAttr("checked");
                        }
                    });
                    $(trs).on('click', function() {
                        var c = $(this).find("input[type=checkbox]");
                        if ($(c).is(":checked")) {
                            $(c).removeAttr("checked");
                        } else {
                            $(c).prop("checked", "checked");
                        }
                    });

                    //全删
                    $('#App-delall').on('click', function() {
                        var checks = $(".App-check:checked");
                        var chk = '';
                        $(checks).each(function() {
                            chk += $(this).val() + ',';
                        });
                        if (!chk) {
                            $.App.alert('danger', '请选择要删除的项目！');
                            return false;
                        }
                        var toajax = "<?php echo U('Multi/Vip/cardDel');?>" + "/id/" + chk;
                        var funok = function() {
                            var callok = function() {
                                //成功删除后刷新
                                $('#refresh-toggler').trigger('click');
                                return false;
                            };
                            var callerr = function() {
                                //拦截错误
                                return false;
                            };
                            $.App.ajax('post', toajax, 'nodata', callok, callerr);
                        }
                        $.App.confirm("确认要删除吗？", funok);
                    });
                    </script>
                    <!--/全选特效封装-->
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
    <!--统计脚本-->
    <script src="/Public/Admin/js/charts/easypiechart/jquery.easypiechart.js"></script>
    <script src="/Public/Admin/js/charts/easypiechart/easypiechart-init.js"></script>
    <script src="/Public/Admin/js/charts/flot/jquery.flot.js"></script>
    <script src="/Public/Admin/js/charts/flot/jquery.flot.orderBars.js"></script>
    <script src="/Public/Admin/js/charts/flot/jquery.flot.tooltip.js"></script>
    <script src="/Public/Admin/js/charts/flot/jquery.flot.resize.js"></script>
    <script src="/Public/Admin/js/charts/flot/jquery.flot.selection.js"></script>
    <script src="/Public/Admin/js/charts/flot/jquery.flot.crosshair.js"></script>
    <script src="/Public/Admin/js/charts/flot/jquery.flot.stack.js"></script>
    <script src="/Public/Admin/js/charts/flot/jquery.flot.time.js"></script>
    <script src="/Public/Admin/js/charts/flot/jquery.flot.pie.js"></script>
    <script src="/Public/Admin/js/charts/chartjs/Chart.js"></script>
    <!--百度地图类库-->
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=StGl5qQsPbsCVg8tizbLbkOw"></script>
    <!--App全局API-->
    <script src="/Public/Admin/js/appapi.js"></script>
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
</body>
<!--  /Body -->

</html>