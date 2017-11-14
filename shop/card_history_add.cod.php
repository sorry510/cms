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
						<a href="worker_reward.php">新增电子档案</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<div class="layui-row">
    <form class="layui-form">
		<div class="layui-row">
			<blockquote class="layui-elem-quote" style="height:40px;">
				<div class="layui-form-item">
					<label class="layui-form-label" style="width:30px;">会员</label>
					<div class="layui-input-inline last">
						<input class="layui-input laimi-input-200 laimi-search" type="text" name="search" placeholder="卡号/手机号/姓名">
						<input type="hidden" name="txtid" class="laimi-card-id">
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
						    <div class="layui-upload-list" id="laimi-"></div>
						 </blockquote>
					    </div>
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
		objupload.render({
		  elem: '#laimi-upload'
		  ,url: '/upload/'
		  ,multiple: true
		  ,before: function(obj){
		    //预读本地文件示例，不支持ie8
		    obj.preview(function(index, file, result){
		      $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img" style=width:80px;height:80px;margin-right:10px;">')
		    });
		  }
		  ,done: function(res){
		    //上传完毕
		  }
		});
		objlaydate.render({
			elem: '#laimi-to'
		});
		objform.on("submit(laimi-submit)", function(data) {
			$.post('card_history_add_do.php', data, function(msg){
			  console.log(msg);
			  if(msg == 0){
			    window.location.reload();
			  }else{
			    objlayer.alert('兑换积分失败，请联系管理员', {
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
					$(".laimi-card-id").val(0);
				}
			});
		})
	});
</script>
</body>
</html>