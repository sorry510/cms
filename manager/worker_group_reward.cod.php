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
						<a href="worker_group_reward.php">员工提成方案</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker-group-reward layui-tab-content">
<table class="layui-table">
	<thead>
		<tr>
			<th>分组</th>
			<th width="100">操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['group_reward_list'] as $row){?>
		<tr>
			<td><?php echo $row['worker_group_name'];?></td>
			<td>
				<a href="worker_group_reward_edit.php?id=<?php echo $row['worker_group_id'];?>" class="layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					提成方案
				</a>
			</td>
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
	layui.use(["element"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
	});
	</script>
</body>
</html>