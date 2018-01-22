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
            <a href="tongji_all.php">基础销售统计</a>
          </li>
          <li class="layui-this">
            <a href="tongji_goods.php">商品销售排名</a>
          </li>
          <li>
            <a href="tongji_business.php">营业收入对比</a>
          </li>
          <li>
            <a href="tongji_income.php">新增会员曲线</a>
          </li>
        </ul>
				<div id="laimi-main" class="p-tongji-goods layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">商品</label>
		<div class="layui-input-inline">
			<select name="goods_id">
				<option value="">全部商品</option>
				<optgroup label="多店通用商品">
					<?php foreach($this->_data['mgoods'] as $row) { ?>
					<option value="<?php echo '1,'.$row['mgoods_id'];?>" <?php if('1,'.$row['mgoods_id'] == $this->_data['request']['goods']){
        echo "selected" ;}?>><?php echo $row['mgoods_name'];?></option>
					<?php };?>
				</optgroup>
				<optgroup label="单店商品">
					<?php foreach($this->_data['sgoods'] as $row) { ?>
					<option value="<?php echo '2,'.$row['sgoods_id'];?>" <?php if('2,'.$row['sgoods_id'] == $this->_data['request']['goods']){
        echo "selected" ;}?>><?php echo $row['sgoods_name'];?></option>
					<?php };?>
				</optgroup>
			</select>
		</div>
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>">
		</div>
		<label class="layui-form-label laimi-input">至</label>
		<div class="layui-input-inline">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>">
		</div>
		<label class="layui-form-label">排序</label>
		<div class="layui-input-inline last" style="width:100px;">
			<select name="count">
				<option value="1" <?php if(1 == $this->_data['request']['count']){
        echo "selected" ;}?>>按金额</option>
				<option value="2" <?php if(2 == $this->_data['request']['count']){
        echo "selected" ;}?>>按销量</option>
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
			<th>排名</th>
			<th>商品类型</th>
			<th>商品编码</th>
			<th>商品名称</th>
			<th>价格</th>
			<th>会员价</th>
			<th>销售量</th>
			<th>销售额</th>
			<th>分店</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['goods_count_list']['list'] as $key=>$row) { ?>
		<tr>
			<td>第<?php echo $key+1;?>名</td>
			<td><?php echo $row['goods_type'];?></td>
			<td><?php echo $row['goods_code'];?></td>
			<td><?php echo $row['goods_name'];?></td>
			<td>¥<?php echo $row['goods_price'];?></td>
			<td>¥<?php echo $row['goods_cprice'];?></td>
			<td><?php echo $row['sales_count'];?></td>
			<td>¥<?php echo $row['sales_volume'];?></td>
			<td><?php echo $row['shop_name'];?></td>
		</tr>
		<?php };?>
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
	layui.use(["element", "laydate", "laypage", "form"], function() {
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
			count: <?php echo $this->_data['goods_count_list']['allcount'];?>,
			limit: 25,
			curr: <?php echo $this->_data['goods_count_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next', 'skip'],
			jump: function(obj, first) {
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