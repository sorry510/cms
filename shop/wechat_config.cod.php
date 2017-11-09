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
						<li class="layui-this">公众号设置</li>
						<li><a href="wechat_config2.php">微信功能配置</a></li>
						<li><a href="wechat_config3.php">微信url</a></li>
					</ul>
					<div class="layui-tab-content">
						<form class="layui-form" action="">
							<div class="laimi-height-20"></div>
							<div class="layui-form-item">
								<label class="layui-form-label">公众号名称</label>
								<div class="layui-input-inline">
									<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-300">
								</div>
								<div class="layui-form-mid layui-word-aux">
									例：来米软件
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">APPID</label>
								<div class="layui-input-inline">
									<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-300">
								</div>
							</div>						
							<div class="layui-form-item">
								<label class="layui-form-label">APPSECRET</label>
								<div class="layui-input-inline">
									<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-300">
								</div>
							</div>
							<div class="layui-form-item">
								<div class="layui-input-block laimi-input-100">
									<button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">
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
<script>
layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;
  
  //普通图片上传
  var uploadInst = upload.render({
    elem: '#test1'
    ,url: '/upload/'
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        $('#demo1').attr('src', result); //图片链接（base64）
      });
    }
    ,done: function(res){
      //如果上传失败
      if(res.code > 0){
        return layer.msg('上传失败');
      }
      //上传成功
    }
    ,error: function(){
      //演示失败状态，并实现重传
      var demoText = $('#demoText');
      demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
      demoText.find('.demo-reload').on('click', function(){
        uploadInst.upload();
      });
    }
  }); 
  });
</script>
	</body>
</html>