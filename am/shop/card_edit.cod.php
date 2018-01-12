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
						<a href="card.php">会员管理</a>
					</li>
					<li class="layui-this">
						<a href="card_edit.php?id=<?php echo $GLOBALS['intid']; ?>">修改会员</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-card-edit layui-tab-content">
<div class="layui-row">
  <form class="layui-form">
  <input type="hidden" name="txtid" value="<?php echo $this->_data['card_info']['card_id']; ?>">
		<div class="layui-row">
		  <div class="layui-col-md9">
				<fieldset class="layui-elem-field">
				  <legend style="font-size:14px;font-weight:bold;">基本信息</legend>
				  <div class="layui-field-box">
				  	<div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">会员卡号</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="txtcode" value="<?php echo htmlspecialchars($this->_data['card_info']['card_code']); ?>">
						    </div>
						  </div>
					  </div>
						<div class="layui-col-md6">
					    <div class="layui-form-item">
						    <label class="layui-form-label">ID卡号</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="txtikey" value="<?php echo htmlspecialchars($this->_data['card_info']['card_ikey']); ?>">
						    </div>
						  </div>
					  </div>
				  	<div class="layui-col-md6">
				      <div class="layui-form-item">
					    	<label class="layui-form-label"><span>*</span> 会员姓名</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="txtname" value="<?php echo htmlspecialchars($this->_data['card_info']['card_name']); ?>" lay-verify="required">
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label"><span>*</span> 性别</label>
						    <div class="layui-input-inline">
						    	<input type="radio" name="txtsex" value="1" title="男"<?php if($this->_data['card_info']['card_sex'] == 1) echo ' checked'; ?>>
									<input type="radio" name="txtsex" value="2" title="女"<?php if($this->_data['card_info']['card_sex'] == 2) echo ' checked'; ?>>
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label"><span>*</span> 手机号码</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="txtphone" value="<?php echo htmlspecialchars($this->_data['card_info']['card_phone']); ?>" lay-verify="required">
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">出生日期</label>
						    <div class="layui-input-inline">
						      <input id="laimi-birthday" class="layui-input laimi-input-200" type="text" name="txtbirthday" value="<?php echo htmlspecialchars($this->_data['card_info']['mybirthday']); ?>" placeholder="yyyy-MM-dd">
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">启用密码</label>
						    <div class="layui-input-inline">
						    	<input type="radio" name="txtpasswordstate" value="1" title="启用"<?php if($this->_data['card_info']['card_password_state'] == 1) echo ' checked'; ?>>
									<input type="radio" name="txtpasswordstate" value="2" title="不启用"<?php if($this->_data['card_info']['card_password_state'] == 2) echo ' checked'; ?>>
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">消费密码</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="password" name="txtpassword" value="<?php echo htmlspecialchars($this->_data['card_info']['card_password']); ?>">
						    </div>
						  </div>
				    </div>
				  </div>
				</fieldset>
				<fieldset class="layui-elem-field">
				  <legend style="font-size:14px;font-weight:bold;">其它信息</legend>
				  <div class="layui-field-box">
				  	<div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">联系人</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="txtlink" value="<?php echo htmlspecialchars($this->_data['card_info']['card_link']); ?>">
						    </div>
					  	</div>
				  	</div>
						<div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">身份证号</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="txtidentity" value="<?php echo htmlspecialchars($this->_data['card_info']['card_identity']); ?>">
						    </div>
							</div>
						</div>
				    <div class="layui-col-md12">
				      <div class="layui-form-item">
					    	<label class="layui-form-label">备注</label>
						    <div class="layui-input-block">
						      <textarea class="layui-textarea laimi-input-b80" placeholder="备注" name="txtmemo"><?php echo htmlspecialchars($this->_data['card_info']['card_memo']); ?></textarea>
						    </div>
					  	</div>
				    </div>
	    		</div>
				</fieldset>
			</div>
		  <div class="layui-col-md3" style="text-align:center;">
	      <div class="layui-upload">
					<div class="layui-upload-list">
						<img id="laimi-photo-file" src="pub_image_file.php?type=card-photo&file=<?php echo $this->_data['card_info']['card_photo_file']; ?>" style="width:180px;height:180px;">
					</div>
					<div style="padding-bottom:15px;">
						<button id="laimi-photo-btn" class="layui-btn layui-btn-normal" type="button">上传照片</button>
						<input id="laimi-photo-name" type="hidden" name="txtphoto" value="">
					</div>
					<!--div>
						<button type="button" class="layui-btn layui-btn-normal" id="test1">在线拍照</button>
					</div-->
				</div>
			</div>
	    <div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit-edit" lay-submit>
		      	完成
		      </button>
		      <button class="layui-btn layui-btn-primary" type="reset">
		      	重置
		      </button>
		    </div>
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
	layui.use(["layer", "element", "form", "laydate", "upload", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objlaydate = layui.laydate;
		var objupload = layui.upload;
		var objform = layui.form;
		objlaydate.render({
			elem: '#laimi-birthday'
		});
		objupload.render({
		  elem: '#laimi-photo-btn',
		  url: './pub_upload_do.php',
		  exts: 'jpg|gif|png',
		  data: {
		  	type:'image'
		  },
		  before: function(obj) {
		    obj.preview(function(index, file, result) {
		      $('#laimi-photo-file').attr("src", result);
		    });
		  },
		  done: function(res, index, upload) {
		  	if(res.code == 0) {
		  		$("#laimi-photo-name").val(res.image);
		  	} else {
		  		objlayer.alert('图片上传失败，请联系管理员！', {
			    	title: "提示信息"
			    });
		  	}
		  },
		  error: function(index, upload) {
		    objlayer.alert('图片上传失败，请联系管理员！', {
		    	title: "提示信息"
		    });
		  }
		});
		objform.on("submit(laimi-submit-edit)", function(objdata) {
			$.post('card_edit_do.php', objdata.field, function(strdata) {
			  if(strdata == 0) {
			    window.location = "card.php";
			  } else if(strdata == 2) {
			    objlayer.alert('会员卡号已存在！', {
						title: '提示信息'
					});
			  } else if(strdata == 3) {
			    objlayer.alert('手机号码已存在！', {
						title: '提示信息'
					});
			  } else if(strdata == 4) {
			    objlayer.alert('消费密码未设置！', {
						title: '提示信息'
					});
			  } else {
			    objlayer.alert('修改会员失败，请联系管理员！', {
						title: '提示信息'
					});
			  }
			});
			return false;
		});
	});
	</script>
</body>
</html>