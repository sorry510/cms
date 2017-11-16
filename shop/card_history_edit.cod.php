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
						<a href="card_history_edit.php?id=<?php echo $this->_data['card_history']['card_history_id']; ?>">修改电子档案</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<div class="layui-row">
    <form class="layui-form">
		<div class="layui-row">
			<blockquote class="layui-elem-quote" style="height:40px;">
				<div class="layui-form-item">
					<div class="layui-input-inline">
						<label class="layui-form-label" style="width:40px;">卡号:</label>
						<div class="layui-form-mid laimi-color-ju laimi-card-code"><?php echo htmlspecialchars($this->_data['card_history']['c_card_code']); ?></div>
						<label class="layui-form-label" style="width:40px;">姓名:</label>
						<div class="layui-form-mid laimi-color-ju"><span class="laimi-card-name"><?php echo htmlspecialchars($this->_data['card_history']['c_card_name']); ?></span>，<span class="laimi-card-sex"><?php echo htmlspecialchars($this->_data['card_history']['sex']); ?></span>，<span class="laimi-card-age"><?php echo htmlspecialchars($this->_data['card_history']['age']); ?></span>，<span class="laimi-card-phone"><?php echo htmlspecialchars($this->_data['card_history']['c_card_phone']); ?></span>，<span class="laimi-card-type"><?php echo htmlspecialchars($this->_data['card_history']['c_card_type_name']); ?></span></div>
						<input type="hidden" name="txthistory" value="<?php echo htmlspecialchars($this->_data['card_history']['card_history_id']); ?>">
					</div>
				</div>
			</blockquote>
			<fieldset class="layui-elem-field">
			  <legend style="font-size: 14px;font-weight: bold;">档案内容 </legend>
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
			 			  <button type="button" class="layui-btn layui-btn-normal" id="photolist">选择多文件</button> 
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
			 			      <tbody id="showList">
			 			      <?php for($i = 0; $i < 5; $i++){ ?>
			 			      	<?php if($strp = $this->_data['card_history']['card_history_photo'.($i+1)]){ ?>
			 			      	<tr style="padding:3px;">
			 			      		<td><img src="<?php echo "read_image.php?c=".$GLOBALS['_SESSION']['login_cid']."&type=history&image=".$strp;?>" width="60" height="60"/></td>
			 			      		<td><?php echo $strp; ?></td>
			 			      		<td>--</td>
			 			      		<td>已存在</td>
			 			      		<td><button type="button" class="layui-btn layui-btn-mini layui-btn-danger laimi-del" pkey="<?php echo $i+1; ?>" value="<?php echo $strp; ?>">删除</button></td>
			 			      	</tr>
			 			      	<?php } ?>
			 			      <?php } ?>
			 			      </tbody>
			 			    </table>
			 			  </div>
			 			  <button type="button" class="layui-btn" id="photolistAction">开始上传</button>
			 			</div>
			 		</div>
			  </div>
			  <!-- <div class="layui-form-item" style="margin-bottom:30px;">
			  	<label class="layui-form-label">图片上传</label>
			  	<div class="layui-input-block">
			      <button type="button" class="layui-btn" id="laimi-upload">多图片上传</button>
			    </div>
			    <div class="layui-input-block">
			      <blockquote class="layui-elem-quote layui-quote-nm laimi-input-b80" style="margin-top: 10px;">
				    预览图：
				    	<div class="layui-upload-list layui-row" id="laimi-photos">
							<?php if($strp1 = $this->_data['card_history']['card_history_photo1']){ ?>
							<div class="laimi-photo layui-col-lg2">
				    		<img src="read_image.php?c=<?php echo $GLOBALS['_SESSION']['login_cid']."&type=history&image=".$strp1; ?>" alt="" class="layui-upload-img" style="width:90%;height:120px;margin-right:10%;">
				    		<span class="layui-layer-setwin" style="position:absolute; right:12%; top:2px;"><a class="layui-layer-ico layui-layer-close layui-layer-close1 laimi-del-photo" href="javascript:;"></a></span>
				    	</div>
				    	<?php } ?>
				    	<?php if($strp2 = $this->_data['card_history']['card_history_photo2']){ ?>
							<div class="laimi-photo layui-col-lg2">
				    		<img src="read_image.php?c=<?php echo $GLOBALS['_SESSION']['login_cid']."&type=history&image=".$strp2; ?>" alt="" class="layui-upload-img" style="width:90%;height:120px;margin-right:10%;">
				    		<span class="layui-layer-setwin" style="position:absolute; right:12%; top:2px;"><a class="layui-layer-ico layui-layer-close layui-layer-close1 laimi-del-photo" href="javascript:;"></a></span>
				    	</div>
				    	<?php } ?>
				    	<?php if($strp3 = $this->_data['card_history']['card_history_photo3']){ ?>
							<div class="laimi-photo layui-col-lg2">
				    		<img src="read_image.php?c=<?php echo $GLOBALS['_SESSION']['login_cid']."&type=history&image=".$strp3; ?>" alt="" class="layui-upload-img" style="width:90%;height:120px;margin-right:10%;">
				    		<span class="layui-layer-setwin" style="position:absolute; right:12%; top:2px;"><a class="layui-layer-ico layui-layer-close layui-layer-close1 laimi-del-photo" href="javascript:;"></a></span>
				    	</div>
				    	<?php } ?>
				    	<?php if($strp4 = $this->_data['card_history']['card_history_photo3']){ ?>
							<div class="laimi-photo layui-col-lg2">
				    		<img src="read_image.php?c=<?php echo $GLOBALS['_SESSION']['login_cid']."&type=history&image=".$strp4; ?>" alt="" class="layui-upload-img" style="width:90%;height:120px;margin-right:10%;">
				    		<span class="layui-layer-setwin" style="position:absolute; right:12%; top:2px;"><a class="layui-layer-ico layui-layer-close layui-layer-close1 laimi-del-photo" href="javascript:;"></a></span>
				    	</div>
				    	<?php } ?>
				    	<?php if($strp5 = $this->_data['card_history']['card_history_photo5']){ ?>
							<div class="laimi-photo layui-col-lg2">
				    		<img src="read_image.php?c=<?php echo $GLOBALS['_SESSION']['login_cid']."&type=history&image=".$strp5; ?>" alt="" class="layui-upload-img" style="width:90%;height:120px;margin-right:10%;">
				    		<span class="layui-layer-setwin" style="position:absolute; right:12%; top:2px;"><a class="layui-layer-ico layui-layer-close layui-layer-close1 laimi-del-photo" href="javascript:;"></a></span>
				    	</div>
				    	<?php } ?>
				    	</div>
				 		</blockquote>
			  	</div>
			  </div> -->
		    <div class="layui-form-item">
		      <label class="layui-form-label">服务人员</label>
			    <div class="layui-input-block" style="width:200px;">
			      <select name="txtworker" lay-search="">
		          <option value="">请选择服务人员</option>
		          <?php foreach($this->_data['worker_list'] as $row){ ?>
		          <option value="<?php echo $row['worker_id']; ?>" <?php if($this->_data['card_history']['worker_id'] == $row['worker_id']) echo 'selected'; ?>><?php echo $row['worker_name']; ?></option>
		          <?php } ?>
			      </select>
			    </div>
		    </div>
		    <div class="layui-form-item">
		      <label class="layui-form-label">添加时间</label>
			    <div class="layui-input-block">
			       <input id="laimi-to" class="layui-input laimi-input-200" type="text" name="txttime" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['card_history']['atime']); ?>">
			    </div>
		    </div>
			</fieldset>
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
	layui.use(["element", "layer", "form", "upload", "laydate"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		var objupload = layui.upload;
		var objlaydate = layui.laydate;
		var photo = [];
		<?php if($strp1 = $this->_data['card_history']['card_history_photo1']){ ?>
			photo[0] = {'photo': '<?php echo $strp1; ?>'};
		<?php } ?>
		<?php if($strp2 = $this->_data['card_history']['card_history_photo1']){ ?>
			photo[1] = {'photo': '<?php echo $strp2; ?>'};
		<?php } ?>
		<?php if($strp3 = $this->_data['card_history']['card_history_photo1']){ ?>
			photo[2] = {'photo': '<?php echo $strp3; ?>'};
		<?php } ?>
		<?php if($strp4 = $this->_data['card_history']['card_history_photo1']){ ?>
			photo[3] = {'photo': '<?php echo $strp4; ?>'};
		<?php } ?>
		<?php if($strp5 = $this->_data['card_history']['card_history_photo1']){ ?>
			photo[4] = {'photo': '<?php echo $strp5; ?>'};
		<?php } ?>
		//多文件列表
		var photo = [];
		var file = {};
	  var showListView = $('#showList'),
	  uploadListIns = objupload.render({
	    elem: '#photolist'
	    ,url: './upload_do.php'
	    ,multiple: true
	    ,auto: false
	    ,size: 1024
	    ,bindAction: '#photolistAction'
	    ,choose: function(obj){
	      files = obj.pushFile(); //将每次选择的文件追加到文件队列
	      // 读取本地文件
	      obj.preview(function(index, file, result){
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
	    }
	    ,done: function(res, index, upload){
	    	var _this = this;
	      if(res.code == 200){ //上传成功
	        var data = {
	        	id: <?php echo $this->_data['card_history']['card_history_id']; ?>,
	        	photo: res.data.photo
	        };
	        $.post('card_history_update_photo_do.php', data, function(msg){
	        	if(msg == 0){
	        		var tr = showListView.find('tr#upload-'+ index)
	        		,tds = tr.children();
	        		tds.eq(3).html('<span style="color: #5FB878;">上传成功</span>');
	        		tds.eq(4).html(''); //清空操作
	        		delete files[index]; //删除文件队列已经上传成功的文件
	        	}else if(msg == 2){
	        		objlayer.alert('图片数量最多为5张，更新失败', {
	        			title: '提示信息'
	        		});
	        		_this.error(index, upload);
	        	}else{
	        		objlayer.alert('更新失败', {
	        			title: '提示信息'
	        		});
	        	}
	        })
	        return;
	      }
	      this.error(index, upload);
	    }
	    ,error: function(index, upload){
	      var tr = showListView.find('tr#upload-'+ index)
	      ,tds = tr.children();
	      tds.eq(3).html('<span style="color: #FF5722;">上传失败</span>');
	      tds.eq(4).find('.demo-reload').removeClass('layui-hide'); //显示重传
	    }
	  });
		objlaydate.render({
			elem: '#laimi-to'
		});
		objform.on("submit(laimi-submit)", function(data) {
			// data.field.photo = photo;
			$.post('card_history_edit_do.php', data.field, function(msg){
			  if(msg == 0){
			    window.location.href='card_history.php';
			  }else{
			    objlayer.alert('修改失败，请联系管理员', {
						title: '提示信息'
					});
			  }
			})
			return false;
		})
		$('.laimi-del').on('click', function(){
			var _this = $(this);
			var data = {
				id: <?php echo $this->_data['card_history']['card_history_id']; ?>,
				key: $(this).attr('pkey'),
				photo: $(this).val()
			}
			$.post('card_history_del_photo_do.php', data, function(msg){
				if(msg == 0){
					_this.parent().parent().remove();
				}else{
					objlayer.alert('删除失败', {
						title: '提示信息'
					});
				}
			})
		})
	});
</script>
</body>
</html>