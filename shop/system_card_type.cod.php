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
						<a href="system_card_type.php">会员卡分类</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-card_type layui-tab-content">
<table class="layui-table">
	<thead>
		<tr>
			<th>分类名称</th>
			<th>卡折扣</th>
			<th>备注</th>
		</tr>
  </thead>
	<tbody>
		<?php foreach ($this->_data['card_type'] as $row) { ?>
		<tr>
			<td><?php echo $row['card_type_name'] ;?></td>
			<td><?php echo $row['card_type_discount'] ;?>折</td>
			<td><?php echo $row['card_type_memo'] ;?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
				</div>
			</div>
		</div>
</div>	
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		
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