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
						<a href="mgoods.php">通用商品管理</a>
					</li>
					<li>
						<a href="mgoods_catalog.php">商品分类</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-mgoods layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<label class="layui-form-label">选择分类</label>
		<div class="layui-input-inline">
			<select name="catalog">
				<option value="">全部</option>
        <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
        <option value="<?php echo $row['mgoods_catalog_id'] ?>"<?php if($row['mgoods_catalog_id'] == $GLOBALS['intcatalog']) echo " selected"; ?>><?php echo $row['mgoods_catalog_name'] ?></option>
        <?php } ?>
			</select>
		</div>
		<label class="layui-form-label">商品</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="key" value="<?php echo htmlspecialchars($GLOBALS['strkey']); ?>" placeholder="商品名称/编码/简拼">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>分类</th>
			<th>名称</th>
			<th>编码</th>
			<th>商品价格</th>
			<th>会员价格</th>
			<th>类型</th>
			<th>活动</th>
			<th>预约</th>
			<th>状态</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['mgoods_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['mgoods_catalog_name']; ?></td>
      <td><?php echo $row['mgoods_name']; ?></td>
      <td><?php echo $row['mgoods_code']; ?></td>
      <td>￥<?php echo $row['mgoods_price'] + 0; ?></td>
			<td><?php echo $row['mycprice']; ?></td>
			<td><?php echo $row['mytype']; ?></td>
			<td><?php echo $row['myact']; ?></td>
			<td><?php echo $row['myreserve']; ?></td>
			<td><?php echo $row['mystate']; ?></td>
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
	<script src="../js/pinying.js"></script>
	<script>
	layui.use(["layer", "element", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['mgoods_list']['allcount']; ?>,
			limit: 50,
			curr: <?php echo $this->_data['mgoods_list']['pagenow']; ?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				if(!first) {
					window.location = "mgoods.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + obj.curr;
				}
			}
		});
	});
	</script>
</body>
</html>