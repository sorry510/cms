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
  <div class="laimi-height-20"></div>
  <div class="layui-form-item">
    <label class="layui-form-label">微信扫码</label>
    <div class="layui-input-inline">
      <input type="checkbox" name="txtweixin" value="1" lay-skin="switch" lay-text="开启|关闭"> 
    </div>						    
  </div>							 				  
  <div class="layui-form-item">
    <label class="layui-form-label">APPID</label>
    <div class="layui-input-block">
      <input class="layui-input laimi-input-300" type="text" name="txtappid">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">MCHID</label>
    <div class="layui-input-block">
      <input class="layui-input laimi-input-300" type="text" name="txtmchid">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">商户支付密钥</label>
    <div class="layui-input-block">
      <input class="layui-input laimi-input-300" type="text" name="txtkey">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">APPSECRET</label>
    <div class="layui-input-block">
      <input class="layui-input laimi-input-300" type="text" name="txtappsecret">
    </div>
  </div>	
  <div class="layui-form-item">
    <label class="layui-form-label">商户证书(SSLCERT)</label>
    <div class="layui-input-inline">
			  <button id="laimi-file1" class="layui-btn layui-btn-primary" type="button">选择文件</button>
			  <button id="laimi-file2" class="layui-btn layui-btn-gray" type="button">开始上传</button>
    </div>
    <div class="layui-form-mid layui-word-aux">仅支持.docx格式</div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">商户证书(SSLKEY)</label>
    <div class="layui-input-inline">
			  <button id="laimi-file3" class="layui-btn layui-btn-primary" type="button">选择文件</button>
			  <button id="laimi-file4" class="layui-btn layui-btn-gray" type="button">开始上传</button>
    </div>
    <div class="layui-form-mid layui-word-aux">仅支持.docx格式</div>
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
	layui.use(["element", "upload", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objupload = layui.upload;
		var objform = layui.form;
		//选完文件后不自动上传
		objupload.render({
	    elem: "#laimi-file1",
	    url: "/upload/",
	    accept: "file",//普通文件
	    exts: "docx",//只允许上传压缩文件
	    auto: false,
	    //multiple: true,
	    bindAction: "#laimi-file2",
	    done: function(res) {
	      objlayer.alert(res, {
					title: "提示信息"
				});
	    }
	  });
	  objupload.render({
	    elem: "#laimi-file3",
	    url: "/upload/",
	    accept: "file",//普通文件
	    exts: "docx",//只允许上传压缩文件
	    auto: false,
	    //multiple: true,
	    bindAction: "#laimi-file4",
	    done: function(res) {
	      objlayer.alert(res, {
					title: "提示信息"
				});
	    }
	  });
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