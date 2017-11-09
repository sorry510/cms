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
						<a href="#">员工提成统计</a>
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
		<label class="layui-form-label laimi-input">日期</label>
	      <div class="layui-input-inline">
	        <input type="text" class="layui-input laimi-input-100" id="test1" placeholder="yyyy-MM-dd">
	      </div>
	      <label class="layui-form-label laimi-input" style="width: 0px;margin-right:10px">至</label>
	      <div class="layui-input-inline">
	        <input type="text" class="layui-input laimi-input-100" id="test2" placeholder="yyyy-MM-dd">
	      </div>
		<label class="layui-form-label">员工</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="姓名/编号">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th rowspan="2">排名</th>
			<th rowspan="2">员工姓名</th>
			<th rowspan="2">分组</th>
			<th colspan="2">办卡</th>
			<th colspan="2">充值</th>
			<th colspan="2">服务</th>
			<th colspan="2">商品</th>
			<th colspan="2">导购</th>
			<th rowspan="2">基本工资</th>
			<th rowspan="2">合计工资</th>
			<th rowspan="2">分店</th>
		</tr>
		<tr>
			<th>数量</th>
			<th>提成</th>
			<th>金额</th>
			<th>提成</th>
			<th>次数</th>
			<th>提成</th>
			<th>数量</th>
			<th>提成</th>
			<th>次数</th>
			<th>提成</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>20</td>
			<td>张小宇</td>
			<td>理疗师</td>
			<td>20</td>
			<td>¥100</td>	
			<td>¥25000</td>
			<td>¥100</td>	
			<td>80</td>
			<td>¥100</td>	
			<td>200</td>
			<td>¥100</td>	
			<td>25</td>
			<td>¥1000</td>
			<td>¥3000</td>
			<td>¥2500</td>
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
		$("#laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增操作员", "font-size:16px;"],
				btnAlign: "r",
				area: ["800px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-modal-add")
			});
		});
		objform.on("submit(laimi-submit)", function(data) {
			objlayer.alert(JSON.stringify(data.field), {
				title: '提示信息'
			});
			return false;
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