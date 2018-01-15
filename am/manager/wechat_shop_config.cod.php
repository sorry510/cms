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
					<li class="layui-this">
						<a href="wechat_shop_config.php">微商城设置</a>
					</li>
				</ul>
				<div id="laimi-main" class="layui-tab-content">
<form class="layui-form">
	<div class="layui-form-item" style="margin-top:20px;">
		<label class="layui-form-label">微商城</label>
		<div class="layui-input-inline">
			<input type="checkbox" name="wshop_flag" lay-skin="switch" lay-text="开启|关闭" value="1"<?php if($this->_data['company_wshop']['wshop_flag'] == 1) echo ' checked'; ?>>
		</div>
		<div class="layui-form-mid layui-word-aux">
			开启或关闭微商城
		</div>
	</div>
	<div class="layui-form-item" style="margin-top:20px;">
		<label class="layui-form-label">微商城标题</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-input-300" type="text" name="wshop_title" value="<?php echo htmlspecialchars($this->_data['company_wshop']['wshop_title']); ?>">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">在线支付</label>
		<div class="layui-form-mid layui-word-aux">
			<a href="#" class="laimi-font3">微信支付配置</a> | <a href="#" class="laimi-font3">支付宝支付配置</a>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">发货方式</label>
		<div class="layui-input-inline">
			<input type="radio" name="send_method" value="1" title="快递"<?php if($this->_data['company_wshop']['send_method'] == 1) echo ' checked'; ?>>
			<input type="radio" name="send_method" value="2" title="到店自取"<?php if($this->_data['company_wshop']['send_method'] == 2) echo ' checked'; ?>>
			<input type="radio" name="send_method" value="3" title="用户自主选择"<?php if($this->_data['company_wshop']['send_method'] == 3) echo ' checked'; ?>>
		</div>
	</div>
	<!-- <div class="layui-form-item">
		<label class="layui-form-label">商城发货</label>
		<div class="layui-input-inline">
			<input type="radio" name="send_from" value="1" title="总店发货" <?php if($this->_data['company_wshop']['send_from'] == 1) echo 'checked';?>>
			<input type="radio" name="send_from" value="2" title="分店发货" <?php if($this->_data['company_wshop']['send_from'] == 2) echo 'checked';?>>
		</div>
		<div class="layui-form-mid layui-word-aux">
			总店发货：全部订单总店发货。分店发货：按会员开卡店铺发货，没有开卡店铺的总店发
		</div>
	</div> -->
	<div class="layui-form-item">
		<label class="layui-form-label">分销功能</label>
		<div class="layui-input-inline">
			<input type="radio" name="fenxiao_flag" value="2" title="关闭"<?php if($this->_data['company_wshop']['fenxiao_flag'] == 0) echo ' checked'; ?>>
			<input type="radio" name="fenxiao_flag" value="1" title="1级分销"<?php if($this->_data['company_wshop']['fenxiao_flag'] == 1) echo ' checked'; ?>>
		</div>
		<div class="layui-form-mid layui-word-aux">
			开启后请到“分销佣金”栏目中配置分销佣金
		</div>
	</div>
	<div class="layui-form-item" style="margin-top:20px;">
		<label class="layui-form-label">分享标题</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-input-300" type="text" name="share_title" value="<?php echo htmlspecialchars($this->_data['company_wshop']['share_title']); ?>">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">分享图片</label>
		<input type="hidden" name="share_image" value="">
		<div class="layui-input-inline">
			<div class="layui-upload">
			  <button id="share-image-button" class="layui-btn layui-btn-normal layui-btn-small" type="button">上传图片</button>
			</div>
		</div>
		<div id="share-image-info" class="layui-form-mid layui-word-aux">
			<?php echo $this->_data['company_wshop']['share_image']; ?>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">轮播图1</label>
		<input type="hidden" name="ad_image1" value="">
		<div class="layui-input-inline">
			<div class="layui-upload">
			  <button id="ad-image1-button" class="layui-btn layui-btn-normal layui-btn-small" type="button">上传图片</button>
			</div>
		</div>
		<div id="ad-image1-info" class="layui-form-mid layui-word-aux">
			<?php echo $this->_data['company_wshop']['ad_image1']; ?>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">轮播图2</label>
		<input type="hidden" name="ad_image2" value="">
		<div class="layui-input-inline">
			<div class="layui-upload">
			  <button id="ad-image2-button" class="layui-btn layui-btn-normal layui-btn-small" type="button">上传图片</button>
			</div>
		</div>
		<div id="ad-image2-info" class="layui-form-mid layui-word-aux">
			<?php echo $this->_data['company_wshop']['ad_image2']; ?>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">轮播图3</label>
		<input type="hidden" name="ad_image1" value="">
		<div class="layui-input-inline">
			<div class="layui-upload">
			  <button id="ad-image3-button" class="layui-btn layui-btn-normal layui-btn-small" type="button">上传图片</button>
			</div>
		</div>
		<div id="ad-image3-info" class="layui-form-mid layui-word-aux">
			<?php echo $this->_data['company_wshop']['ad_image3']; ?>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block laimi-input-100">
			<button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>
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
	layui.use(["layer", "element", "form", "upload"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		var objupload = layui.upload;
		objupload.render({
		  elem: '#share-image-button', //绑定元素
		  url: 'pub_upload_do.php', //上传接口
		  exts: 'jpg|gif|png',
		  data: {
		  	type:'image'
		  },
		  before: function(obj) {
		    
		  },
		  done: function(res, index, upload) {
		  	if(res.code == 0) {
		  		$("#laimi-main input[name='share_image']").val(res.image);
		  		$("#share-image-info").text(res.image);
		  	} else {
		  		objlayer.alert('图片上传失败，请联系管理员！', {
			    	title: "提示信息"
			    });
		  		$("#laimi-main input[name='share_image']").val('');
		  	}
		  },
		  error: function() {
		    objlayer.alert('图片上传失败！', {
		    	title: "提示信息"
		    });
		  }
	  });
	  objupload.render({
		  elem: '#ad-image1-button', //绑定元素
		  url: 'pub_upload_do.php', //上传接口
		  exts: 'jpg|gif|png',
		  data: {
		  	type:'image'
		  },
		  before: function(obj) {
		    
		  },
		  done: function(res, index, upload) {
		  	if(res.code == 0) {
		  		$("#laimi-main input[name='ad_image1']").val(res.image);
		  		$("#ad-image1-info").text(res.image);
		  	} else {
		  		objlayer.alert('图片上传失败，请联系管理员！', {
			    	title: "提示信息"
			    });
		  		$("#laimi-main input[name='ad_image1']").val('');
		  	}
		  },
		  error: function() {
		    objlayer.alert('图片上传失败！', {
		    	title: "提示信息"
		    });
		  }
	  });
	  objupload.render({
		  elem: '#ad-image2-button', //绑定元素
		  url: 'pub_upload_do.php', //上传接口
		  exts: 'jpg|gif|png',
		  data: {
		  	type:'image'
		  },
		  before: function(obj) {
		    
		  },
		  done: function(res, index, upload) {
		  	if(res.code == 0) {
		  		$("#laimi-main input[name='ad_image2']").val(res.image);
		  		$("#ad-image2-info").text(res.image);
		  	} else {
		  		objlayer.alert('图片上传失败，请联系管理员！', {
			    	title: "提示信息"
			    });
		  		$("#laimi-main input[name='ad_image2']").val('');
		  	}
		  },
		  error: function() {
		    objlayer.alert('图片上传失败！', {
		    	title: "提示信息"
		    });
		  }
	  });
	  objupload.render({
		  elem: '#ad-image3-button', //绑定元素
		  url: 'pub_upload_do.php', //上传接口
		  exts: 'jpg|gif|png',
		  data: {
		  	type:'image'
		  },
		  before: function(obj) {
		    
		  },
		  done: function(res, index, upload) {
		  	if(res.code == 0) {
		  		$("#laimi-main input[name='ad_image3']").val(res.image);
		  		$("#ad-image3-info").text(res.image);
		  	} else {
		  		objlayer.alert('图片上传失败，请联系管理员！', {
			    	title: "提示信息"
			    });
		  		$("#laimi-main input[name='ad_image3']").val('');
		  	}
		  },
		  error: function() {
		    objlayer.alert('图片上传失败！', {
		    	title: "提示信息"
		    });
		  }
	  });
		objform.on("submit(laimi-submit)", function(data) {
			$.post('wechat_shop_config_do.php', data.field, function(res) {
				alert(res);
				if(res == 0) {
					window.location.reload();
				} else {
					objlayer.alert('修改失败，请联系管理员', {
						title: "提示信息"
					});
				}
			});
			return false;
		});
	});
	</script>
</body>
</html>