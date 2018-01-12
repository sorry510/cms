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
					<li>
						<a href="worker.php?state=1">员工管理</a>
					</li>
					<li>
						<a href="worker.php?state=2">离职员工</a>
					</li>
					<li class="layui-this">
						<a href="worker_group.php">员工分组</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker-group layui-tab-content">
<table class="layui-table">
	<thead>
		<tr>
			<th>分组名称</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['worker_group_list'] as $row) { ?>
		<tr>
			<td><?php echo $row['worker_group_name']?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
	});
	</script>
</body>
</html>