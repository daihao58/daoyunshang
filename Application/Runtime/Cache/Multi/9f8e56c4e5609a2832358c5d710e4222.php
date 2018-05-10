<?php if (!defined('THINK_PATH')) exit();?><div style="text-align: center; width: 570px; overflow: hidden;" id="App-sku-loader-wrap">
	<?php if(empty($cache)): ?><p>没有未选择的SKU属性了</p><?php endif; ?>
<?php if(is_array($cache)): $i = 0; $__LIST__ = $cache;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p><button class="btn btn-default" data-id = "<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?>:<?php echo ($vo["items"]); ?></button></p><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script>
    var fbname="<?php echo ($findback); ?>";
    var findback=$('#'+fbname);
	var bts=$('#App-sku-loader-wrap button');
	$(bts).on('click',function(){
		var id=$(this).data('id');
		var bt=$(this);
		$.ajax({
					type:"post",
					url:"<?php echo U('Multi/Shop/skuFindback');?>",
					data:{'id':id},
					dataType: "json",
					success:function(mb){
						$(findback).append(mb);
						$.App.alert('success','添加属性成功！');
						$(bt).remove();
						initShopSku();
					},
					error:function(xhr){
						$.App.alert('danger','通讯失败！请重试！');
					}
		});
	});
</script>