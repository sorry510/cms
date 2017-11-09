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
						<a href="worker_reward.php">新增会员</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<div class="layui-row">
    <form class="layui-form">
		<div class="layui-row">
		    <div class="layui-col-md9">
				<fieldset class="layui-elem-field">
				  <legend style="font-size: 14px;font-weight: bold;">会员基本信息</legend>
				  <div class="layui-field-box">
				  	<div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 会员姓名</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtname">
					    </div>
					  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 性别</label>
					    <div class="layui-input-inline">
							<input type="radio" name="sex" value="女" title="女">
							<input type="radio" name="sex" value="男" title="男">
					    </div>
					  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 手机号码</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtname">
					    </div>
					  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label">出生日期</label>
					    <div class="layui-input-inline">
					      <input type="text" class="layui-input laimi-input-200" id="test3" placeholder="yyyy-MM-dd">
					    </div>
					  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label">启用密码</label>
					    <div class="layui-input-inline">
							<input type="radio" name="sex" value="不启用" title="不启用" checked="">
							<input type="radio" name="sex" value="启用" title="启用">
					    </div>
					  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label">消费密码</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtname">
					    </div>
					  </div>
				    </div>
				  </div>
				</fieldset>
				<fieldset class="layui-elem-field">
				  <legend style="font-size: 14px;font-weight: bold;">会员卡信息</legend>
				  <div class="layui-field-box">
				  	<div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label">会员卡号</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtname">
					    </div>
					  </div>
				    </div>
					<div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label">ID卡号</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtname">
					    </div>
					  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label">到期时间</label>
					    <div class="layui-input-inline">
					      <input type="text" class="layui-input laimi-input-200" id="test4" placeholder="yyyy-MM-dd">
					    </div>
					  </div>
				    </div>				    
				</fieldset>
				<fieldset class="layui-elem-field">
				  <legend style="font-size: 14px;font-weight: bold;">其它信息</legend>
				  <div class="layui-field-box">
				  	<div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label">联系人</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtname">
					    </div>
					  </div>
				    </div>
					<div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label">身份证号</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtname">
					    </div>
					  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
					    <label class="layui-form-label">推荐人</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtname">
					    </div>
					  </div>
				    </div>
				    <div class="layui-col-md12">
				      <div class="layui-form-item">
					    <label class="layui-form-label">备注</label>
					    <div class="layui-input-block">
					      <textarea placeholder="备注" class="layui-textarea laimi-input-b80"></textarea>
					    </div>
					  </div>
				    </div>				    
				</fieldset>			    	    	
		    </div>
		    <div class="layui-col-md3" style="text-align: center;">
		      <div class="layui-upload">		  
					<div class="layui-upload-list">
						<img id="demo1" style="width:150px;height:180px;">
						<p id="demoText"></p>
						</div>
						<div style="padding-bottom: 15px;">
							<button type="button" class="layui-btn layui-btn-normal" id="test1">上传照片</button>
						</div>
						<div>
							<button type="button" class="layui-btn layui-btn-normal" id="test1">在线拍照</button>
						</div>
					</div>
				</div>
		    </div>
		    <div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>
		      	完成
		      </button>
		      <button class="layui-btn layui-btn-primary" type="reset">
		      	重置
		      </button>
		    </div>
		  </div>
		  <div class="laimi-height-20">		  	
		  </div>
		 </div>		
	</form>	
</div>
				</div>
			</div> 
		</div>
</div>	
<?php echo $this->fun_fetch('inc_foot', ''); ?>
<script>
layui.use(["element", "layer", "form"], function() {
	var $ = layui.jquery;
	var objlayer = layui.layer;
	var objelement = layui.element;
	var objform = layui.form;		
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
<script>
layui.use('laydate', function(){
var laydate = layui.laydate;
//常规用法
laydate.render({
elem: '#test3'
});
//常规用法
laydate.render({
elem: '#test4'
});
});
</script>

</body>
</html>