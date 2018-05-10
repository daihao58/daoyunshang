<?php if (!defined('THINK_PATH')) exit();?><!--SKU属性-->
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="widget">
			<div class="widget-header bg-green">
				<i class="widget-icon fa fa-arrow-down"></i>
				<span class="widget-caption">当前SKU属性</span>
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
					<button class="btn btn-primary" id="App-skuattr-add">
						<i class="fa fa-plus"></i>添加SKU属性
					</button>
					<button class="btn btn-success" id="App-skuattr-save">
						<i class="fa fa-delicious"></i>保存所有SKU属性
					</button>
					<button  class="btn btn-danger" id="App-skuattr-makesku">
						<i class="fa fa-flag-checkered"></i>更新生成所有SKU
					</button>
				</div>
				<table id="App-table-skuattr" class="table table-bordered table-hover">
					<thead class="bordered-darkorange">
						<tr role="row">
							<th width="200">属性名称</th>
							<th>属性值</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody id="App-sku-findback">
						<?php if(is_array($skuinfo)): foreach($skuinfo as $key=>$vo): ?><tr class="App-checktr" data-id='<?php echo ($vo["attrid"]); ?>' data-label='<?php echo ($vo["attrlabel"]); ?>' >
							<td class=" "><?php echo ($vo["attrlabel"]); ?></td>
							<td class=" ">
							<div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
							   <?php if(is_array($vo["allitems"])): foreach($vo["allitems"] as $key=>$vo2): ?><label>
							       <input type="checkbox" class="colored-blue App-check" <?php if(!empty($vo2["checked"])): ?>checked="checked"<?php endif; ?> value="<?php echo ($vo2["path"]); ?>" data-label = "<?php echo ($vo2["name"]); ?>">
							       <span class="text"><?php echo ($vo2["name"]); ?></span>
							       </label><?php endforeach; endif; ?>
						    </div>								
							</td>
							<td class="center "><button class="App-skuattr-del btn btn-xs btn-darkorange">移除此属性</button></td>
					    </tr><?php endforeach; endif; ?>
					</tbody>
				</table>
			<!--widgetbody结束-->
			</div>
		</div>
	</div>
</div>
<!--SKU-->
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="widget">
			<div class="widget-header bg-blue">
				<i class="widget-icon fa fa-arrow-down"></i>
				<span class="widget-caption">商品SKU-<?php echo ($goods["name"]); ?></span>
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
								<input name="name" type="search" class="form-control input-sm" value="<?php echo ($name); ?>" placeholder="按属性值模糊搜索">
							</label>
							<a href="<?php echo U('Multi/Shop/sku/',array('id'=>$goods[id]));?>" class="btn btn-success" data-loader="App-loader" data-loadername="商品Sku" data-search="App-search">
								<i class="fa fa-search"></i>搜索
							</a>
						</form>
					</div>
					<div class="clear"></div>
				</div>

				<table id="App-table" class="table table-bordered table-hover">
					<thead class="bordered-darkorange">
						<tr role="row">
							<th width="30px"><div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
									<label style="padding-left: 4px;"> <input type="checkbox" class="App-checkall colored-blue">
                                     <span class="text"></span>
									</label>                                    
                                </div></th>
							<th>ID</th>
							<th>属性名称</th>
							<th>属性值</th>
							<th>价格</th>
							<th>结算价</th>
							<th>库存</th>
							<th>销量</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody >
						<?php if(is_array($cache)): $i = 0; $__LIST__ = $cache;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="item<?php echo ($vo["id"]); ?>">
								<td>
									<div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
										<label style="padding-left: 4px;"> <input name="checkvalue" type="checkbox" class="colored-blue App-check" value="<?php echo ($vo["id"]); ?>">
	                                     <span class="text"></span>
										</label>                                    
	                                </div>
								</td>
								<td class=" sorting_1"><?php echo ($vo["id"]); ?></td>
								<td class=" "><?php echo ($vo["sku"]); ?></td>
								<td class=" "><?php echo ($vo["skuattr"]); ?></td>
								<td class=" "><?php echo ($vo["price"]); ?></td>
								<td class=" "><?php echo ($vo["cprice"]); ?></td>
								<td class=" "><?php echo ($vo["num"]); ?></td>
								<td class=" "><?php echo ($vo["sells"]); ?></td>
								<td class="center "><a href="<?php echo U('Multi/Shop/skuSet/',array('id'=>$vo['id']));?>" class="btn btn-success btn-xs" data-loader="App-loader" data-loadername="商品SKU设置"><i class="fa fa-edit"></i> 编辑</a></td>
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
<!--商品SKU初始化特效-->
<script type="text/javascript">
	var goodsid="<?php echo ($goodsid); ?>";
	
	function initShopSku(){	
		//初始化
		//全选
		var trs=$('#App-table-skuattr .App-checktr');
		$(checkall).on('click',function(){
				if($(this).is(":checked")){			
					$(checks).prop("checked","checked");
				}else{
					$(checks).removeAttr("checked");
				}		
		});
		$('.App-skuattr-del').on('click',function(){
			$(this).parent().parent("tr").remove();
		});
	
	}
	//新增
		$('#App-skuattr-add').on('click',function(){
			var trs=$('#App-table-skuattr .App-checktr');
			var fbid="App-sku-findback";
			var ids="";
			$(trs).each(function(){
				var id=$(this).data('id');
				ids=ids+id+',';
			});
			appSkuloader(ids,fbid);
			//return false;
		});
		//保存
		$('#App-skuattr-save').on('click',function(){
			var trs=$('#App-table-skuattr .App-checktr');
			var data="";
			$(trs).each(function(){
				var id=$(this).data('id');
				var label=$(this).data('label');
				var str='';
				var checks=$(this).find('.App-check');
				$(checks).each(function(){
					if($(this).is(":checked")){
						str=str+$(this).val()+":"+$(this).data('label')+',';
					}
				});
				data=data+id+":"+label+"-"+str+";";
			});
			//alert(data);
			var toajax="<?php echo U('Multi/Shop/skuattrSave');?>"+"/id/"+goodsid;
			var callok=function(){
				$(AppLoaderReloader).trigger('click');
				return false;
			};
			var callerr=function(){
				//拦截错误
				return false;
			};
			$.App.ajax('post',toajax,{'data':data},callok,callerr);
		});
		
		//生成SKU
		$('#App-skuattr-makesku').on('click',function(){
			var toajax="<?php echo U('Multi/Shop/skuattrMake');?>"+"/id/"+goodsid;
			var callok=function(){
				$(AppLoaderReloader).trigger('click');
				return false;
			};
			var callerr=function(){
				//拦截错误
				return false;
			};
			$.App.ajax('post',toajax,'nodata',callok,callerr);
		});
	initShopSku();	
	
</script>
<!--/全选特效封装-->