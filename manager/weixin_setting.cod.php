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
						<a href="weixin_setting.php">参数设置</a>
					</li>
					<li>
						<a href="weixin_trade.php">功能配置</a>
					</li>
					<li>
						<a href="weixin_url.php">微信URL</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-mp layui-tab-content">
<form class="layui-form">
	<div class="laimi-height-20"></div>
	<div class="layui-form-item">
		<label class="layui-form-label">公众号名称</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-input-300" type="text" name="txtname" value="<?php echo $this->_data['system_config_weixin']['name']?>">
		</div>
		<div class="layui-form-mid layui-word-aux">
			例：来米软件
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">APPID</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-input-300" type="text" name="txtappid" value="<?php echo $this->_data['system_config_weixin']['appid']?>">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">APPSECRET</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-input-300" type="text" name="txtappsecret" value="<?php echo $this->_data['system_config_weixin']['appsecret']?>">
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block laimi-input-100">
			<button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>
			确定
			</button>
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
			$.post('weixin_setting_do.php', data.field, function(res){
				console.log(res);
				if(res == 0){
					window.location.reload();
				}else{
					objlayer.alert('修改失败，请联系管理员', {
						title: "提示信息"
					});
				}
			})
			return false;
		});
	});
	</script>
</body>
</html>