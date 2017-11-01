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
						<a href="act_discount.php">限时打折</a>
					</li>
					<li>
						<a href="act_discount.php?expire=1">已结束</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-discount layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">活动名称</label>
		<div class="layui-input-inline">
			<input class="layui-input" type="text" name="txtname">
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
		<div class="laimi-float-right">
			<a class="layui-btn" href="act_discount_add.php">新增打折活动</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>日期</th>
			<th>名称</th>
			<th>类型</th>
			<th>开始时间</th>
			<th>结束时间</th>
			<th>备注</th>
			<th>状态</th>
			<th width="130">操作</th>
		</tr> 
  </thead>
	<tbody>
		<tr>
			<td>2017-12-18 12:40</td>
			<td>国庆节8折活动</td>
			<td>非会员</td>
			<td>2017-10-1</td>
			<td>2017-10-8</td>
			<td>备注信息</td>
			<td>已结束</td>
			<td></td>
		</tr>
		<tr>
			<td>2017-12-18 12:40</td>
			<td>国庆节8折活动</td>
			<td>非会员</td>
			<td>2017-10-1</td>
			<td>2017-10-8</td>
			<td>备注信息</td>
			<td class="laimi-color-lv">活动中</td>
			<td>
				<button class="layui-btn layui-bg-red layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
					停止
				</button>
			</td>
		</tr>
		<tr>
			<td>2017-12-18 12:40</td>
			<td>国庆节8折活动</td>
			<td>非会员</td>
			<td>2017-10-1</td>
			<td>2017-10-8</td>
			<td>备注信息</td>
			<td class="laimi-color-huang">未开始</td>
			<td>
				<button class="layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
				</button>
			</td>
		</tr>
		<tr>
			<td>2017-12-18 12:40</td>
			<td>国庆节8折活动</td>
			<td>非会员</td>
			<td>2017-10-1</td>
			<td>2017-10-8</td>
			<td>备注信息</td>
			<td class="laimi-color-ju">已停止</td>
			<td>
				<button class="layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-bg-blue layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-dui"></use></svg>
					启用
				</button>
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
	layui.use(["element", "laydate", "laypage", "layer"], function() {
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