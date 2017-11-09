<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this -> fun_fetch('inc_head', ''); ?>
	</head>
	<body class="layui-layout-body">
		<div class="layui-layout layui-layout-admin">
			<?php echo $this -> fun_fetch('inc_top', ''); ?>
			<?php echo $this -> fun_fetch('inc_left', ''); ?>
			<div id="laimi-content" class="layui-body">
				<div class="layui-tab layui-tab-brief">
					<ul class="layui-tab-title">
						<li class="layui-this">
							参数设置
						</li>
					</ul>
					<div class="layui-tab-content">
						<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
							<legend>
								系统参数设置
							</legend>
						</fieldset>
						<form class="layui-form" action="">
							<div class="layui-form-item">
								<label class="layui-form-label">短信通知</label>
								<div class="layui-input-inline">
									<input type="checkbox" name="close" lay-skin="switch" lay-text="开启|关闭">
								</div>
								<div class="layui-form-mid layui-word-aux">
									请提前给短信充值，短信余额为0发不出短信
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">短信余额</label>
								<div class="layui-input-block">
									<span class="laimi-font4">1286条</span>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">小票打印</label>
								<div class="layui-input-inline">
									<input type="checkbox" checked="" name="close" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">
								</div>
								<div class="layui-form-mid layui-word-aux">
									开启前1、正确连接小票打印机&nbsp;&nbsp;&nbsp;&nbsp;2、安装打印控件
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">积分功能</label>
								<div class="layui-input-inline">
									<input type="checkbox" checked="" name="close" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">
								</div>
								<div class="layui-form-mid layui-word-aux">
									1元1积分
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">员工提成</label>
								<div class="layui-input-block">
									<input type="checkbox" name="close" lay-skin="switch" lay-text="开启|关闭">
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">电子档案</label>
								<div class="layui-input-block">
									<input type="checkbox" name="close" lay-skin="switch" lay-text="开启|关闭">
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">库存报警</label>
								<div class="layui-input-inline">
									<input type="tel" name="phone" value="5" autocomplete="off" class="layui-input laimi-input-80">
								</div>
								<div class="layui-form-mid layui-word-aux">
									库存低于此数量，系统自动通知
								</div>
							</div>
							<div class="layui-form-item">
								<div class="layui-input-block">
									<button class="layui-btn" lay-submit="" lay-filter="demo1">
									确定
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php echo $this -> fun_fetch('inc_foot', ''); ?>
		<script>layui.use(["element"], function() {
	var objelement = layui.element;
});</script>
		<script>layui.use(['form', 'layedit', 'laydate'], function() {
			var form = layui.form,
				layer = layui.layer
			//监听指定开关
			form.on('switch(switchTest)', function(data){
layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
offset: '6px'
});
layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
});

//监听提交
form.on('submit(demo1)', function(data){
layer.alert(JSON.stringify(data.field), {
title: '最终的提交信息'
})
return false;
});

});
		</script>
	</body>
</html>