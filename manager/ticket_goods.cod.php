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
						<a href="ticket_goods.php">体验券管理</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-ticket_goods layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">体验券名称</label>
		<div class="layui-input-inline">
			<input class="layui-input" type="text" name="name">
		</div>
    <label class="layui-form-label">日期</label>
    <div class="layui-input-inline">
      <input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd">
    </div>
    <label class="layui-form-label">至</label>
    <div class="layui-input-inline last">
      <input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd">
    </div>
    <div class="layui-input-inline">
     	<button class="layui-btn layui-btn-normal">搜索</button>
  	</div>
    <div class="laimi-float-right">
    	<a id="laimi-add" class="layui-btn">新增体验券</a>
  	</div>
  </div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th width="130">日期</th>
			<th>名称</th>
			<th>面值</th>
			<th>体验内容</th>
			<th>有效期</th>
			<th>开始时间</th>
			<th>备注</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2017-12-18 12:40</td>
			<td>测试检验券</td>
			<td>20元</td>
			<td>洗头</td>
			<td>30天</td>
			<td>当天可用</td>
			<td>东风路分店</td>
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
	</tbody>
</table>
<div class="laimi-page">
	<div id="laimi-page-content"></div>
</div>
				</div>
			</div>
		</div>
	</div>
	<!--新增体验券弹出层开始-->
	<div id="laimi-modal-add" class="laimi-modal">
		<form class="layui-form">
			<div class="layui-form-item">
				<label class="layui-form-label">名称</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-300" type="text" name="txtname">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">面值</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-100" type="text" name="txtvalue" placeholder="￥">
				</div>
				<div class="layui-form-mid layui-word-aux">元</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">体验商品</label>
				<div class="layui-input-inline">
					<select name="txtmgoods" lay-search>
						<option value="">请选择商品</option>
						<optgroup label="城市记忆">
							<option value="你工作的第一个城市">你工作的第一个城市</option>
						</optgroup>
						<optgroup label="学生时代">
							<option value="你的工号">你的工号</option>
							<option value="你最喜欢的老师">你最喜欢的老师</option>
						</optgroup>
					</select>
				</div>
				<div class="layui-form-mid layui-word-aux">下拉选择或搜索商品</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">有效期</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-100" type="text" name="txtdays">
				</div>
				<div class="layui-form-mid layui-word-aux">天</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">开始时间</label>
				<div class="layui-input-inline">
					<input type="radio" name="txtbegin" value="1" title="当天开始" checked="">
					<input type="radio" name="txtbegin" value="2" title="第二天开始">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">备注</label>
				<div class="layui-input-block">
					<textarea class="layui-textarea laimi-input-b80" name="txtmemo"></textarea>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>完成</button>
					<button type="reset" class="layui-btn layui-btn-primary">重置</button>
				</div>
			</div>
		</form>
	</div>
	<!--新增体验券弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "layer", "form"], function() {
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
			count: 50,
			limit: 50,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj) {
				//console.log(obj)
			}
		});
		$("#laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增体验券", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
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
</body>
</html>