<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
<style>
.layui-form-item .layui-form-label {width1:120px;}
</style>
</head>
<body class="layui-layout-body">
	<div class="layui-layout layui-layout-admin">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_left', ''); ?>
		<div id="laimi-content" class="layui-body">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
					<li class="layui-this">
						<a href="password.php">修改密码</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-password layui-tab-content">
<form class="layui-form">
	<div class="layui-form-item" style="margin-top:20px;">
		<label class="layui-form-label"><span>*</span> 原密码</label>
		<div class="layui-input-inline">
			<input id="laimi-opassword" class="layui-input laimi-input-200" type="password" name="txtopassword" placeholder="请输入原密码" lay-verify="required">
		</div>
	</div>
	<div class="layui-form-item" style="margin-top:20px;">
		<label class="layui-form-label"><span>*</span> 新密码</label>
		<div class="layui-input-inline">
			<input id="laimi-npassword" class="layui-input laimi-input-200" type="password" name="txtnpassword" placeholder="请输入新密码" lay-verify="required">
		</div>
	</div>
	<div class="layui-form-item" style="margin-top:20px;">
		<label class="layui-form-label"><span>*</span> 确认密码</label>
		<div class="layui-input-inline">
			<input id="laimi-npassword2" class="layui-input laimi-input-200" type="password" name="txtnpassword" placeholder="请再次输入密码" lay-verify="required">
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block" style="margin-left:135px;">
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
			if($("#laimi-npassword").val() != $("#laimi-npassword2").val()) {
				objlayer.alert('新密码确认失败！', {
					title: '提示信息'
				});
				return false;
			}
			var objthis = $(this);
		  objthis.attr('disabled', true);
		  $.post("password_do.php", objdata.field, function(strdata) {
		    if(strdata == 0) {
		    	objlayer.alert('密码修改成功！', {
						title: '提示信息'
					}, function() {
						window.location.reload();
					});
		    } else {
		      objlayer.alert('修改密码失败，请联系管理员！', {
						title: '提示信息'
					});
		    }
		    objthis.attr('disabled', false);
		  });
			return false;
		});
		return false;
	});
	</script>
</body>
</html>