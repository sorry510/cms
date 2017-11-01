<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
	<style>
	html, body {width:100%; height:100%;}
	body {background-image:url("img/bg.jpg"); background-size:auto 100%; background-position:top center; background-repeat:no-repeat;}
	
	#laimi-login {position:absolute; left:50%; top:50%; width:450px; height:430px; margin-left:-225px; margin-top:-225px; border-radius:15px 15px 15px 15px; box-shadow:0 0 20px black;}
	#laimi-login .a {padding-top:25px; height:100px; border-radius:15px 15px 0 0; background-color:#2B2B2B; color:white; font-family:'Microsoft YaHei',Verdana; font-size:24px; text-align:center;}
	#laimi-login .a img {vertical-align:middle;}
	#laimi-login .b {position:relative; height:330px; border-radius:0 0 15px 15px; background-color:white;}
	#laimi-login .b .b1 {padding:40px 10px 0 10px;}
	#laimi-login .b .b2 {position:absolute; left:20px; bottom:20px;}
	#laimi-login .b .b2 li {float:left; font-size:14px; color:#B0B0B0;}
	
	#laimi-login .layui-form-label {width:100px; text-align:right;}
	#laimi-login .layui-input {width:270px;}
	#laimi-login .layui-btn {width:270px;}
	</style>
</head>
<body>
	<div id="laimi-login" class="layui-border-box">
		<div class="a">
			<img src="img/logo.png" width="55">&nbsp;&nbsp;&nbsp;&nbsp;来米店铺管理云平台
		</div>
		<div class="b">
			<div class="b1">
				<form id="laimi-form" class="layui-form">
				  <div class="layui-form-item">
				    <label class="layui-form-label">企业代码</label>
				    <div class="layui-input-block">
				    	<input class="layui-input" type="text" name="txtcode" placeholder="输入您的企业代码">
				    </div>
				  </div>
				  <div class="layui-form-item">
				    <label class="layui-form-label">登录账号</label>
				    <div class="layui-input-block">
				    	<input class="layui-input" type="text" name="txtaccount" placeholder="输入您的登录账号">
				    </div>
				  </div>
				  <div class="layui-form-item">
				    <label class="layui-form-label">登录密码</label>
				    <div class="layui-input-block">
				    	<input class="layui-input" type="password" name="txtpassword" placeholder="输入您的登录密码">
				    </div>
				  </div>		
				  <div class="layui-form-item">
				    <div class="layui-input-block">
				      <button class="layui-btn" lay-submit lay-filter="laimi-submit">登录系统</button>
				    </div>
				  </div>
				</form>
			</div>
			<ul class="b2">
				<li style="width:235px;">版本号：<?php echo $GLOBALS['gconfig'	]['system']['version']; ?></li>
				<li style="width:105px;"><a href="javascript:;">忘记密码?</a></li>
				<li><a href="http://www.laimisoft.com" target="_blank">官方网站</a></li>				
			</ul>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objform = layui.form;
		objform.on("submit(laimi-submit)", function() {
			if(document.getElementById("laimi-form").txtcode.value == "") {
				alert("请输入企业代码！");
				document.getElementById("laimi-form").txtcode.focus();
				return false;
			}
			if(document.getElementById("laimi-form").txtaccount.value == "") {
				alert("请输入登录帐号！");
				document.getElementById("laimi-form").txtaccount.focus();
				return false;
			}
			if(document.getElementById("laimi-form").txtpassword.value == "") {
				alert("请输入登录密码！");
				document.getElementById("laimi-form").txtpassword.focus();
				return false;
			}
			$.post("login_do.php", {
				txtcode:document.getElementById("laimi-form").txtcode.value,
				txtaccount:document.getElementById("laimi-form").txtaccount.value,
				txtpassword:document.getElementById("laimi-form").txtpassword.value
				}, function(strdata) {
				if(strdata == 'manager') {
					window.location="manager/main.php";
					return false;
				} else if(strdata == 'shop') {
					window.location="shop/main.php";
					return false;
				} else if(strdata == 'cashier') {
					window.location="cashier/main.php";
					return false;
				} else if(strdata == '1') {
					alert("操作异常！");
				} else if(strdata == '2') {
					alert("企业代码错误！");
				} else if(strdata == '3') {
					alert("所有店铺已到期，请联系客服续费！");
				} else if(strdata == '4') {
					alert("登录账号或密码错误！");
				} else if(strdata == '5') {
					alert("店铺已到期，请联系客服续费！");
				} else {
					alert("操作异常！");
				}
			});
			return false;
		});
	});
	</script>
</body>
</html>