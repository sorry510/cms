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
						<a href="group_reward.php">员工提成方案</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker-group-reward layui-tab-content">
<table class="layui-table">
	<thead>
		<tr>
			<th>分组</th>
			<th width="100">本店提成</th>
			<th width="100">同步总店</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['worker_group_list'] as $row) { ?>
		<tr>
			<td><?php echo $row['worker_group_name']; ?></td>
			<td>
				<a class="layui-btn layui-btn-mini" href="group_reward_edit.php?id=<?php echo $row['worker_group_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					本店提成方案
				</a>
			</td>
			<td>
				<button class="layui-btn layui-btn-mini layui-btn-normal laimi-tongbu" type="button" value="<?php echo $row['worker_group_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tongbu"></use></svg>
					同步总店提成方案
				</button>
			</td>
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
	layui.use(["layer", "element"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		$(".laimi-tongbu").on('click', function() {
			var strid = $(this).val();
			objlayer.confirm('确定要同步总店提成方案吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('group_reward_tongbu_do.php', {id:strid}, function(strdata) {
			  	if(strdata == 0) {
			  		objlayer.msg('同步总店提成方案成功！');
			  	} else if(strdata == 2) {
			  		objlayer.alert('总店没有设置相应提成方案！', {
			  			title: '提示信息'
			  		});
			  	} else {
			  		objlayer.alert('同步失败，请联系管理员！', {
			  			title: '提示信息'
			  		});
			  	}
			  });
			  objlayer.close(hindex);
			});
		});
	});
	</script>
</body>
</html>