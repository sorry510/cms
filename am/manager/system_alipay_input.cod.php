<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
<style type="text/css">
#laimi-main.p-system-pay .layui-form-label {width:160px;}
#laimi-main.p-system-pay .layui-input-block {margin-left:190px;}
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
						<a href="system_alipay.php">支付宝支付设置</a>
					</li>
					<li>
						<a href="system_wxpay.php">微信支付设置</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-pay layui-tab-content">
<form class="layui-form">
  <div class="laimi-height-20"></div>
  <div class="layui-form-item">
    <label class="layui-form-label">支付宝扫码</label>
    <div class="layui-input-block">
      <input type="checkbox" name="txtalipay" value="1" lay-skin="switch" lay-text="开启|关闭"> 
    </div>
  </div>						  
  <div class="layui-form-item">
    <label class="layui-form-label">APP应用ID</label>
    <div class="layui-input-block">
      <input class="layui-input laimi-input-300" type="text" name="txtid">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">支付宝公钥</label>
    <div class="layui-input-block">
      <input class="layui-input laimi-input-300" type="text" name="txtkey">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">商户私钥(RSA2)</label>
    <div class="layui-input-block">
      <textarea class="layui-textarea laimi-input-b80" name="txtrsa2"></textarea>
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
				title: '提示信息'
			});
			return false;
		});
	});
	</script>
</body>
</html>