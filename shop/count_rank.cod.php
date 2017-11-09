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
						<a href="count.php">基础销售统计</a>
					</li>
					<li class="layui-this">
						<a href="count_rank.php">商品销售排名</a>
					</li>
					<li>
						<a href="count_business.php">营业数据曲线</a>
					</li>
					<li>
						<a href="count_income.php">收入组成曲线</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择分店</label>
		<div class="layui-input-inline" style="width:140px;">
			<select name="shop">
				<option value="">全部分店</option>
				<option value="东风路分店">东风路分店</option>
				<option value="王城路分店">王城路分店</option>
				<option value="九都路分店">九都路分店</option>
			</select>
		</div>
		<label class="layui-form-label">商品</label>
		<div class="layui-input-inline" style="width:140px;">
			<select name="shop">
				<option value="">全部商品</option>
				<option value="东风路分店">收银员</option>
				<option value="王城路分店">技师</option>
				<option value="九都路分店">理发师</option>
			</select>
		</div>
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input type="text" class="layui-input laimi-input-100" id="test1" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label laimi-input" style="width: 0px;margin-right:10px">至</label>
		<div class="layui-input-inline">
			<input type="text" class="layui-input laimi-input-100" id="test2" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label">排序</label>
		<div class="layui-input-inline last" style="width:100px;">
			<select name="shop">
				<option value="按销售额">按金额</option>
				<option value="按销售量">按销量</option>
			</select>
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
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
		<tr>
			<td>第1名</td>
			<td>通用商品</td>
			<td>13623145678</td>
			<td>霸王洗发露</td>
			<td>¥25.00</td>
			<td>¥18.00</td>
			<td>201</td>
			<td>¥25004.00</td>
			<td>东风路分店</td>
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
<script>
layui.use('laydate', function(){
  var laydate = layui.laydate;    
  //常规用法
  laydate.render({
    elem: '#test1'
  });
  //常规用法
  laydate.render({
    elem: '#test2'
  });
});
</script>		
</body>
</html>