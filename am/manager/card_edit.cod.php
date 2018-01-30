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
						      <input class="layui-input laimi-input-200" type="password" name="txtpassword" autocomplete="new-password" value="<?php echo htmlspecialchars($this->_data['card_info']['card_password']); ?>">
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
				<fieldset class="layui-elem-field">
				  <legend style="font-size:14px;font-weight:bold;">会员卡信息</legend>
				  <div class="layui-field-box">
				  	<div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">会员余额¥</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="s_card_ymoney" value="<?php echo htmlspecialchars($this->_data['card_info']['s_card_ymoney']); ?>">
						    </div>
						  </div>
					  </div>
						<div class="layui-col-md6">
					    <div class="layui-form-item">
						    <label class="layui-form-label">卡余积分</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="s_card_yscore" value="<?php echo htmlspecialchars($this->_data['card_info']['s_card_yscore']); ?>">
						    </div>
						  </div>
					  </div>
				  	<div class="layui-col-md6">
				      <div class="layui-form-item">
					    	<label class="layui-form-label">累计消费¥</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="s_card_smoney" value="<?php echo htmlspecialchars($this->_data['card_info']['s_card_smoney']); ?>">
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">卡类型</label>
						    <div class="layui-input-inline">
						    	<select name="card_type_id">
						    		<option value="">全部卡类型</option>
						    		<?php foreach($this->_data['card_type_list'] as $row) { ?>
						    		<option value="<?php echo $row['card_type_id']; ?>"<?php if($row['card_type_id'] == $this->_data['card_info']['card_type_id']) echo " selected"; ?>><?php echo $row['card_type_name']; ?></option>
						    		<?php } ?>
						    	</select>
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">到期时间</label>
						    <div class="layui-input-inline">
						       <input id="laimi-edate" class="layui-input laimi-input-200" type="text" name="card_edate" value="<?php echo htmlspecialchars($this->_data['card_info']['myedate']); ?>" placeholder="yyyy-MM-dd">
						    </div>
						  </div>
				    </div>
				  </div>
				</fieldset>
				<?php if(!empty($this->_data['card_info']['mcombo'])) { ?>
				<fieldset class="layui-elem-field">
				  <legend style="font-size:14px;font-weight:bold;">套餐信息</legend>
				  <div class="layui-field-box">
	 		    	<table class="layui-table">
	 					  <thead>
	 					    <tr>
	 					      <th>名称</th>
	 					      <th>价格</th>
	 					      <th>类型</th>
	 					      <th>数量</th>
	 					      <th>到期时间</th>
	 					    </tr>
	 					  </thead>
	 					  <tbody>
	 					  <?php foreach($this->_data['card_info']['mcombo'] as $row) { ?>
	 					    <tr>
	 					      <td><?php echo $row['c_mgoods_name']; ?></td>
	 					      <td><?php echo $row['c_mgoods_price']; ?>元</td>
	 					      <td><?php echo $row['c_mcombo_type'] == 1 ? '计次' : '计时'; ?></td>
	 					      <td>
	 					      <?php if($row['c_mcombo_type'] == 2) { ?>
	 					      	--<input mid="<?php echo $row['card_mcombo_id']; ?>" class="layui-input laimi-num" type="hidden" value="<?php echo htmlspecialchars($row['card_mcombo_gcount']); ?>">
	 					      <?php } else { ?>
		 					      <div class="layui-input-inline">
							      	<input mid="<?php echo $row['card_mcombo_id']; ?>" class="layui-input laimi-num"  type="text" value="<?php echo htmlspecialchars($row['card_mcombo_gcount']); ?>" style="width:50px;padding:5px;text-align:center;">
							    	</div>
	 					      <?php } ?>
	 					      </td>
	 					      <td>
		 					      <div class="layui-input-inline">
							      	<input mid="<?php echo $row['card_mcombo_id']; ?>" class="layui-input laimi-input-200 laimi-date" type="text" value="<?php echo htmlspecialchars($row['edate']); ?>">
							    	</div>
						    	</td>
	 					    </tr>
	 					  <?php } ?>
	 					  </tbody>
	 					</table>
				  </div>
				</fieldset>
				<?php } ?>
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
		objlaydate.render({
			elem: '#laimi-edate'
		});
		objlaydate.render({
			elem: '.laimi-date'
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
			var data = objdata.field;
			var arrmcombo = [];
			$('.laimi-date').each(function() {
	      arrmcombo.push({
        	'card_mcombo_id': $(this).attr('mid'),
        	'edate': $(this).val(),
        	'num': $(".laimi-num[mid='"+$(this).attr('mid')+"']").val()
        });
			})
			data.mcombo = arrmcombo;
			$.post('card_edit_do.php', data, function(strdata) {
			  if(strdata == 0) {
			    window.location.reload();
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