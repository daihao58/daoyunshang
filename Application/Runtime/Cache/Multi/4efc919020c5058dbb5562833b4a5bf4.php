<?php if (!defined('THINK_PATH')) exit();?><div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="widget">
			<div class="widget-header bg-blue">
				<i class="widget-icon fa fa-arrow-down"></i>
				<span class="widget-caption">返利明细</span>
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
				<!--<div class="table-toolbar">
					&lt;!&ndash;<button href="javascript:void(0)" class="btn btn-primary" id="exportTxorder"><i class="fa fa-save"></i>导出申请</button>&ndash;&gt;
					<div class="pull-right">
						<form id="App-search">
							<label style="margin-bottom: 0px;">
								<input name="name" type="search" value="<?php echo ($name); ?>" placeholder="按姓名模糊搜索" class="form-control input-sm">
							</label>
							<a href="<?php echo U('Multi/Vip/bond/');?>" class="btn btn-success" data-loader="App-loader" data-loadername="保证金" data-search="App-search">
								<i class="fa fa-search"></i>搜索
							</a>
						</form>
					</div>
				</div>-->

				<table id="App-table" class="table table-bordered table-hover">
					<thead class="bordered-darkorange">
						<tr role="row">
							<th width="30px"><div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
									<label style="padding-left: 4px;"> <input type="checkbox" class="App-checkall colored-blue">
                                     <span class="text"></span>
									</label>
                                </div></th>
							<th>ID</th>
							<th>买家</th>
							<th>订单ID</th>
							<th>返利人</th>
							<th>返利金额</th>
							<th>返利类型</th>
						<!--    <th>操作</th>-->
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="item<?php echo ($vo["id"]); ?>">
								<td>
									<div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
										<label style="padding-left: 4px;"> <input name="checkvalue" type="checkbox" class="colored-blue App-check" value="<?php echo ($vo["id"]); ?>">
	                                     <span class="text"></span>
										</label>
	                                </div>
								</td>
								<td class=" sorting_1"><?php echo ($vo["id"]); ?></td>
								<td class=" "><?php echo ($vo["buyname"]); ?></td>
								<td class=" "><?php echo ($vo["order_id"]); ?></td>
								<td class=" "><?php echo ($vo["pname"]); ?></td>
								<td class=" "><?php echo ($vo["rebate_money"]); ?></td>
								<td class=" "><?php echo ($vo["content"]); ?></td>
							<!--	<td class="center ">
									<?php if(($vo["status"]) == "0"): ?><button class="btn btn-success btn-xs txordercancel" data-id = "<?php echo ($vo["id"]); ?>"><i class="glyphicon glyphicon-ok"></i> 同意申请</button><?php endif; ?>
									<?php if(($vo["status"]) == "1"): ?>已通过<?php endif; ?>
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
	//批量提现完成
	$('#App-txok').on('click',function(){
		var checks=$(".App-check:checked");
		var chk='';
		$(checks).each(function(){
			chk+=$(this).val()+',';
		});
		if(!chk){
			$.App.alert('danger','请选择要提现的项目！');
			return false;
		}
		var toajax="<?php echo U('Multi/Vip/txorderOk');?>"+"/id/"+chk;
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
		$.App.confirm("确认要批量完成提现吗？此操作不可逆转！",funok);
	});

		//订单发货
	var btntxcancel=$('.txordercancel');
	$(btntxcancel).on('click',function(){
		var id=$(this).data('id');
		var funok=function(){
			$.ajax({
				type:"post",
				url:"<?php echo U('Multi/Vip/txorderCancel');?>",
				async:false,
				data:{'id':id},
				success:function(info){
				    if(info['status']){
				           $.App.alert('success',info['msg']);
				           $('#App-reloader').trigger('click');
				    }else{
				           $.App.alert('danger',info['msg']);
				         }
				         return false;
				   },
				error:function(xhr){
					$.App.alert('danger','通讯失败！请重试！');
					return false;
				}
			});
		}
		$.App.confirm("确认要同意挂靠申请吗？此操作不可逆转！",funok);

	});


	//导出提现帐单
	$('#exportTxorder').on('click',function(){
		var checks=$(".App-check:checked");
		var chk='';
		$(checks).each(function(){
			chk+=$(this).val()+',';
		});
		window.open("<?php echo U('Multi/Vip/txorderExport');?>/status/<?php echo ($status); ?>/id/"+chk);
	})
</script>
<!--/全选特效封装-->