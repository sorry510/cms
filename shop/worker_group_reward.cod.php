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
			<th width="100">本店提成</th>
			<th width="100">同步总店</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['group_reward_list'] as $row){?>
		<tr>
			<td><?php echo $row['worker_group_name'];?></td>
			<td>
				<a href="worker_group_reward_edit.php?id=<?php echo $row['worker_group_id']; ?>" class="layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					本店提成方案
				</a>
			</td>
			<td>
				<button type="button" class="layui-btn layui-btn-mini layui-btn-normal laimi-sync" value="<?php echo $row['worker_group_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tongbu"></use></svg>
					同部总店提成方案
				</button>
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
	layui.use(["element", "layer"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		$(".laimi-sync").on('click', function(){
			var id = $(this).val();
			objlayer.confirm('你确定要同步总店数据吗', {icon: 0, title:'提示', shadeClose: true}, function(index){
			  $.post('worker_reward_sync_do.php', {id:id}, function(res){
			  	if(res == 0){
			  		objlayer.msg('同步成功');
			  	}else if(res == 1){
			  		objlayer.alert('总店没有设置，无法同步', {
			  			title: '提示信息'
			  		});
			  	}else{
			  		objlayer.alert('同步失败，请联系管理员', {
			  			title: '提示信息'
			  		});
			  	}
			  })
			  objlayer.close(index);
			});
		})
	});
	</script>
</body>
</html>