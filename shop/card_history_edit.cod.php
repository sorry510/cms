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
					</div>
				</div>
			</blockquote>
			<fieldset class="layui-elem-field">
			  <legend style="font-size: 14px;font-weight: bold;">档案内容 </legend>
	      <div class="layui-form-item" style="margin-top:30px;">
	      	<label class="layui-form-label">问题描述</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtquestion"></textarea>
			    </div>
		  	</div>
			  <div class="layui-form-item">
		      <label class="layui-form-label">诊疗结果</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtresult"></textarea>
			    </div>
			  </div>
			  <div class="layui-form-item">
		      <label class="layui-form-label">诊疗方案</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtplan"></textarea>
			    </div>
			  </div>
			  <div class="layui-form-item" style="margin-bottom:30px;">
			  	<label class="layui-form-label">图片上传</label>
			  	<div class="layui-input-block">
			      <button type="button" class="layui-btn" id="laimi-upload">多图片上传</button>
			    </div>
			    <div class="layui-input-block">
			      <blockquote class="layui-elem-quote layui-quote-nm laimi-input-b80" style="margin-top: 10px;">
				    预览图：
				    	<div class="layui-upload-list" id="laimi-photos"></div>
				 		</blockquote>
			  	</div>
			  </div>
			  <!-- <div class="layui-form-item" style="margin-bottom:30px;">
			 		<label class="layui-form-label">图片上传</label>
			 		<div class="layui-input-block">
			 			<div class="layui-upload">
			 			  <button type="button" class="layui-btn layui-btn-normal" id="testList">选择多文件</button> 
			 			  <div class="layui-upload-list">
			 			    <table class="layui-table">
			 			      <thead>
			 			        <tr><th>文件名</th>
			 			        <th>大小</th>
			 			        <th>状态</th>
			 			        <th>操作</th>
			 			      </tr></thead>
			 			      <tbody id="demoList"></tbody>
			 			    </table>
			 			  </div>
			 			  <button type="button" class="layui-btn" id="testListAction">开始上传</button>
			 			</div>
			 		</div>
			  </div> -->
		    <div class="layui-form-item">
		      <label class="layui-form-label">服务人员</label>
			    <div class="layui-input-block" style="width:200px;">
			      <select name="txtworker" lay-search="">
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
			       <input id="laimi-to" class="layui-input laimi-input-200" type="text" name="txttime" placeholder="yyyy-MM-dd">
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
		objupload.render({
		  elem: '#laimi-upload',
		  url: './upload_do.php',
		  multiple: true,
		  size: 1024000,
		  before: function(obj){
		    //预读本地文件示例，不支持ie8
		    var files = obj.pushFile();
		    obj.preview(function(index, file, result){
		      $('#laimi-photos').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img" style=width:80px;height:80px;margin-right:10px;">')
		    });
		  },
		  done: function(res, index){
		    //上传完毕
		    if(res.code == 200){
		    	photo.push(res.data);
		    }
		  }
		});
		objlaydate.render({
			elem: '#laimi-to'
		});
		objform.on("submit(laimi-submit)", function(data) {
			data.field.photo = photo;
			console.log(data.field);
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