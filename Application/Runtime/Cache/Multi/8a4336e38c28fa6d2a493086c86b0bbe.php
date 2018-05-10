<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
	#baiduDituMap {
		width: 100%;
		height: 300px;
		overflow: hidden;
		border: 1px solid #333333;
	}
</style>

<div>
	<div class="alert alert-success">
		<i class="fa-fw fa fa-info"></i>
        <strong>提示：</strong> <span>输入地址，点击搜索可以快速查找坐标！</span>
    </div>
    <div class="input-group input-group-sm" style="margin-bottom: 20px;">
    	<input type="text" class="form-control" value="<?php echo ($map["address"]); ?>" id="baiduDituaddress" placeholder="输入地址可以模糊搜索">
       	<span class="input-group-btn">
        <button class="btn btn-default shiny" type="button" id="baiduDitustart"><i class="glyphicon glyphicon-search"></i>立刻搜索</button>
    	</span>
    </div>
    <div class="row" style="margin-bottom: 20px;">
    	<div class="col-xs-6">
	          <div class="input-group input-group-xs">
	               <span class="input-group-btn">
	                   <button class="btn btn-palegreen" type="button">坐标：Lng</button>
	               </span>
	               <input type="text" class="form-control" value="<?php echo ($map["lng"]); ?>" id="baiduDitulng">
	          </div>
        </div>
        <div class="col-xs-6">
	         <div class="input-group input-group-xs">
	               <span class="input-group-btn">
	                   <button class="btn btn-palegreen" type="button">坐标：Lat</button>
	               </span>
	               <input type="text" class="form-control" value="<?php echo ($map["lat"]); ?>" id="baiduDitulat">
	          </div>  
        </div>
    </div>
	<div id="baiduDituMap">
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
	    
		// 百度地图API功能
		var map = new BMap.Map("baiduDituMap");
	
		//建立一个自动完成的对象
		var ac = new BMap.Autocomplete({
			"input": "baiduDituaddress",
			"location": map
		});
	
		var marker = new BMap.Marker(new BMap.Point(map.getCenter().lng, map.getCenter().lat));
		// 初始化地图,设置城市和地图级别。
		if ('<?php echo ($map["lng"]); ?>' != '' || '<?php echo ($map["lat"]); ?>' != '') {
			//初始化
			var point = new BMap.Point('<?php echo ($map["lng"]); ?>', '<?php echo ($map["lat"]); ?>');
			map.centerAndZoom(point, 14);
			marker = new BMap.Marker(new BMap.Point('<?php echo ($map["lng"]); ?>', '<?php echo ($map["lat"]); ?>'));
			map.addOverlay(marker);
		} else {
			// 创建地址解析器实例
			var myGeo = new BMap.Geocoder();
			// 将地址解析结果显示在地图上,并调整地图视野
			myGeo.getPoint("张家港", function(point) {
				if (point) {
					map.centerAndZoom(point, 14);
					marker = new BMap.Marker(point);
					map.addOverlay(marker);
				}
			}, "张家港");
		}
		//启用滚轮放大缩小，默认禁用
		map.enableScrollWheelZoom();
		//地图点击事件
		map.addEventListener("click", function(e) {
			//删除原有标注
			map.removeOverlay(marker);
			// 创建标注
			marker = new BMap.Marker(new BMap.Point(e.point.lng, e.point.lat));
			// 将标注添加到地图中
			map.addOverlay(marker);
			//文本框复制
			$('#baiduDitulng').val(e.point.lng);
			$('#baiduDitulat').val(e.point.lat);
		});
		map.addEventListener("tilesloaded", function(e) {
				if ($('#baiduDituaddress').val() == '') {
					$('#baiduDituaddress').val('<?php echo ($map["address"]); ?>');
				}
			})
			//地图搜索按钮功能
		$('#baiduDitustart').click(function() {
			var txt = $('#baiduDituaddress').val();
			// 创建地址解析器实例
			var myGeo = new BMap.Geocoder();
			// 将地址解析结果显示在地图上,并调整地图视野
			myGeo.getPoint(txt, function(point) {
				if (point) {
					map.removeOverlay(marker);
					map.centerAndZoom(point, 16);
					marker = new BMap.Marker(point);
					map.addOverlay(marker);
					$('#baiduDitulng').val(point.lng);
					$('#baiduDitulat').val(point.lat);
				}
			}, txt);
		});
	});
	
</script>