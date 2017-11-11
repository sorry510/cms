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
						<a href="store.php">入库和入库</a>
					</li>
					<li>
						<a href="store_add.php">新增出库/入库</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" name="from" value="<?php echo $this->_data['request']['from']; ?>">
		</div>
		<label class="layui-form-label laimi-input" style="width: 0px;margin-right:10px">至</label>
		<div class="layui-input-inline last">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" name="to" value="<?php echo $this->_data['request']['to']; ?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a href="store_add.php" class="layui-btn">新增出库/入库</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>时间</th>
			<th>类型</th>
			<th>金额</th>
			<th>经办人</th>
			<th>备注</th>
			<th>状态</th>
			<th width="180">操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['store_list']['list'] as $row){ ?>
		<tr>
			<td><?php echo $row['time']; ?></td>
			<td class="laimi-color-ju"><?php echo $row['type']; ?></td>
			<td>¥<?php echo $row['store_money']; ?></td>
			<td><?php echo $row['store_operator']; ?></td>
			<td><?php echo $row['store_memo']; ?></td>
			<td><?php echo $row['state']; ?></td>
			<td>
				<button type="button" class="layui-btn layui-btn-mini laimi-sure" value="<?php echo $row['store_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					确认
				</button>
				<button type="button" class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['store_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button type="button" class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['store_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
				</button>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<div class="laimi-page">
	<div id="laimi-page-content"></div>
</div>
				</div>
			</div>
		</div>
	</div>	
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "upload", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objupload = layui.upload;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-birthday'
		});
		objdate.render({
			elem: '#laimi-join'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: 50,
			limit: 50,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj) {
				//console.log(obj)
			}
		});
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});	
	});
	</script>
</body>
</html>