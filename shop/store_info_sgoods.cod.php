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
						<a href="store_info_mgoods.php">通用商品库存</a>
					</li>
					<li class="layui-this">
						<a href="store_info_sgoods.php">单店商品库存</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择分店</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分店</option>
				<option value="东风路分店">东风路分店</option>
				<option value="王城路分店">王城路分店</option>
				<option value="九都路分店">九都路分店</option>
			</select>
		</div>
		<label class="layui-form-label">选择分类</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分类</option>
				<option value="东风路分店">东风路分店</option>
				<option value="王城路分店">王城路分店</option>
				<option value="九都路分店">九都路分店</option>
			</select>
		</div>
		<label class="layui-form-label">搜索</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="商品名称/简拼/编码">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
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
		<tr>
			<td>饮料</td>
			<td>康师傅绿茶500ml</td>
			<td>10124534</td>
			<td>¥35.00</td>	
			<td>¥18.00</td>
			<td>100</td>
			<td>东风路分店</td>
		</tr>
		<tr>
			<td>饮料</td>
			<td>康师傅绿茶500ml</td>
			<td>10124534</td>
			<td>¥35.00</td>	
			<td>¥25.00</td>
			<td>80</td>
			<td>东风路分店</td>
		</tr>
	</tbody>
</table>
<div class="laimi-fenye">
	<div id="demo7"></div>
</div>
				</div>
			</div> 
		</div>
</div>	
<?php echo $this->fun_fetch('inc_foot', ''); ?>
<script>
layui.use(["element", "layer", "form"], function() {
	var $ = layui.jquery;
	var objlayer = layui.layer;
	var objelement = layui.element;
	var objform = layui.form;
});
</script>
<script>
//分页
layui.use(['laypage', 'layer'], function(){
var laypage = layui.laypage
,layer = layui.layer;

//自定义首页、尾页、上一页、下一页文本
laypage.render({
elem: 'demo7'
,count: 60
,limit:50
,layout: ['count', 'prev', 'page', 'next', 'skip']
,jump: function(obj){
console.log(obj)
}
});

});
</script>
</body>
</html>