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
						<a href="system_trade.php">打印设置</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-trade layui-tab-content">
<form class="layui-form">
	<div class="laimi-height-20"></div>
	<div class="layui-form-item">
		<label class="layui-form-label">小票打印</label>
		<div class="layui-input-inline">
			<input type="checkbox" name="txtsms" value="1" lay-skin="switch" lay-text="开启|关闭">
		</div>
		<div class="layui-form-mid layui-word-aux">
			充值小票、消费小票、买套餐小票
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">打印标题</label>
		<div class="layui-input-inline">
			<input type="text" name="txtstore" autocomplete="off" class="layui-input laimi-input-300">
		</div>
		<div class="layui-form-mid layui-word-aux">
			例：海底捞东风路分店
		</div>
	</div>	
	<div class="layui-form-item">
		<label class="layui-form-label">打印备注1</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea" name="txtmemo" style="width:60%;">谢谢惠顾，欢迎下次光临！</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">小票宽度</label>
		<div class="layui-input-inline">
			<input type="radio" name="txttype" value="1" title="58mm">
			<input type="radio" name="txttype" value="2" title="88mm">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">打印机</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">指定打印机</option>
				<option value="东风路分店">打印机1</option>
				<option value="王城路分店">打印机2</option>
				<option value="九都路分店">打印机3</option>
			</select>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>确定</button>
		</div>
	</div>
</form>
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
		objform.on("submit(laimi-submit)", function(data) {
			objlayer.alert(JSON.stringify(data.field), {
				title: "提示信息"
			});
			return false;
		});
	});
	</script>
</body>
</html>