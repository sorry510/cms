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
						<a href="store.php">入库和出库</a>
					</li>
					<li>
						<a href="store_add.php">新增入库/出库</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-store layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" name="from" value="<?php echo $GLOBALS['strfrom']; ?>">
		</div>
		<label class="layui-form-label laimi-input" style="width:0;margin-right:10px;">至</label>
		<div class="layui-input-inline last">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" name="to" value="<?php echo $GLOBALS['strfrom']; ?>">
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
		<?php foreach($this->_data['store_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['mytime']; ?></td>
			<td class="laimi-color-ju"><?php echo $row['mytype']; ?></td>
			<td>¥<?php echo $row['store_money'] + 0; ?></td>
			<td><?php echo $row['store_operator']; ?></td>
			<td><?php echo $row['store_memo']; ?></td>
			<td><?php echo $row['mystate']; ?></td>
			<td>
				<?php if($row['store_state'] == 1) { ?>
				<button class="layui-btn layui-btn-mini laimi-edit" type="button" onclick="window.location='store_edit.php?id=<?php echo $row['store_id']; ?>'">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button type="button" class="layui-btn layui-btn-primary layui-btn-mini laimi-del" store_id="<?php echo $row['store_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
				</button>
				<button type="button" class="layui-btn layui-btn-mini laimi-sure" store_id="<?php echo $row['store_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					确认
				</button>
				<?php } ?>
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
	layui.use(["layer", "element", "laydate", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['store_list']['allcount']; ?>,
			limit: 50,
			curr: <?php echo $this->_data['store_list']['pagenow']; ?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				if(!first) {
					window.location = "store.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + obj.curr;
      	}
			}
		});
		$(".laimi-del").on("click", function() {
			var strid = $(this).attr("store_id");
			objlayer.confirm('确定要删除该库存记录吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('store_delete_do.php', {id:strid}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else {
			  		objlayer.alert('删除库存记录失败，请联系管理员！', {
			  			title: '提示信息'
			  		});
			  	}
			  });
			  objlayer.close(hindex);
			});
		});
		$('.laimi-sure').on('click', function() {
			var strid = $(this).attr("store_id");
			objlayer.confirm('确定要确认该库存记录吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('store_state_do.php', {id:strid}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else {
			  		objlayer.alert('确认库存记录失败，请联系管理员！', {
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