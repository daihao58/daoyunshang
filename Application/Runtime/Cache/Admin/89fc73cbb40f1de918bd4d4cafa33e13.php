<?php if (!defined('THINK_PATH')) exit();?><div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="widget">
			<div class="widget-header bg-blue">
				<i class="widget-icon fa fa-arrow-down"></i>
				<span class="widget-caption">商城订单</span>
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
                    <sup>* 目前仅支持支付宝提现申请</sup><br />
                    <sup>* 提现手续费比例为<?php echo ($config["tx_fee"]); ?>%</sup><br />
                    <sup>* 目前仅支持支付宝提现申请 每次提现大于100元</sup><br />
                </div>

				<div class="table-toolbar">
					<?php if(($status) == "2"): ?><!--<button class="btn btn-success" id="App-fhok"><i class="fa fa-ambulance"></i> 批量发货</button>-->
					<?php else: ?>
					<!--<button class="btn btn-danger" disabled="disabled">预留按钮</button>--><?php endif; ?>
					<?php if(empty($status)): ?><button class="btn btn-danger" disabled="disabled">预留按钮</button><?php endif; ?>
					
				</div>

				<table id="App-table" class="table table-bordered table-hover">
					<thead class="bordered-darkorange">
						<tr role="row">
							<th width="30px"><div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
									<label style="padding-left: 4px;"> <input type="checkbox" class="App-checkall colored-blue">
                                     <span class="text"></span>
									</label>                                    
                                </div></th>
							<th>流水号</th>
							<th>提现ID</th>
							<th>店铺名称</th>
							<th>用户id</th>
							<th>金额</th>
							<th>手续费</th>
							<th>提现金额</th>							
							<th>支付宝账号</th>
							<th>昵称</th>
							<th>状态</th>
							<th>时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($txList)): $i = 0; $__LIST__ = $txList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="item<?php echo ($vo["id"]); ?>">
								<td>
									<div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
										<label style="padding-left: 4px;"> <input name="checkvalue" type="checkbox" class="colored-blue App-check" value="<?php echo ($vo["id"]); ?>">
	                                     <span class="text"></span>
										</label>                                    
	                                </div>
								</td>
								<td class=" sorting_1"><?php echo ($vo["id"]); ?></td>
								<td class=" "><?php echo ($vo["txid"]); ?></td>
								<td class=" "><?php echo ($vo["shopname"]); ?></td>
								<td class=" "><?php echo ($vo["user_id"]); ?></td>
								<td class=" "><?php echo ($vo["money"]); ?></td>
								<td class=" "><?php echo ($vo["fee"]); ?></td>
								<td class=" "><?php echo ($vo["tx"]); ?></td>
								<td class=" "><?php echo ($vo["account"]); ?></td>
								<td class=" "><?php echo ($vo["name"]); ?></td>
								<td class=" ">
									<?php switch($vo["status"]): case "0": ?>申请提现<?php break;?>
										<?php case "1": ?>通过<?php break;?>
										<?php case "-1": ?>拒绝取消<?php break; endswitch;?>
								</td>
								<td class=" "><?php echo ($vo["time"]); ?></td>
								<!-- <td class=" "><?php echo (date('Y/m/d H:i',$vo["ctime"])); ?></td> -->
								<td class="">
                                    <?php if($vo["status"] == 0): ?><a class="table-actions btn btn-success btn-xs" data-loader="App-loader" data-loadername="提现完成" href="<?php echo U('Admin/Trade/updateTx',array('id'=>$vo['id'],'status' => 1));?>">提现完成</a>
                                        </br>
                                        </br>
                                        <a class="table-actions btn btn-warning btn-xs" data-loader="App-loader" data-loadername="提现完成" href="<?php echo U('Admin/Trade/updateTx',array('id'=>$vo['id'],'status' => -1));?>">拒绝提现</a><?php endif; ?>
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
<!--面包屑导航封装-->
<div id="tmpbread" style="display: none;"><?php echo ($breadhtml); ?></div>
<script type="text/javascript">
	setBread($('#tmpbread').html());
</script>
<!--/面包屑导航封装-->
<!--全选特效封装/全部删除-->
<script type="text/javascript">
	//全选
	var checkall=$('#App-table .App-checkall');
	var checks=$('#App-table .App-check');
	var trs=$('#App-table tbody tr');
	$(checkall).on('click',function(){
		if($(this).is(":checked")){			
			$(checks).prop("checked","checked");
		}else{
			$(checks).removeAttr("checked");
		}		
	});
	$(trs).on('click',function(){
		var c=$(this).find("input[type=checkbox]");
		if($(c).is(":checked")){
			$(c).removeAttr("checked");
		}else{
			$(c).prop("checked","checked");
		}		
	});
	
	//批量发货
	$('#App-fhok').on('click',function(){
		var checks=$(".App-check:checked");
		var chk='';
		$(checks).each(function(){
			chk+=$(this).val()+',';
		});
		if(!chk){
			$.App.alert('danger','请选择要提现的项目！');
			return false;
		}
		var toajax="<?php echo U('Multi/Shop/orderDeliverAll');?>"+"/id/"+chk;
		var funok=function(){
			var callok=function(){
				//成功删除后刷新
				$('#refresh-toggler').trigger('click');
				return false;
			};
			var callerr=function(){
				//拦截错误
				return false;
			};
			$.App.ajax('post',toajax,'nodata',callok,callerr);
		}						
		$.App.confirm("确认要批量完成发货吗？此操作不可逆转！",funok);
	});
</script>
<!--/全选特效封装-->


<!--订单特效-->
<script type="text/javascript">

	//导出订单
	$('#exportOrder').on('click',function(){
		var checks=$(".App-check:checked");
		var chk='';
		$(checks).each(function(){
			chk+=$(this).val()+',';
		});
		window.open("<?php echo U('Multi/Shop/orderExport');?>/status/<?php echo ($status); ?>/id/"+chk);
	})
</script>