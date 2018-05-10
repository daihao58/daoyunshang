<?php if (!defined('THINK_PATH')) exit();?><tr class="App-checktr" data-id='<?php echo ($cache["id"]); ?>' data-label='<?php echo ($cache["name"]); ?>' >
	<td class=" "><?php echo ($cache["name"]); ?></td>
	<td class=" ">
	<div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
		<?php if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label>
       <input type="checkbox" class="colored-blue App-check" checked="checked" value="<?php echo ($vo["path"]); ?>" data-label = "<?php echo ($vo["name"]); ?>">
       <span class="text"><?php echo ($vo["name"]); ?></span>
       </label><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>								
	</td>
	<td class="center "><button class="App-skuattr-del btn btn-xs btn-darkorange">移除此属性</button></td>
</tr>