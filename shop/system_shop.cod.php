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
					<li class="layui-this">
						<a href="system_shop.php">分店管理</a>
					</li>
					<li>
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
			<th width="70">操作</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>河南省</td>
			<td>郑州市</td>
			<td>东风路分店</td>
			<td style="text-align:left;">
				<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-weizhi"></use></svg>大学科技园研发5号楼A座1000
			</td>
			<td>0379-68124487</td>
			<td>5</td>
			<td>2016-12-31</td>
			<td>--</td>
			<td>
				<a class="laimi-edit layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</a>
			</td>
		</tr>
	</tbody>
</table>
				</div>
			</div>
		</div>
	</div>
	<!--修改分店弹出层开始-->
	<div id="laimi-modal-edit" class="laimi-modal">
		<form class="layui-form">
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 店铺名称</label>
				<div class="layui-input-block">
					<input type="text" name="txttitle" class="layui-input laimi-input-300">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">联系电话</label>
				<div class="layui-input-block">
					<input type="text" name="txtphone" class="layui-input laimi-input-300"">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 店铺区域</label>
				<div class="layui-input-inline">
					<select name="txtsheng">
						<option value="">请选择省</option>
						<option value="浙江" selected>浙江省</option>
						<option value="江西">江西省</option>
						<option value="福建">福建省</option>
					</select>
				</div>
				<div class="layui-input-inline">
					<select name="txtshi">
						<option value="">请选择市</option>
						<option value="杭州">杭州</option>
						<option value="宁波">宁波</option>
						<option value="温州">温州</option>
						<option value="台州">台州</option>
						<option value="绍兴">绍兴</option>
					</select>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 店铺地址</label>
				<div class="layui-input-block">
					<input type="text" name="txtaddress" class="layui-input laimi-input-b80">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 地图标注</label>
				<div class="layui-input-block">
					<textarea class="layui-textarea" placeholder="地图标注" style="width:95%; height:200px;"></textarea>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>
						完成
					</button>
					<button class="layui-btn layui-btn-primary" type="reset">
						重置
					</button>
				</div>
			</div>
			<div class="laimi-height-20">				
			</div>
		</form>
	</div>
	<!--修改分店弹出层结束-->
<?php echo $this -> fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		$(".laimi-edit").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["修改分店", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-modal-edit")
			});
		});
		objform.on("submit(laimi-submit)", function(data) {
			objlayer.alert(JSON.stringify(data.field), {
				title: '提示信息'
			});
			return false;
		});
	});
	</script>
</body>
</html>