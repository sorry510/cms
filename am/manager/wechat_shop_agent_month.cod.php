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
						<a href="wechat_shop_agent_month.php">本月佣金</a>
					</li>
					<li>
						<a href="#">所有佣金</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">搜索</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="姓名/手机号码">
		</div>
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label laimi-input" style="width: 0px;margin-right:10px">至</label>
		<div class="layui-input-inline">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>年月</th>
			<th>姓名</th>
			<th>手机号码</th>			
			<th>未提现佣金</th>
			<th>累计佣金</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2017-10</td>
			<td><a href="#" class="laimi-color-lan">刘小宇</a></td>
			<td>13623145678</td>			
			<td class="laimi-color-ju">¥250.00</td>
			<td>¥2500.00</td>
			<td>
				<a class="layui-btn layui-btn-mini" id="ask1">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					提现
				</a>
			</td>
		</tr>
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
	layui.use(["element", "laydate", "laypage", "upload", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objupload = layui.upload;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-birthday'
		});
		objdate.render({
			elem: '#laimi-join'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: 50,
			limit: 50,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj) {
				//console.log(obj)
			}
		});
		objupload.render({
			elem: '#laimi-photo',
			url: '/upload/',
			accept: 'jpg|png',
			size: 1024, //限制文件大小，单位 KB
			done: function(res) {
			  console.log(res);
			}
	  });
	  objupload.render({
			elem: '#laimi-identity',
			url: '/upload/',
			accept: 'jpg|png',
			size: 1024, //限制文件大小，单位 KB
			done: function(res) {
			  console.log(res);
			}
	  });
		//询问框
		$("#ask1").on("click", function() {
		layer.confirm('是否全部提现？', {
		  btn: ['全部提现','暂不提现','取消'] //按钮
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
</body>
</html>