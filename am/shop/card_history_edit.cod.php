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
						<a href="card_history.php">电子档案</a>
					</li>
					<li class="layui-this">
						<a href="card_history_edit.php?id=<?php echo $GLOBALS['intid']; ?>">修改电子档案</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<div class="layui-row">
  <form class="layui-form">
  <input id="laimi-card-id" type="hidden" name="txtid" value="<?php echo $GLOBALS['intid']; ?>">
		<div class="layui-row">
			<blockquote class="layui-elem-quote" style="height:40px;">
				<div class="layui-form-item">
					<div class="layui-input-inline">
						<label class="layui-form-label" style="padding-right:0px;width:60px;">卡号：</label>
						<div id="laimi-card-code" class="layui-form-mid laimi-color-ju"><?php echo $this->_data['card_history']['c_card_code']; ?></div>
						<label class="layui-form-label" style="padding-right:0px;width:60px;">姓名：</label>
						<div id="laimi-card-name" class="layui-form-mid laimi-color-ju"><?php echo $this->_data['card_history']['c_card_name']; ?></div>
						<label class="layui-form-label" style="padding-right:0px;width:60px;">性别：</label>
						<div id="laimi-card-sex" class="layui-form-mid laimi-color-ju"><?php echo $this->_data['card_history']['mysex']; ?></div>
						<label class="layui-form-label" style="padding-right:0px;width:60px;">年龄：</label>
						<div id="laimi-card-age" class="layui-form-mid laimi-color-ju"><?php echo $this->_data['card_history']['c_card_age']; ?></div>
						<label class="layui-form-label" style="padding-right:0px;width:60px;">手机：</label>
						<div id="laimi-card-phone" class="layui-form-mid laimi-color-ju"><?php echo $this->_data['card_history']['c_card_phone']; ?></div>
						<label class="layui-form-label" style="padding-right:0px;width:60px;">卡类型：</label>
						<div id="laimi-card-type" class="layui-form-mid laimi-color-ju"><?php echo $this->_data['card_history']['c_card_type_name']; ?></div>
					</div>
				</div>
			</blockquote>
			<fieldset class="layui-elem-field">
			  <legend style="font-size:14px;font-weight:bold;">档案内容 </legend>
	      <div class="layui-form-item" style="margin-top:30px;">
	      	<label class="layui-form-label">问题描述</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtquestion"><?php echo htmlspecialchars($this->_data['card_history']['card_history_question']); ?></textarea>
			    </div>
		  	</div>
			  <div class="layui-form-item">
		      <label class="layui-form-label">诊疗结果</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtresult"><?php echo htmlspecialchars($this->_data['card_history']['card_history_result']); ?></textarea>
			    </div>
			  </div>
			  <div class="layui-form-item">
		      <label class="layui-form-label">诊疗方案</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtplan"><?php echo htmlspecialchars($this->_data['card_history']['card_history_plan']); ?></textarea>
			    </div>
			  </div>
			  <div class="layui-form-item" style="margin-bottom:30px;">
			 		<label class="layui-form-label">图片上传</label>
			 		<div class="layui-input-block">
			 			<div class="layui-upload">
			 			  <button id="laimi-file-select" type="button" class="layui-btn layui-btn-normal">选择多文件</button>
			 			  <div class="layui-upload-list">
			 			    <table class="layui-table" style="width:80%;">
			 			      <thead>
			 			        <tr>
			 			        <th>预览图</th>
			 			        <th>文件名</th>
			 			        <th>大小</th>
			 			        <th>状态</th>
			 			        <th>操作</th>
			 			      </tr></thead>
			 			      <tbody id="laimi-file-list">
			 			      <?php for($i = 1; $i <= 5; $i++) { ?>
			 			      	<?php if($this->_data['card_history']['card_history_photo' . $i] != '') { ?>
			 			      	<tr style="padding:3px;">
			 			      		<td><img src="<?php echo "pub_image_file.php?type=card-history&file=" . $this->_data['card_history']['card_history_photo' . $i]; ?>" width="60" height="60"></td>
			 			      		<td><?php echo $this->_data['card_history']['card_history_photo' . $i]; ?></td>
			 			      		<td>--</td>
			 			      		<td>已存在</td>
			 			      		<td><button class="layui-btn layui-btn-mini layui-btn-danger laimi-del2" type="button" card_history_id="<?php echo $this->_data['card_history']['card_history_id']; ?>" key="<?php echo $i; ?>">删除</button></td>
			 			      	</tr>
			 			      	<?php } ?>
			 			      <?php } ?>
			 			      </tbody>
			 			    </table>
			 			  </div>
			 			  <button id="laimi-file-upload" class="layui-btn" type="button">开始上传</button>
			 			</div>
			 		</div>
			  </div>
		    <div class="layui-form-item">
		      <label class="layui-form-label">服务人员</label>
			    <div class="layui-input-block" style="width:200px;">
			      <select name="txtworker" lay-search lay-verify="required" style="height:100px;">
		          <option value="">请选择服务人员</option>
		          <?php
		          $j = 0;
		          foreach($this->_data['worker_group_list'] as $row) {
		          	echo '<optgroup label="' . $row['worker_group_name'] . '">';
		          	for($i = $j; $i < count($this->_data['worker_list']); $i = $i + 1) {
		          		if($this->_data['worker_list'][$i]['worker_group_id'] == $row['worker_group_id']) {
		          			if($this->_data['worker_list'][$i]['worker_id'] == $this->_data['card_history']['worker_id']) {
		          				echo '<option value="' . $this->_data['worker_list'][$i]['worker_id'] . '" selected>' . $this->_data['worker_list'][$i]['worker_name'] . '</option>';
		          			} else {
		          				echo '<option value="' . $this->_data['worker_list'][$i]['worker_id'] . '">' . $this->_data['worker_list'][$i]['worker_name'] . '</option>';
		          			}
		          			$j = $i;
		          		}
		          	}
		          	echo '</optgroup>';
		          }
		          ?>
			      </select>
			    </div>
		    </div>
		    <div class="layui-form-item">
		      <label class="layui-form-label">添加时间</label>
			    <div class="layui-input-block">
			      <input id="laimi-time" class="layui-input laimi-input-200" type="text" name="txttime" value="<?php echo date('Y-m-d', $this->_data['card_history']['card_history_atime']); ?>" placeholder="yyyy-MM-dd" lay-verify="required">
			    </div>
		    </div>
			</fieldset>
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
	layui.use(["layer", "element", "laydate", "upload", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objlaydate = layui.laydate;
		var objupload = layui.upload;
		var objform = layui.form;
		objlaydate.render({
			elem: '#laimi-time'
		});
		//多文件列表
		var photo = [];
		var file = {};
	  var showListView = $('#laimi-file-list');
	  objupload.render({
	    elem: '#laimi-file-select',
	    url: 'pub_upload_do.php',
	    exts: 'jpg|gif|png',
		  data: {
		  	type:'image'
		  },
	    multiple: true,
	    auto: false,
	    bindAction: '#laimi-file-upload',
	    choose: function(obj) {
	      files = obj.pushFile(); //将每次选择的文件追加到文件队列
	      // 读取本地文件
	      obj.preview(function(index, file, result) {
	        var tr = $(['<tr id="upload-'+ index +'">'
	        ,'<td style="padding:3px;"><img src="'+result+'" width="60" height="60"/></td>'
	          ,'<td>'+ file.name +'</td>'
	          ,'<td>'+ (file.size/1014).toFixed(1) +'kb</td>'
	          ,'<td>等待上传</td>'
	          ,'<td>'
	            ,'<button class="layui-btn layui-btn-mini demo-reload layui-hide">重传</button>'
	            ,'<button class="layui-btn layui-btn-mini layui-btn-danger demo-delete">删除</button>'
	          ,'</td>'
	        ,'</tr>'].join(''));
	        //单个重传
	        tr.find('.demo-reload').on('click', function(){
	          obj.upload(index, file);
	        });
	        //删除
	        tr.find('.demo-delete').on('click', function(){
	          delete files[index]; //删除对应的文件
	          tr.remove();
	        });
	        showListView.append(tr);
	      });
	    },
	    done: function(res, index, upload) {
	      if(res.code == 0) { //上传成功
	        var tr = showListView.find('tr#upload-'+ index), tds = tr.children();
	        tds.eq(3).html('<span style="color: #5FB878;">上传成功</span>');
	        tds.eq(4).html(''); //清空操作
	        delete files[index]; //删除文件队列已经上传成功的文件
	        photo.push(res.image);
	        return;
	      }
	      this.error(index, upload);
	    },
	    error: function(index, upload){
	      var tr = showListView.find('tr#upload-'+ index)
	      ,tds = tr.children();
	      tds.eq(3).html('<span style="color: #FF5722;">上传失败</span>');
	      tds.eq(4).find('.demo-reload').removeClass('layui-hide'); //显示重传
	    }
	  });
		objform.on("submit(laimi-submit-edit)", function(objdata) {
			objdata.field.photo = photo;
			$.post("card_history_edit_do.php", objdata.field, function(strdata) {
			  if(strdata == 0) {
			    window.location.href = "card_history.php";
			  } else {
			    objlayer.alert('修改电子档案失败，请联系管理员！', {
						title: '提示信息'
					});
					return false;
			  }
			});
			return false;
		})
		$(".laimi-del2").on("click", function() {
			var objthis = $(this);
			objlayer.confirm('确定要删除该图片吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
				$.post('card_history_delete_file_do.php', {id:<?php echo $this->_data['card_history']['card_history_id']; ?>,key:objthis.attr("key")}, function(strdata) {
					if(strdata == 0) {
						objthis.parent().parent().remove();
					} else {
						objlayer.alert('删除文件失败！', {
							title: '提示信息'
						});
					}
				});
				objlayer.close(hindex);
			});
		});
	});
	</script>
</body>
</html>