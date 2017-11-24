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
						<a href="sgoods.php">单店商品管理</a>
					</li>
					<li class="layui-this">
						<a href="sgoods_catalog.php">商品分类</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-sgoods-catalog layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择店铺</label>
		<div class="layui-input-inline">
			<select name="shop_id">
				<option value="0">全部</option>
        <?php foreach($this->_data['shop_list'] as $row) { ?>
        <option value="<?php echo $row['shop_id']; ?>" <?php if($row['shop_id'] == $this->_data['request']['shop_id']){
        echo "selected" ;}?> ><?php echo $row['shop_name']; ?></option>
        <?php } ;?>
			</select>
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>分类名称</th>
			<th>店铺</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['sgoods_catalog_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['sgoods_catalog_name']; ?></td>
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
	layui.use(["element", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['sgoods_catalog_list']['allcount'];?>,
			limit: 25,
			curr: <?php echo $this->_data['sgoods_catalog_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj,first) {
				var search = "<?php echo api_value_query($this->_data['request']);?>";
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