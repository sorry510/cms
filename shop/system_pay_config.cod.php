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
					<li class="layui-this">支付参数设置</li>
				</ul>
				<div class="layui-tab-content">
						<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
						  <legend>支付宝扫码支付</legend>
						</fieldset> 
						<form class="layui-form" action="">
						  <div class="layui-form-item">
						    <label class="layui-form-label laimi-pay-left">支付宝扫码</label>
						    <div class="layui-input-block">
						      <input type="checkbox" name="close" lay-skin="switch" lay-text="开启|关闭"> 
						    </div>
						  </div>						  
						  <div class="layui-form-item">
						    <label class="layui-form-label laimi-pay-left">APP应用ID</label>
						    <div class="layui-input-block">
						      <input type="tel" name="phone" autocomplete="off" class="layui-input laimi-input-300">
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label laimi-pay-left">支付宝公钥</label>
						    <div class="layui-input-block">
						      <input type="tel" name="phone" autocomplete="off" class="layui-input laimi-input-300">
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label laimi-pay-left">商户私钥(RSA2)</label>
						    <div class="layui-input-block">
						      <textarea placeholder="请输入内容" class="layui-textarea laimi-input-b80"></textarea>
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <div class="layui-input-block laimi-pay-enter">
						      <button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">确定</button>
						    </div>
						  </div>
						  <div class="laimi-height-20">						  	
						  </div>
						</form>
						<form class="layui-form" action="">
						<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
						  <legend>微信扫码支付</legend>
						</fieldset> 
						  <div class="layui-form-item">
						    <label class="layui-form-label laimi-pay-left">微信扫码</label>
						    <div class="layui-input-inline">
						      <input type="checkbox" name="close" lay-skin="switch" lay-text="开启|关闭"> 
						    </div>						    
						  </div>							 				  
						  <div class="layui-form-item">
						    <label class="layui-form-label laimi-pay-left">APPID</label>
						    <div class="layui-input-block">
						      <input type="tel" name="phone" autocomplete="off" class="layui-input laimi-input-300">
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label laimi-pay-left">MCHID</label>
						    <div class="layui-input-block">
						      <input type="tel" name="phone" autocomplete="off" class="layui-input laimi-input-300">
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label laimi-pay-left">商户支付密钥</label>
						    <div class="layui-input-block">
						      <input type="tel" name="phone" autocomplete="off" class="layui-input laimi-input-300">
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label laimi-pay-left">APPSECRET</label>
						    <div class="layui-input-block">
						      <input type="tel" name="phone" autocomplete="off" class="layui-input laimi-input-300">
						    </div>
						  </div>	
						  <div class="layui-form-item">
						    <label class="layui-form-label laimi-pay-left">商户证书(SSLCERT)</label>
						    <div class="layui-input-inline">
									  <button type="button" class="layui-btn layui-btn-primary" id="test8">选择文件</button>
									  <button type="button" class="layui-btn layui-btn-gray" id="test9">开始上传</button>
						    </div>
						    <div class="layui-form-mid layui-word-aux">仅支持.doc格式</div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label laimi-pay-left">商户证书(SSLKEY)</label>
						    <div class="layui-input-inline">
									  <button type="button" class="layui-btn layui-btn-primary" id="test10">选择文件</button>
									  <button type="button" class="layui-btn layui-btn-gray" id="test11">开始上传</button>
						    </div>
						    <div class="layui-form-mid layui-word-aux">仅支持.doc格式</div>
						  </div>						  
						  			  
						  <div class="layui-form-item">
						    <div class="layui-input-block laimi-pay-enter">
						      <button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">确定</button>
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
		var objelement = layui.element;
	});
	</script>
	<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
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
<script>
layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;
  
  //选完文件后不自动上传
  upload.render({
    elem: '#test8'
    ,url: '/upload/'
    ,accept: 'file' //普通文件
    ,exts: 'doc' //只允许上传压缩文件
    ,auto: false
    //,multiple: true
    ,bindAction: '#test9'
    ,done: function(res){
      console.log(res)
    }
  });  
  //选完文件后不自动上传
  upload.render({
    elem: '#test10'
    ,url: '/upload/'
    ,accept: 'file' //普通文件
    ,exts: 'doc' //只允许上传压缩文件
    ,auto: false
    //,multiple: true
    ,bindAction: '#test11'
    ,done: function(res){
      console.log(res)
    }
  });  
  });
</script>
</body>
</html>