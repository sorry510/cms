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
						<a href="system_trade.php">参数设置</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-trade layui-tab-content">
<form class="layui-form">
	<div class="layui-form-item" style="margin-top:20px;">
		<label class="layui-form-label">短信通知</label>
		<?php if($GLOBALS['gtrade']['sms_module'] == 1) { ?>
		<div class="layui-input-inline">
			<input type="checkbox" name="txtsms" value="1" lay-skin="switch" lay-text="开启|关闭"<?php if($GLOBALS['gtrade']['sms_flag'] == 1) echo ' checked'; ?>>
		</div>
		<div class="layui-form-mid layui-word-aux">
			请提前给短信充值，短信余额为0发不出短信。
		</div>
		<?php } else { ?>
		<div class="layui-form-mid layui-word-aux">
			<span class="laimi-color-ju">这个模块尚未开通，请联系管理员！</span>
		</div>
		<?php } ?>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">短信签名</label>
		<div class="layui-form-mid layui-word-aux">
			<span><?php echo $GLOBALS['gtrade']['sms_sign']; ?></span>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">短信余额</label>
		<div class="layui-form-mid layui-word-aux">
			<span class="laimi-color-ju"><?php echo $this->_data['sms_ycount']; ?>条</span>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">积分功能</label>
		<?php if($GLOBALS['gtrade']['score_module'] == 1) { ?>
		<div class="layui-input-inline">
			<input type="checkbox" name="txtscore" value="1" lay-skin="switch" lay-text="开启|关闭"<?php if($GLOBALS['gtrade']['score_flag'] == 1) echo ' checked'; ?>>
		</div>
		<div class="layui-form-mid layui-word-aux">
			1元1积分
		</div>
		<?php } else { ?>
		<div class="layui-form-mid layui-word-aux">
			<span class="laimi-color-ju">这个模块尚未开通，请联系管理员！</span>
		</div>
		<?php } ?>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">员工提成</label>
		<?php if($GLOBALS['gtrade']['worker_module'] == 1) { ?>
		<div class="layui-input-block">
			<input type="checkbox" name="txtworker" value="1" lay-skin="switch" lay-text="开启|关闭"<?php if($GLOBALS['gtrade']['worker_flag'] == 1) echo ' checked'; ?>>
		</div>
		<?php } else { ?>
		<div class="layui-form-mid layui-word-aux">
			<span class="laimi-color-ju">这个模块尚未开通，请联系管理员！</span>
		</div>
		<?php } ?>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">电子档案</label>
		<?php if($GLOBALS['gtrade']['history_module'] == 1) { ?>
		<div class="layui-input-block">
			<input type="checkbox" name="txthistory" value="1" lay-skin="switch" lay-text="开启|关闭"<?php if($GLOBALS['gtrade']['history_flag'] == 1) echo ' checked'; ?>>
		</div>
		<?php } else { ?>
		<div class="layui-form-mid layui-word-aux">
			<span class="laimi-color-ju">这个模块尚未开通，请联系管理员！</span>
		</div>
		<?php } ?>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">库存报警</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-input-80" type="text" name="txtstore" value="<?php echo $GLOBALS['gtrade']['store_count']; ?>">
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
	layui.use(["layer", "element", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		objform.on("submit(laimi-submit)", function(objdata) {
			$.post('system_trade_do.php', objdata.field, function(strdata) {
				if(strdata == 0) {
					objlayer.alert("参数设置成功！", {
						title: "提示信息"
					}, function() {
						window.location.reload();
					});
				} else {
					objlayer.alert('参数设置失败，请联系管理员！', {
						title: "提示信息"
					});
				}
			});
			return false;
		});
	});
	</script>
</body>
</html>