<?php if (!defined('THINK_PATH')) exit();?><div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="widget">
            <div class="widget-header bg-blue">
                <i class="widget-icon fa fa-arrow-down"></i>
                <span class="widget-caption">会员列表</span>
                <div class="widget-buttons">
                    <a href="#" data-toggle="maximize">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a href="#" data-toggle="collapse">
                        <i class="fa fa-minus"></i>
                    </a>
                    <a href="#" data-toggle="dispose">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body">
                <div class="table-toolbar">
                    <div class="pull-right">
                        <form id="App-search">
                            <label style="margin-bottom: 0px;">
                                <input name="search" type="search" class="form-control input-sm" placeholder="会员昵称或者手机号">
                            </label>
                            <a href="<?php echo U('Admin/Employee/vipCenter/');?>" class="btn btn-success" data-loader="App-loader" data-loadername="会员列表" data-search="App-search">
                                <i class="fa fa-search"></i>搜索
                            </a>
                        </form>
                    </div>
                    <div style="height:50px"></div>
                </div>
                <table id="App-table" class="table table-bordered table-hover">
                    <thead class="bordered-darkorange">
                        <tr role="row">
                            <th>ID</th>
                            <th>层级</th>
                            <th>昵称</th>
                            <th>下线人数</th>
                            <th>手机号</th>
                            <th>电子邮箱</th>
                            <th>姓名</th>
                            <th>分销等级</th>
                            <th>账户金额</th>
                            <th>购买额</th>
							<th>三级订单量</th>
                            <th>注册时间</th>
                            <th>最后访问</th>
                            <!--<th width="100px">状态</th>-->
                            <!--<th>操作</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($cache)): $i = 0; $__LIST__ = $cache;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="item<?php echo ($vo["id"]); ?>">
                                <td><?php echo ($vo["id"]); ?></td>
                                <td><?php echo ($vo["plv"]); ?></td>
                                <td><?php echo ($vo["nickname"]); ?></td>
                                <td><?php echo ($vo["total_xxlink"]); ?></td>
                                <td><?php echo ($vo["mobile"]); ?></td>
                                <td><?php echo ($vo["email"]); ?></td>
                                <td><?php echo ($vo["name"]); ?></td>
                                <td><?php echo ($vo["fxname"]); ?></td>
                                <td><?php echo ($vo["money"]); ?></td>
                                <td><?php echo ($vo["total_buy"]); ?></td>
								<td><?php echo ($vo["total_xxbuy"]); ?></td>
                                <td><?php echo (date('Y-m-d',$vo["ctime"])); ?></td>
                                <td><?php echo (date('Y-m-d',$vo["cctime"])); ?></td>
                                <!--<td class=" "><?php echo ($vo["status"]); ?></td>
                                <td class="center ">
                                    <button class="btn btn-sky btn-xs App-vippath" data-id="<?php echo ($vo["id"]); ?>" data-path="<?php echo ($vo["path"]); ?>"><i class="fa fa-eye"></i> 层级树</button>
                                </td>-->
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
<!--面包屑导航封装-->
<div id="tmpbread" style="display: none;"><?php echo ($breadhtml); ?></div>
<script type="text/javascript">
setBread($('#tmpbread').html());
</script>
<!--/面包屑导航封装-->
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
$('#sendMsg').on('click', function() {
    var checks = $(".App-check:checked");
    var chk = '';
    $(checks).each(function() {
        chk += $(this).val() + ',';
    });
    if (!chk) {
        $.App.alert('danger', '请选择要发送的对象！');
        return false;
    }
    var tourl = "<?php echo U('Admin/Vip/messageSet');?>" + "/pids/" + chk;
    $('#sendMsgbtn').attr('href', tourl).trigger('click');
});

$('#sendMail').on('click', function() {
    var checks = $(".App-check:checked");
    var chk = '';
    $(checks).each(function() {
        chk += $(this).val() + ',';
    });
    if (!chk) {
        $.App.alert('danger', '请选择要发送的对象！');
        return false;
    }
    var tourl = "<?php echo U('Admin/Vip/mailSet');?>" + "/pids/" + chk;
    $('#sendMailbtn').attr('href', tourl).trigger('click');
});
//会员层级
var btnpath = $('.App-vippath');
$(btnpath).on('click', function() {
    var data = $(this).data('path');
    var id = $(this).data('id');
    $.ajax({
        type: 'post',
        data: {
            'data': data,
            'id': id,
        },
        url: "<?php echo U('Admin/Vip/vipTree');?>",
        async: false,
        dataType: 'json',
        success: function(e) {
            bootbox.dialog({
                message: e.msg,
                title: "会员完整层级展示",
                className: "modal-darkorange",
                buttons: {
                    "取消": {
                        className: "btn-danger",
                        callback: function() {}
                    }
                }
            });
            return false;
        },
        error: function() {
            $.App.alert('danger','通讯失败！');
            return false;
        }
    });
    return false;
});

//导出会员数据
$('#exportVip').on('click', function() {
    var checks = $(".App-check:checked");
    var chk = '';
    $(checks).each(function() {
        chk += $(this).val() + ',';
    });
    window.open("<?php echo U('Admin/Vip/vipExport');?>/id/" + chk);
})
</script>
<!--/全选特效封装-->