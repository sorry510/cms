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
						<a href="act_batch.php">批量营销</a>
					</li>
					<li>
						<a href="act_batch_weixin.php">微信营销记录</a>
					</li>
					<li class="layui-this">
						<a href="act_batch_sms.php">短信营销记录</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-batch-sms layui-tab-content">
<form class="layui-form">		    
	<div class="laimi-tools layui-form-item">		  	
		<label class="layui-form-label">活动名称</label>
		<div class="layui-input-inline">
			<input class="layui-input" type="text" name="name">
		</div>
		<label class="layui-form-label">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label">至</label>
		<div class="layui-input-inline last">
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
			<th>日期</th>
			<th>活动名称</th>
			<th>短信内容</th>
			<th>发送人数</th>
		</tr> 
	</thead>
	<tbody>
		<tr>
			<td>1970-8-23 16:25</td>
			<td>国庆节微信优惠券活动</td>
			<th>微信推送、短信通知</th>
			<td>50人</td>
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
	layui.use(["element", "laydate", "laypage"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
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
	});
	</script>
</body>
</html>