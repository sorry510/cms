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
						<li class="layui-this">商品编辑</li>
					</ul>
					<div class="layui-tab-content">
						<form class="layui-form" action="">	
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品分类</label>
						    <div class="layui-input-block laimi-input-200">
						      <select name="quiz" lay-verify="required" lay-search="">
									<option value="">请选择分类</option>
									<option value="东风路分店">东风路分店</option>
									<option value="王城路分店">王城路分店</option>
									<option value="九都路分店">九都路分店</option>
								</select>
						    </div>
						  </div>					  
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品名称</label>
						    <div class="layui-input-block">
						      <input type="tel" name="phone" autocomplete="off" class="layui-input laimi-input-300">
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label">特点说明</label>
						    <div class="layui-input-inline">
						      <input type="tel" name="phone" autocomplete="off" class="layui-input laimi-input-300">
						    </div>
						    <div class="layui-form-mid layui-word-aux">例：无添加、无污染</div>
						  </div>
						  <div class="layui-form-item">
							<label class="layui-form-label">价格</label>
							<div class="layui-input-inline">
								<input type="text" name="price_min" placeholder="￥" lay-verify="title" autocomplete="off" class="layui-input laimi-input-80">
							</div>
							<div class="layui-form-mid layui-word-aux">元</div>	
						  </div>
						  <div class="layui-form-item">
							<label class="layui-form-label">库存</label>
							<div class="layui-input-inline">
								<input type="text" name="price_min" lay-verify="title" autocomplete="off" class="layui-input laimi-input-80">
							</div>
							<div class="layui-form-mid layui-word-aux">独立库存，与门店无关</div>	
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品图片</label>
						    <div class="layui-input-block">
						      <div class="layui-upload">
								  <button type="button" class="layui-btn layui-btn-normal" id="test2">多图片上传</button> 
								  <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
								    预览图：
								    <div class="layui-upload-list" id="demo2"></div>
								 </blockquote>
								</div>
						    </div>
						  </div>						  
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品介绍</label>
						    <div class="layui-input-block">
						      <textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="LAY_demo_editor"></textarea>
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <div class="layui-input-block">
						      <button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">确定</button>
						    </div>
						  </div>
						  <div class="laimi-height-20">						  	
						  </div>
						</form>						
					</div>
				</div>
			</div>
		</div>
<?php echo $this -> fun_fetch('inc_foot', ''); ?>
<script>layui.use(["element"], function() {
	var objelement = layui.element;
});
</script>

<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
  
  //日期
  laydate.render({
    elem: '#date'
  });
  laydate.render({
    elem: '#date1'
  });
  
  //创建一个编辑器
  var editIndex = layedit.build('LAY_demo_editor');
 
  //自定义验证规则
  form.verify({
    title: function(value){
      if(value.length < 5){
        return '标题至少得5个字符啊';
      }
    }
    ,pass: [/(.+){6,12}$/, '密码必须6到12位']
    ,content: function(value){
      layedit.sync(editIndex);
    }
  });
  
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
  
  //多图片上传
  upload.render({
    elem: '#test2'
    ,url: '/upload/'
    ,multiple: true
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
      });
    }
    ,done: function(res){
      //上传完毕
    }
  });
  
  //指定允许上传的文件类型
  upload.render({
    elem: '#test3'
    ,url: '/upload/'
    ,accept: 'file' //普通文件
    ,done: function(res){
      console.log(res)
    }
  });
  upload.render({ //允许上传的文件后缀
    elem: '#test4'
    ,url: '/upload/'
    ,accept: 'file' //普通文件
    ,exts: 'zip|rar|7z' //只允许上传压缩文件
    ,done: function(res){
      console.log(res)
    }
  });
  upload.render({
    elem: '#test5'
    ,url: '/upload/'
    ,accept: 'video' //视频
    ,done: function(res){
      console.log(res)
    }
  });
  upload.render({
    elem: '#test6'
    ,url: '/upload/'
    ,accept: 'audio' //音频
    ,done: function(res){
      console.log(res)
    }
  });
  
  //设定文件大小限制
  upload.render({
    elem: '#test7'
    ,url: '/upload/'
    ,size: 60 //限制文件大小，单位 KB
    ,done: function(res){
      console.log(res)
    }
  });
  
  //同时绑定多个元素，并将属性设定在元素上
  upload.render({
    elem: '.demoMore'
    ,before: function(){
      layer.tips('接口地址：'+ this.url, this.item, {tips: 1});
    }
    ,done: function(res, index, upload){
      var item = this.item;
      console.log(item); //获取当前触发上传的元素，layui 2.1.0 新增
    }
  })
  

  
  
  
});
</script>

	</body>
</html>