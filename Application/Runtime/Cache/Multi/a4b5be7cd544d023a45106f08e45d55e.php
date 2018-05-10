<?php if (!defined('THINK_PATH')) exit();?><div class="row">
    <div class="col-xs-12 col-xs-12">
        <div class="widget radius-bordered">
            <div class="widget-header bg-blue">
                <i class="widget-icon fa fa-arrow-down"></i>
                <span class="widget-caption">现金币充值</span>
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
                <form id="AppForm" action="" method="post" class="form-horizontal" data-bv-message="" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">会员账号<sup>*</sup></label>
                        <div class="col-lg-4">
                            <input type="text" name="mobile" class="form-control" value="<?php echo ($cache["score"]); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">充值金额<sup>*</sup></label>
                        <div class="col-lg-4">
                            <input type="text" name="money" class="form-control" value="<?php echo ($cache["money"]); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-4">
                            <button class="btn btn-primary btn-lg" type="submit">保存</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-palegreen btn-lg" type="reset">重填</button>
                        </div>
                    </div>
                </form>
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
<!--表单验证与提交封装-->
<script type="text/javascript">
$('#AppForm').bootstrapValidator({
    submitHandler: function(validator, form, submitButton) {
        var lid = '';
        var checks = $('.label-check');
        $(checks).each(function() {
            if ($(this).is(":checked")) {
                lid += $(this).val() + ',';
            }
        });
        $('#lid').val(lid);
        var tourl = "<?php echo U('Multi/Vip/recharge');?>";
        var data = $('#AppForm').serialize();
        $.App.ajax('post', tourl, data, null);
        return false;
    },
});
$('#isfxbtn').on('click', function() {
    var value = $(this).prop('checked') ? 1 : 0;
    $('#isfx').val(value);
});
$('#isfxgdbtn').on('click', function() {
    var value = $(this).prop('checked') ? 1 : 0;
    $('#isfxgd').val(value);
});
</script>
<!--/表单验证与提交封装-->