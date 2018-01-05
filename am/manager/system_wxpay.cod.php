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
						<a href="system_alipay.php">支付宝支付设置</a>
					</li>
					<li class="layui-this">
						<a href="system_wxpay.php">微信支付设置</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-pay layui-tab-content">
<form class="layui-form">
	<div class="layui-form-item">
		<blockquote class="layui-elem-quote laimi-color-ju">因支付宝、微信需要审核商家信息，请准备好以下资料后联系客服帮您开通，如您已申请商家，请直接联系客服</blockquote>
		<ul class="layui-timeline">
			<li class="layui-timeline-item">
				<i class="layui-icon layui-timeline-axis"></i>
				<div class="layui-timeline-content layui-text">
					<h3 class="layui-timeline-title">个人信息</h3>
					<p>负责人姓名、手机号码、电子邮箱、身份证号、身份证正反面照片 <i class="layui-icon"></i></p>
				</div>
			</li>
			<li class="layui-timeline-item">
				<i class="layui-icon layui-timeline-axis"></i>
				<div class="layui-timeline-content layui-text">
					<h3 class="layui-timeline-title">店铺信息</h3>
					<p>店铺名称、具体地址(省市区门牌)、行业、营业执照拍照片、店铺门头照片 <i class="layui-icon"></i></p>
				</div>
			</li>
			<li class="layui-timeline-item">
				<i class="layui-icon layui-timeline-axis"></i>
				<div class="layui-timeline-content layui-text">
					<h3 class="layui-timeline-title">银行卡信息</h3>
						<p>银行名称、开户行、开户人姓名（与负责人一致）、卡号 <i class="layui-icon"></i></p>
				</div>
			</li>
			<li class="layui-timeline-item">
				<i class="layui-icon layui-timeline-axis"></i>
				<div class="layui-timeline-content layui-text">
					<h3 class="layui-timeline-title" style="color:#FF5722;">请将以上资料发至邮箱&nbsp;pay@laimisoft.com，并告诉您的专属客服</h3>
						<p style="line-height:32px;">
							在邮件里写清楚您的店铺名称、企业代码与您的手机号码，以便有问题联系您 <i class="layui-icon"></i><br>
							办理时间约3 - 4个工作日，办理完成我们将打电话通知您。<br>
						</p>
				</div>
			</li>
		</ul>
	</div>
</form>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
	});
	</script>
</body>
</html>