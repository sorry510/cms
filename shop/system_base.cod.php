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
						<a href="system_base.php">参数设置</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-base layui-tab-content">
<fieldset class="layui-elem-field layui-field-title">
	<legend>
		系统参数设置
	</legend>
</fieldset>
<form class="layui-form">
	<div class="layui-form-item">
		<label class="layui-form-label">短信通知</label>
		<div class="layui-input-inline">
			<input type="checkbox" name="txtsms" value="1" lay-skin="switch" lay-text="开启|关闭">
		</div>
		<div class="layui-form-mid layui-word-aux">
			请提前给短信充值，短信余额为0发不出短信。
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">短信余额</label>
		<div class="layui-form-mid layui-word-aux">
			<span class="laimi-color-ju">1286条</span>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">小票打印</label>
		<div class="layui-input-inline">
			<input type="checkbox" name="txtprint" value="1" lay-skin="switch" lay-text="开启|关闭" checked="">
		</div>
		<div class="layui-form-mid layui-word-aux">
			开启前：1、正确连接小票打印机；2、安装打印控件。
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">积分功能</label>
		<div class="layui-input-inline">
			<input type="checkbox" name="txtscore" value="1" lay-skin="switch" lay-text="开启|关闭" checked="">
		</div>
		<div class="layui-form-mid layui-word-aux">
			1元1积分
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">员工提成</label>
		<div class="layui-input-block">
			<input type="checkbox" name="txtreward" value="1" lay-skin="switch" lay-text="开启|关闭">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">电子档案</label>
		<div class="layui-input-block">
			<input type="checkbox" name="txthistory" value="1" lay-skin="switch" lay-text="开启|关闭">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">库存报警</label>
		<div class="layui-input-inline">
			<input type="text" name="txtstore" value="5" autocomplete="off" class="layui-input laimi-input-80">
		</div>
		<div class="layui-form-mid layui-word-aux">
			库存低于此数量，系统自动通知
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