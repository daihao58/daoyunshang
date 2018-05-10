<?php if (!defined('THINK_PATH')) exit();?> <div class="row">
        <div class="col-md-12">
                <form id="AppOrderFhkd" action="" method="post" class="form-horizontal"
                                                  data-bv-message=""
                                                  data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                                                  data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                                  data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                   <input type="hidden" name="id" value="<?php echo ($cache["id"]); ?>">                  
                   <div class="form-group">
                        <label class="col-lg-3 control-label">发货快递名称<sup>*</sup></label>
                        <div class="col-lg-7">
                        	<input id="AppOrderFahuokd" type="text" class="form-control" name="fahuokd" value="<?php echo ($cache["fahuokd"]); ?>">
                        </div>
                   </div>
                  <div class="form-group">
                        <label class="col-lg-3 control-label">发货快递单号<sup>*</sup></label>
                        <div class="col-lg-7">
                        	<input id="AppOrderFahuokdnum" type="text" class="form-control" name="fahuokdnum" value="<?php echo ($cache["fahuokdnum"]); ?>">
                        </div>
                   </div>
               </form>
        </div>
</div>