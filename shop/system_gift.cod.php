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
						<a href="system_score.php">积分换礼</a>
					</li>
					<li class="layui-this">
						<a href="system_gift.php">礼品管理</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-gift layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label laimi-input">礼品名称</label>
		<div class="layui-input-inline last">
			<input class="layui-input" type="text" name="name" placeholder="输入礼品名称" value="<?php echo $this->_data['request']['name'];?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>新增日期</th>
			<th>名称</th>
			<th>积分</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['gift_list'] as $row){?>
		<tr>
			<td><?php echo $row['atime'];?></td>
			<td><?php echo $row['gift_name'];?></td>
			<td><?php echo $row['gift_score'];?>分</td>
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
	});
	</script>
</body>
</html>