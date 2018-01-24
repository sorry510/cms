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
						<a href="card_add.php">新增会员</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-card-add layui-tab-content">
<div class="layui-row">
  <form class="layui-form">
		<div class="layui-row">
		  <div class="layui-col-md9">
				<fieldset class="layui-elem-field">
				  <legend style="font-size:14px;font-weight:bold;">基本信息</legend>
				  <div class="layui-field-box">
				  	<div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">会员卡号</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="txtcode">
						    </div>
						  </div>
					  </div>
						<div class="layui-col-md6">
					    <div class="layui-form-item">
						    <label class="layui-form-label">ID卡号</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="txtikey">
						    </div>
						  </div>
					  </div>
				  	<div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label"><span>*</span> 会员姓名</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="txtname" lay-verify="required">
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label"><span>*</span> 性别</label>
						    <div class="layui-input-inline">
						    <input type="radio" name="txtsex" value="1" title="男">
								<input type="radio" name="txtsex" value="2" title="女" checked>
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label"><span>*</span> 手机号码</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="txtphone" lay-verify="phone">
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">出生日期</label>
						    <div class="layui-input-inline">
						      <input id="laimi-birthday" class="layui-input laimi-input-200" type="text" name="txtbirthday" placeholder="yyyy-MM-dd">
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">启用密码</label>
						    <div class="layui-input-inline">
						    <input type="radio" name="txtpasswordstate" value="1" title="启用">
								<input type="radio" name="txtpasswordstate" value="2" title="不启用" checked>
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">消费密码</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="password" name="txtpassword" autocomplete="new-password">
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
						      <input class="layui-input laimi-input-200" type="text" name="txtlink">
						    </div>
						  </div>
				    </div>
						<div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">身份证号</label>
						    <div class="layui-input-inline">
						      <input class="layui-input laimi-input-200" type="text" name="txtidentity">
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md6">
				      <div class="layui-form-item">
						    <label class="layui-form-label">推荐人</label>
						    <div class="layui-input-inline">
						      <select name="txtworker" lay-search style="height:100px;">
					          <option value="">请选择服务人员</option>
					          <?php
					          $j = 0;
					          foreach($this->_data['worker_group_list'] as $row) {
					          	echo '<optgroup label="' . $row['worker_group_name'] . '">';
					          	for($i = $j; $i < count($this->_data['worker_list']); $i = $i + 1) {
					          		if($this->_data['worker_list'][$i]['worker_group_id'] == $row['worker_group_id']) {
					          			echo '<option value="' . $this->_data['worker_list'][$i]['worker_id'] . '">' . $this->_data['worker_list'][$i]['worker_name'] . '</option>';
					          			$j = $i;
					          		}
					          	}
					          	echo '</optgroup>';
					          }
					          ?>
					        </select>
						    </div>
						  </div>
				    </div>
				    <div class="layui-col-md12">
				      <div class="layui-form-item">
						    <label class="layui-form-label">备注</label>
						    <div class="layui-input-block">
						      <textarea class="layui-textarea laimi-input-b80" name="txtmemo" placeholder="备注"></textarea>
						    </div>
						  </div>
				  	</div>
		    	</div>
				</fieldset>
			</div>
		  <div class="layui-col-md3" style="text-align:center;">
	      <div class="layui-upload">
					<div class="layui-upload-list">
						<img id="laimi-photo-file" src="pub_image_file.php?type=card-photo&file=" style="width:180px;height:180px;">
					</div>
					<div style="padding-bottom:15px;">
						<button id="laimi-photo-btn" class="layui-btn layui-btn-normal" type="button">上传照片</button>
						<input id="laimi-photo-name" type="hidden" name="txtphoto" value="">
					</div>
					<!--div>
						<button type="button" class="layui-btn layui-btn-normal" id="online-photo">在线拍照</button>
					</div-->
				</div>
			</div>
		  <div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit-add" lay-submit>
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
	<script type="text/html" id="laimi-script-photo">
		<div id="laimi-modal-photo" class="laimi-modal">
			<div class="layui-col-md6">
		　	<video width="200" height="150"></video>
			</div>
			<div class="layui-col-md6">
	    <canvas width="200" height="150"></canvas>
	    </div>
	    <div class="layui-col-md12 laimi-height-20">
	    &nbsp;
	    </div>
	    <div class="layui-col-md6">
	    	<button class="layui-btn laimi-button-100" id="snap">截取图像</button>
	    	<button class="layui-btn laimi-button-100" id="upload">上传图像</button>
	    </div>
	     <div class="layui-col-md6">
	    	&nbsp;
	    </div>
	    <div class="layui-col-md12 laimi-height-20">
	    &nbsp;
	    </div>
	      <!-- <button id="close">关闭摄像头</button> -->
		    <!-- <img id="uploaded" width="200" height="150" /> -->
		</div>
	</script>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "laydate", "upload", "form"], function() {
		var $ = layui.jquery;
		var jQuery = layui.jquery;
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
		objform.on("submit(laimi-submit-add)", function(objdata) {
			$.post('card_add_do.php', objdata.field, function(strdata) {
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
			    objlayer.alert('新增会员失败，请联系管理员！', {
						title: '提示信息'
					});
			  }
			});
			return false;
		});
		//在线上传照片
		/*$('#online-photo').on('click', function(){
			if(window.navigator.userAgent.indexOf("Firefox") !== -1){
				objlayer.open({
					type: 1,
					title: ["在线拍照", "font-size:16px;"],
					btnAlign: "r",
					area: ["500px", "auto"],
					shadeClose: true,//点击遮罩关闭
					content: $('#laimi-script-photo').html(),
					success: function(){
							openCamera();
			    },
			    end: function(){
			    	mediaStreamTrack && mediaStreamTrack.stop();
			    }
				});
			}
		})
		var mediaStreamTrack = null;
		function openCamera() {
			function $(elem) {
	      return document.querySelector(elem);
	    }
		  // 获取媒体方法（旧方法）
	    navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMeddia || navigator.msGetUserMedia;
	
	    var canvas = $('canvas'),
	        context = canvas.getContext('2d'),
	        video = $('video'),
	        snap = $('#snap'),
	        close = $('#close'),
	        upload = $('#upload');
	
	    // 获取媒体方法（新方法）
	    // 使用新方法打开摄像头
	    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
				navigator.mediaDevices.getUserMedia({
				   video: true,
				   audio: true
				}).then(function(stream) {
				   // console.log(stream);
	
				   mediaStreamTrack = typeof stream.stop === 'function' ? stream : stream.getTracks()[1];
	
				   video.src = (window.URL || window.webkitURL).createObjectURL(stream);
				   video.play();
				}).catch(function(err) {
				   console.log(err);
				})
	    }
	    // 使用旧方法打开摄像头
	    else if (navigator.getMedia) {
				navigator.getMedia({
				   video: true
				}, function(stream) {
				   mediaStreamTrack = stream.getTracks()[0];
	
				   video.src = (window.URL || window.webkitURL).createObjectURL(stream);
				   video.play();
				}, function(err) {
				   console.log(err);
				});
	    }
	   // 截取图像
			snap.addEventListener('click', function() {
			   context.drawImage(video, 0, 0, 200, 150);
			}, false);
	    // 关闭摄像头
			// close.addEventListener('click', function() {
			//    mediaStreamTrack && mediaStreamTrack.stop();
			// }, false);
	  	// 上传截取的图像
			upload.addEventListener('click', function() {
			   jQuery.post('upload_snap_do.php', {
			       snapData: canvas.toDataURL('image/png')
			   }).done(function(res) {
			       res = JSON.parse(res);
			       if(res.code == 200){
			       	jQuery("#laimi-main input[name='txtphoto']").val(res.photo);
			       	var url = "../photo/temp/"+res.photo;
			       	jQuery('#img').attr('src', url);
			       }
			       console.log(res);
			   }).fail(function(err) {
			       console.log(err);
			   });
			}, false);
		}*/
	});
	</script>
</body>
</html>