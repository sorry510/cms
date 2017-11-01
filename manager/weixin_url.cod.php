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
						<a href="weixin_setting.php">参数设置</a>
					</li>
					<li>
						<a href="weixin_trade.php">功能配置</a>
					</li>
					<li class="layui-this">
						<a href="weixin_url.php">微信URL</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-mp layui-tab-content">
<form class="layui-form">													
	<div class="laimi-height-20"></div>
	<div class="layui-form-item">
		<label class="layui-form-label"></label>
		<div class="layui-form-mid laimi-color-ju">请先在公众号设置里填入公众号信息，再来此页面复制代码</div>
	</div>								
	<div class="layui-form-item">
		<label class="layui-form-label">会员中心</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea laimi-input-b80" disabled style="line-height:22px;">https://open.weixin.qq.com/connect/oauth2/authorize?appid=&redirect_uri=http%3A%2F%2Fshop1.e8860.com%2Ffw%2Fweixin%2Fs_oauth2.php%3Ftid%3D %26url%3Dm11.php&response_type=code&scope=snsapi_base#wechat_redirect</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">在线预约</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea laimi-input-b80" disabled style="line-height:22px;">https://open.weixin.qq.com/connect/oauth2/authorize?appid=&redirect_uri=http%3A%2F%2Fshop1.e8860.com%2Ffw%2Fweixin%2Fs_oauth2.php%3Ftid%3D %26url%3Dm11.php&response_type=code&scope=snsapi_base#wechat_redirect</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">我的预约</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea laimi-input-b80" disabled style="line-height:22px;">https://open.weixin.qq.com/connect/oauth2/authorize?appid=&redirect_uri=http%3A%2F%2Fshop1.e8860.com%2Ffw%2Fweixin%2Fs_oauth2.php%3Ftid%3D %26url%3Dm11.php&response_type=code&scope=snsapi_base#wechat_redirect</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">我的优惠券</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea laimi-input-b80" disabled style="line-height:22px;">https://open.weixin.qq.com/connect/oauth2/authorize?appid=&redirect_uri=http%3A%2F%2Fshop1.e8860.com%2Ffw%2Fweixin%2Fs_oauth2.php%3Ftid%3D %26url%3Dm11.php&response_type=code&scope=snsapi_base#wechat_redirect</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">微信排号</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea laimi-input-b80" disabled style="line-height:22px;">https://open.weixin.qq.com/connect/oauth2/authorize?appid=&redirect_uri=http%3A%2F%2Fshop1.e8860.com%2Ffw%2Fweixin%2Fs_oauth2.php%3Ftid%3D %26url%3Dm11.php&response_type=code&scope=snsapi_base#wechat_redirect</textarea>
		</div>
	</div>		
	<div class="layui-form-item">
		<label class="layui-form-label">我的排号</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea laimi-input-b80" disabled style="line-height:22px;">https://open.weixin.qq.com/connect/oauth2/authorize?appid=&redirect_uri=http%3A%2F%2Fshop1.e8860.com%2Ffw%2Fweixin%2Fs_oauth2.php%3Ftid%3D %26url%3Dm11.php&response_type=code&scope=snsapi_base#wechat_redirect</textarea>
		</div>
	</div>	
	<div class="layui-form-item">
		<label class="layui-form-label">门店列表</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea laimi-input-b80" disabled style="line-height:22px;">https://open.weixin.qq.com/connect/oauth2/authorize?appid=&redirect_uri=http%3A%2F%2Fshop1.e8860.com%2Ffw%2Fweixin%2Fs_oauth2.php%3Ftid%3D %26url%3Dm11.php&response_type=code&scope=snsapi_base#wechat_redirect</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">微商城</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea laimi-input-b80" disabled style="line-height:22px;">https://open.weixin.qq.com/connect/oauth2/authorize?appid=&redirect_uri=http%3A%2F%2Fshop1.e8860.com%2Ffw%2Fweixin%2Fs_oauth2.php%3Ftid%3D %26url%3Dm11.php&response_type=code&scope=snsapi_base#wechat_redirect</textarea>
		</div>
	</div>			
</form>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
	});
	</script>
</body>
</html>