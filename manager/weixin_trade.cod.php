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
					<li class="layui-this">
						<a href="weixin_trade.php">功能配置</a>
					</li>
					<li>
						<a href="weixin_url.php">微信URL</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-mp layui-tab-content">
<form class="layui-form">
	<div class="laimi-height-20"></div>
	<div class="layui-form-item">
		<label class="layui-form-label">微信预约</label>
		<div class="layui-input-inline">
			<input type="checkbox" name="txtreserve" lay-skin="switch" lay-text="开启|关闭" value="1" <?php if($this->_data['system_config_weixin']['reserve_flag'] == 1) echo 'checked';?>>
		</div>
	</div>
	<!--div class="layui-form-item">
		<label class="layui-form-label">微信预约设置</label>
		<div class="layui-input-inline">
			<input type="radio" name="txtreserve2" value="1" title="预约到服务项目" checked="">
			<input type="radio" name="txtreserve2" value="2" title="预约到服务项目+服务人员">
		</div>
	</div-->
	<div class="layui-form-item">
		<label class="layui-form-label">微信排号</label>
		<div class="layui-input-inline">
			<input type="checkbox" name="txtline" lay-skin="switch" lay-text="开启|关闭" value="1" <?php if($this->_data['system_config_weixin']['line_flag'] == 1) echo 'checked';?>>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">微信会员卡底图</label>
		<input type="hidden" name="txtimage" value="<?php echo $this->_data['system_config_weixin']['card_image'];?>">
		<div class="layui-input-inline">
			<div class="layui-upload">
			  <button id="laimi-wxbg" class="layui-btn layui-btn-normal layui-btn-small" type="button">上传图片</button>
			  <div class="layui-upload-list">
			    <img id="laimi-showimg" class="layui-upload-img" style="width:264px;height:165px;" src="http://<?php echo $GLOBALS['gconfig']['show'][1];?><?php echo $this->_data['system_config_weixin']['card_image'] == '' ? 'demo.jpg' : $this->_data['system_config_weixin']['card_image'];?>">
			    <p></p>
			  </div>
			</div>
		</div>
		<div class="layui-form-mid layui-word-aux">
			尺寸：88X55mm，只允许上传png格式的图片，最大上传文件大小为1024K
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label"></label>
		<div class="layui-input-block">
			<button class="layui-btn laimi-button-100 laimi-submit" lay-filter="laimi-submit" lay-submit>
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
	<script>
	layui.use(["element", "form","upload", "layer"], function() {
		var $ = layui.jquery;
		var objelement = layui.element;
		var objform = layui.form;
		var objlayer = layui.layer;
		var objupload = layui.upload;
		objupload.render({
		  elem: '#laimi-wxbg', //绑定元素
		  url: './upload_do.php', //上传接口
		  exts: 'png',
		  bindAction: '.laimi-submit',
		  before: function(obj){
		    //预读本地文件示例，不支持ie8
		    obj.preview(function(index, file, result){
		      $('#laimi-showimg').attr('src', result); //图片链接（base64）
		    });
		  },
		  done: function(res){
		  	if(res.code == 200){
		  		$("#laimi-main input[name='txtimage']").val(res.data.photo);
		  	}
		  },
		  error: function(){
		    objlayer.alert('上传失败，请联系管理员', {
		    	title: "提示信息"
		    });
		  }
	  });
		objform.on("submit(laimi-submit)", function(data) {
			$.post('weixin_trade_do.php', data.field, function(res){
				console.log(res);
				if(res == 0){
					window.location.reload();
				}else{
					objlayer.alert('修改失败，请联系管理员', {
						title: "提示信息"
					});
				}
			})
			return false;
		});
	});
	</script>
</body>
</html>