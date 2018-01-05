<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
</head>
<body class="layui-layout-body">
	<div class="layui-layout layui-layout-admin">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_left', ''); ?>
		<div id="laimi-content" class="layui-body">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
					<li class="<?php if($GLOBALS['intexpire'] != 1) echo 'layui-this'; ?>">
						<a href="system_shop.php">分店管理</a>
					</li>
					<li class="<?php if($GLOBALS['intexpire'] == 1) echo 'layui-this'; ?>">
						<a href="system_shop.php?expire=1">已过期分店</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-shop layui-tab-content">
<table class="layui-table">
	<thead>
		<tr>
			<th>省份</th>
			<th>城市</th>
			<th>店铺名称</th>
			<th>地址</th>
			<th>电话</th>
			<th>用户数</th>
			<th>到期时间</th>
			<th>总店</th>
			<?php if($GLOBALS['intexpire'] != 1) { ?>
			<th width="70">操作</th>
			<?php } ?>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['shop_list'] as $row) { ?>
		<tr>
			<td><?php echo $row['mysheng']; ?></td>
			<td><?php echo $row['myshi']; ?></td>
			<td><?php echo $row['shop_name']; ?></td>
			<td style="text-align:left;">
				<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-weizhi"></use></svg><?php echo $row['shop_area_address']; ?>
			</td>
			<td><?php echo $row['shop_phone']; ?></td>
			<td><?php echo $row['shop_limit_user']; ?></td>
			<td><?php echo date('Y-m-d', $row['shop_etime']); ?></td>
			<td>
				<a class="<?php if($row['shop_center'] != 1) echo'laimi-center';?>" href="javascript:;" shopid="<?php echo $row['shop_id']; ?>" style="text-decoration:none;">
					<?php if($row['shop_center'] == 1) { ?>
					  总店
					<?php } else { ?>
					  --
					<?php } ?>
				</a>
			</td>
			<?php if($GLOBALS['intexpire'] != 1) { ?>
			<td>
				<button class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['shop_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
			</td>
			<?php } ?>
		</tr>
	<?php } ?>
	</tbody>
</table>
				</div>
			</div>
		</div>
	</div>
	<!--修改分店弹出层开始-->
	<script type="text/html" id="laimi-script-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-edit">
			<input type="hidden" name="txtid" class="layui-input laimi-input-300" value="{{d.shop_id}}">
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 店铺名称</label>
					<div class="layui-input-block">
						<input type="text" name="txtname" class="layui-input laimi-input-300" value="{{d.shop_name}}" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">联系电话</label>
					<div class="layui-input-block">
						<input type="text" name="txtphone" class="layui-input laimi-input-300" value="{{d.shop_phone}}">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 店铺区域</label>
					<div class="layui-input-inline">
						<select name="txtsheng" lay-filter="sheng" lay-search lay-verify="required">
							<option value="">请选择省</option>
							<?php foreach($this->_data['region_list'] as $row) { ?>
							<option value="<?php echo $row['region_id']; ?>" 
							{{# if(d.shop_area_sheng == <?php echo $row['region_id']; ?>) { }}
								selected
							{{#  } }}
							><?php echo $row['region_name']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="layui-input-inline">
						<select name="txtshi" lay-filter="shi" lay-search lay-verify="required">
							<option value="">请选择市</option>
							{{# layui.each(d.myshi, function(index, item) { }}
								<option value="{{item.region_id}}"
								{{# if(d.shop_area_shi == item.region_id) { }}
									selected
								{{#  } }}
								>{{item.region_name}}</option>
							{{# }) }}
						</select>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 店铺地址</label>
					<div class="layui-input-block">
						<input type="text" name="txtaddress" class="layui-input laimi-input-b95"  value="{{d.shop_area_address}}" lay-verify="required">
						<input type="hidden" name="txtjing" class="layui-input laimi-input-b95"  value="{{d.shop_area_jing}}" lay-verify="xy">
						<input type="hidden" name="txtwei" class="layui-input laimi-input-b95"  value="{{d.shop_area_wei}}" lay-verify="xy">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 地图标注</label>
					<div class="layui-input-block">
						<div id="map" style="height: 200px;width:95%;">
						</div>
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn laimi-button-100" lay-filter="laimi-submit-edit" lay-submit>
							完成
						</button>
						<button class="layui-btn layui-btn-primary" type="reset">
							重置
						</button>
					</div>
				</div>
			</form>
		</div>
	</script>
	<!--修改分店弹出层结束-->
<?php echo $this -> fun_fetch('inc_foot', ''); ?>
	<script src="http://api.map.baidu.com/api?v=2.0&ak=LxI9Y9IBOKmglxZlF5128gcb51Pnz0WL" type="text/javascript"></script>
	<script>
	layui.use(["layer", "element", "laytpl", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objlaytpl = layui.laytpl;
		var objform = layui.form;
		objform.verify({
		  xy: function(strvalue, objitem) { //value：表单的值、item：表单的DOM对象
		    if(strvalue == 0 || strvalue == '' || strvalue == void(0) || strvalue == null) {
		    	return '必须选定一个区域';
		    }
		  }
		});
		$(".laimi-edit").on("click", function() {
			$.getJSON('system_shop_edit_ajax.php', {id:$(this).val()}, function(objshop) {
				$.getJSON("pub_shi_ajax.php", {id:objshop.shop_area_sheng}, function(objshi) {
					objshop.myshi = objshi;
					objlaytpl($("#laimi-script-edit").html()).render(objshop, function(strhtml) {
						objlayer.open({
							type: 1,
							title: ["修改分店", "font-size:16px;"],
							btnAlign: "r",
							area: ["680px", "auto"],
							shadeClose: true,	//点击遮罩关闭
							content: strhtml,
							success: function() {
								var objpoint = {
									jing: objshop.shop_area_jing,
									wei: objshop.shop_area_wei
								}
								var objmap = map_create("map", objpoint);
								var objselect1 = $('#laimi-modal-edit select[name="txtsheng"]');
								var objselect2 = $('#laimi-modal-edit select[name="txtshi"]');
								objform.render(null, 'laimi-form-edit');
								
								objform.on("select(sheng)", function(obj) {
					  			objselect2.empty();
					  			$.getJSON("pub_shi_ajax.php", {id:obj.value}, function(objshi) {
					  				objselect2.append("<option value=''>请选择市</option>");
					  				$.each(objshi, function(intkey, objitem) {
					  					objselect2.append("<option value='" + objitem.region_id + "'>" + objitem.region_name + "</option>");
					  				});
					  				objform.render(null, "laimi-form-edit");
					  			});
					  			map_change(objmap, $(this).text(), 8);
					  		});
					  		objform.on('select(shi)', function(obj){
					  			if($(this).text() != "" && $(this).text() != "市辖区" && $(this).text() != "县") {
					  				map_change(objmap, $(this).text(), 12);
					  			}
					  		});
					  		map_point(objmap, objpoint);
					  		objmap.addEventListener("click", function(e) {
							    objmap.clearOverlays();//清空原来的标注
							    map_point(objmap, {jing:e.point.lng, wei:e.point.lat});
							    $('#laimi-modal-edit input[name="txtjing"]').val(e.point.lng);
							    $('#laimi-modal-edit input[name="txtwei"]').val(e.point.lat);
								});
							}
						});
					});
				});
			});
		});
		objform.on("submit(laimi-submit-edit)", function(objdata) {
			$.post('system_shop_edit_do.php', objdata.field, function(strdata) {
				if(strdata == 0) {
					window.location.reload();
				} else {
					objlayer.alert('修改分店失败，请联系管理员！', {
						title: '提示信息'
					});
				}
			})
			return false;
		});
		// 设置总店
		$('.laimi-center').on('click', function(){
			var strid = $(this).attr('shopid');
			objlayer.confirm('确定将该店铺设置成总店吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('system_shop_center_do.php', {id:strid}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else {
			  		objlayer.alert('设置总店失败，请联系管理员！', {
			  			title: '提示信息'
			  		});
			  	}
			  })
			  objlayer.close(hindex);
			});
		});
		function map_create(strid, objpoint) {
			var map = new BMap.Map(strid);
			var jing = objpoint.jing != 0 ? objpoint.jing : 116.404;
			var wei = objpoint.wei != 0 ? objpoint.wei : 39.915;
			map.centerAndZoom(new BMap.Point(jing, wei), 15);
			map.enableScrollWheelZoom(true);
			return map;
		}
		function map_change(objmap, strname, intlevel){
		  objmap.centerAndZoom(strname, intlevel);
		}
		function map_point(objmap, objpoint) {
			var name = $('#laimi-modal-edit input[name="txtname"]').val() || "店铺";
			var jing = objpoint.jing != 0 ? objpoint.jing : 116.404;
			var wei = objpoint.wei != 0 ? objpoint.wei : 39.915;
			var point = new BMap.Point(jing,wei);
			var marker = new BMap.Marker(point);  // 创建标注
			objmap.addOverlay(marker);               // 将标注添加到地图中
			marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
			var opts = {
		    position: point,    // 指定文本标注所在的地理位置
		    offset: new BMap.Size(-20, 0)    //设置文本偏移量
		  }
			var label = new BMap.Label(name, opts);  // 创建文本标注对象
		  label.setStyle({
		    color: "#000000",
		    fontSize: "13px",
		    height: "20px",
		    lineHeight: "20px",
		    fontFamily: "微软雅黑",
		    border: 'none',
		    boxShadow: '4px 4px 4px #888888',
		    padding: '1px 5px',
		    borderRadius: '5px'
		  });
			objmap.addOverlay(label);
		}
	});
</script>
</body>
</html>