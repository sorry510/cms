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
						<a href="store_info.php?type=1">通用商品库存</a>
					</li>
					<li>
						<a href="store_info.php?type=2">单店商品库存</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-store-info layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择分类</label>
		<div class="layui-input-inline">
			<select name="catalog">
				<option value="">全部分类</option>
				<?php if($this->_data['request']['type'] == 1){ ?>
					<?php foreach($this->_data['catalog_list'] as $row) { ?>
					<option value="<?php echo $row['mgoods_catalog_id'] ?>" <?php if($row['mgoods_catalog_id'] == $this->_data['request']['catalog']){echo "selected";} ?> ><?php echo $row['mgoods_catalog_name'] ?></option>
					<?php } ?>
				<?php }else if($this->_data['request']['type'] == 2){ ?>
					<?php foreach($this->_data['catalog_list'] as $row) { ?>
					<option value="<?php echo $row['sgoods_catalog_id'] ?>" <?php if($row['sgoods_catalog_id'] == $this->_data['request']['catalog']){echo "selected";} ?> ><?php echo $row['sgoods_catalog_name'] ?></option>
					<?php } ?>
				<?php } ?>
			</select>
		</div>
		<label class="layui-form-label">搜索</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="search" placeholder="商品名称/简拼/编码" value="<?php echo $this->_data['request']['search']?>">
			<input class="layui-input laimi-input-200" type="hidden" name="type" value="<?php echo $this->_data['request']['type']?>">
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
		</tr>
	</thead>
	<tbody>
	<?php if($this->_data['request']['type'] == 1){ ?>
		<?php foreach($this->_data['store_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['mgoods_catalog_name']; ?></td>
			<td><?php echo $row['mgoods_name']; ?></td>
			<td><?php echo $row['mgoods_code']; ?></td>
			<td>¥<?php echo $row['mgoods_price']; ?></td>	
			<td><?php echo $row['mgoods_cprice'] != 0 ? '¥'.$row['mgoods_cprice'] : '--'; ?></td>
			<td><?php echo $row['store_info_count']; ?></td>
		</tr>
		<?php } ?>
	<?php }else if($this->_data['request']['type'] == 2){ ?>
		<?php foreach($this->_data['store_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['sgoods_catalog_name']; ?></td>
			<td><?php echo $row['sgoods_name']; ?></td>
			<td><?php echo $row['sgoods_code']; ?></td>
			<td>¥<?php echo $row['sgoods_price']; ?></td>	
			<td><?php echo $row['sgoods_cprice'] != 0 ? '¥'.$row['sgoods_cprice'] : '--'; ?></td>
			<td><?php echo $row['store_info_count']; ?></td>
		</tr>
		<?php } ?>
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
	layui.use(["element", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['store_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['store_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first){
				var search = "<?php echo api_value_query($this->_data['request']); ?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
	});
	</script>
</body>
</html>