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
						<a href="mgoods.php">计时套餐</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<label class="layui-form-label">商品</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="商品名称/编码/简拼">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a href="mcombo_time_edit.php" class="layui-btn">新增计时套餐</a>
		</div>
	</div>
</form>
<form class="layui-form">
<table class="layui-table">
	<thead>
		<tr>
			<th>套餐名称</th>
			<th>编码</th>
			<th>商品价格</th>
			<th>会员价格</th>
			<th>有效期</th>
			<th>活动</th>
			<th>预约</th>
			<th>状态</th>
			<th width="180">操作</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>康师傅绿茶500ml</td>
			<td>2154884115</td>
			<td>¥35.00</td>
			<td>¥25.00</td>
			<td>180天</td>
			<td><i class="layui-icon" style="font-size: 20px; color: #CCCCCC;">&#x1007;</i></td>
			<td><i class="layui-icon" style="font-size: 20px; color: #1E9FFF;">&#x1007;</i></td>
			<td>正常</td>
			<td>
				<a class="layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</a>
				<a class="layui-btn layui-btn-danger layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-shanchu1"></use></svg>
					停用
				</a>
				<a class="layui-btn layui-btn-primary layui-btn-mini">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
					删除
				</a>
			</td>
		</tr>
	</tbody>
</table>
</form>
<div class="laimi-fenye">
	<div id="demo7"></div>
</div>
				</div>
			</div> 
		</div>
	</div>	
<?php echo $this->fun_fetch('inc_foot', ''); ?>
<script>
layui.use(["element", "form"], function() {
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