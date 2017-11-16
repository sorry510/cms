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
						<a href="card_history_add.php">新增电子档案</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<div class="layui-row">
    <form class="layui-form">
		<div class="layui-row">
			<blockquote class="layui-elem-quote" style="height:40px;">
				<div class="layui-form-item">
					<label class="layui-form-label" style="width:40px;">*会员</label>
					<div class="layui-input-inline last">
						<input class="layui-input laimi-input-200 laimi-search" type="text" name="search" placeholder="卡号/手机号/姓名" lay-verify="required">
						<input type="hidden" name="txtid" class="laimi-card-id" lay-verify="required">
					</div>
					<div class="layui-input-inline">
						<button type="button" class="layui-btn layui-btn-normal laimi-card-search">搜索</button>
					</div>
					<div class="layui-input-inline">
						<label class="layui-form-label" style="width:40px;">卡号:</label>
						<div class="layui-form-mid laimi-color-ju laimi-card-code"></div>
						<label class="layui-form-label" style="width:40px;">姓名:</label>
						<div class="layui-form-mid laimi-color-ju"><span class="laimi-card-name">--</span>，<span class="laimi-card-sex">--</span>，<span class="laimi-card-age">--</span>，<span class="laimi-card-phone">--</span>，<span class="laimi-card-type">--</span></div>
					</div>
				</div>
			</blockquote>
			<fieldset class="layui-elem-field">
			  <legend style="font-size: 14px;font-weight: bold;">档案内容 </legend>
	      <div class="layui-form-item" style="margin-top:30px;">
	      	<label class="layui-form-label">问题描述</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtquestion" lay-verify="required"></textarea>
			    </div>
		  	</div>
			  <div class="layui-form-item">
		      <label class="layui-form-label">诊疗结果</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtresult" lay-verify="required"></textarea>
			    </div>
			  </div>
			  <div class="layui-form-item">
		      <label class="layui-form-label">诊疗方案</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtplan" lay-verify="required"></textarea>
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
			 			      <tbody id="showList"></tbody>
			 			    </table>
			 			  </div>
			 			  <button type="button" class="layui-btn" id="photolistAction">开始上传</button>
			 			</div>
			 		</div>
			  </div>
		    <div class="layui-form-item">
		      <label class="layui-form-label">服务人员</label>
			    <div class="layui-input-block" style="width:200px;">
			      <select name="txtworker" lay-search="" lay-verify="required">
		          <option value="">请选择服务人员</option>
		          <?php foreach($this->_data['worker_list'] as $row){ ?>
		          <option value="<?php echo $row['worker_id']; ?>"><?php echo $row['worker_name']; ?></option>
		          <?php } ?>
			      </select>
			    </div>
		    </div>
		    <div class="layui-form-item">
		      <label class="layui-form-label">添加时间</label>
			    <div class="layui-input-block">
			       <input id="laimi-to" class="layui-input laimi-input-200" type="text" name="txttime" placeholder="yyyy-MM-dd" lay-verify="required">
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
	      if(res.code == 200){ //上传成功
	        var tr = showListView.find('tr#upload-'+ index)
	        ,tds = tr.children();
	        tds.eq(3).html('<span style="color: #5FB878;">上传成功</span>');
	        tds.eq(4).html(''); //清空操作
	        delete files[index]; //删除文件队列已经上传成功的文件
	        photo.push(res.data);
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
			data.field.photo = photo;
			// console.log(data.field);return false;
			$.post('card_history_add_do.php', data.field, function(msg){
			  console.log(msg);
			  if(msg == 0){
			    window.location.href='card_history.php';
			  }else{
			    objlayer.alert('新增失败，请联系管理员', {
						title: '提示信息'
					});
			  }
			})
			return false;
		})
		//查询会员
		$(".laimi-card-search").on('click', function(){
			var search = $('.laimi-search').val();
			$.getJSON('card_search_ajax.php', {search: search}, function(cardlist){
				if(cardlist){
					//可能会有多个，暂时只处理第一个
					var cardinfo = cardlist[0];
					if(cardinfo){
						$(".laimi-card-code").text(cardinfo.card_code);
						$(".laimi-card-name").text(cardinfo.card_name);
						$(".laimi-card-sex").text(cardinfo.sex);
						$(".laimi-card-age").text(cardinfo.age);
						$(".laimi-card-phone").text(cardinfo.card_phone);
						$(".laimi-card-type").text(cardinfo.type_name);
						$(".laimi-card-id").val(cardinfo.card_id);
					}else{
						$(".laimi-card-code").text('--');
						$(".laimi-card-name").text('--');
						$(".laimi-card-sex").text('--');
						$(".laimi-card-age").text('--');
						$(".laimi-card-phone").text('--');
						$(".laimi-card-type").text('--');
						$(".laimi-card-id").val('');
					}
				}
			});
		})
	});
</script>
</body>
</html>