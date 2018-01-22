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
						<a href="store_info_mgoods.php">通用商品库存</a>
					</li>
					<li>
						<a href="store_info_sgoods.php">单店商品库存</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-store-info layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择分店</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分店</option>
				<?php foreach($GLOBALS['gshop'] as $row) { ?>
        <option value="<?php echo $row['shop_id'] ?>"<?php if($row['shop_id'] == $GLOBALS['intshop']) echo " selected"; ?> ><?php echo $row['shop_name']; ?></option>
        <?php } ?>
			</select>
		</div>
		<label class="layui-form-label">搜索</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200 laimi-focus" type="text" name="key" placeholder="商品名称/简拼/编码" value="<?php echo htmlspecialchars($GLOBALS['strkey']); ?>">
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
			<th>商品名称</th>
			<th>编码</th>
			<th>价格</th>
			<th>会员价</th>
			<th>库存</th>
			<th>分店</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['store_info_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['mgoods_catalog_name']; ?></td>
			<td><?php echo $row['mgoods_name']; ?></td>
			<td><?php echo $row['mgoods_code']; ?></td>
			<td>￥<?php echo $row['mgoods_price'] + 0; ?></td>	
			<td><?php echo $row['mycprice']; ?></td>
			<td><?php echo $row['store_info_count']; ?></td>
			<td><?php echo $row['shop_name']; ?></td>
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
	layui.use(["layer", "element", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;

		$('.laimi-focus').focus();
		
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['store_info_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['store_info_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				if(!first) {
					window.location = "store_info_mgoods.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + obj.curr;
				}
			}
		});
	});
	</script>
</body>
</html>