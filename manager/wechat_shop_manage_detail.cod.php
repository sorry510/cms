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
						<li class="layui-this">新增商城商品</li>
					</ul>
					<div class="layui-tab-content">
						<form class="layui-form" action="">
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品分类</label>
						    <div class="layui-input-block laimi-input-200">
						      <select name="quiz" lay-verify="required" lay-search="">
									<option value="">请选择分类</option>
									<option value="东风路分店">东风路分店</option>
									<option value="王城路分店">王城路分店</option>
									<option value="九都路分店">九都路分店</option>
								</select>
						    </div>
						  </div>				  
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品名称</label>
						    <div class="layui-input-inline">
						      <input type="tel" name="phone" autocomplete="off" class="layui-input laimi-input-300">
						    </div>
						    <div class="layui-input-inline">
						      <a id="laimi-add" class="layui-btn layui-btn-normal layui-btn-xs">选择门店商品</a>
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label">特点说明</label>
						    <div class="layui-input-inline">
						      <input type="tel" name="phone" autocomplete="off" class="layui-input laimi-input-300">
						    </div>
						    <div class="layui-form-mid layui-word-aux">例：无添加、无污染</div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品编码</label>
						    <div class="layui-input-inline">
						      <input type="tel" name="phone" autocomplete="off" class="layui-input laimi-input-200">
						    </div>
						    <div class="layui-form-mid layui-word-aux">条形码或二维码</div>
						  </div>
						  <div class="layui-form-item">
							<label class="layui-form-label">价格</label>
							<div class="layui-input-inline">
								<input type="text" name="price_min" placeholder="￥" lay-verify="title" autocomplete="off" class="layui-input laimi-input-80">
							</div>
							<div class="layui-form-mid layui-word-aux">元</div>	
						  </div>
						  <div class="layui-form-item">
							<label class="layui-form-label">会员价格</label>
							<div class="layui-input-inline">
								<input type="text" name="price_min" placeholder="￥" lay-verify="title" autocomplete="off" class="layui-input laimi-input-80">
							</div>
							<div class="layui-form-mid layui-word-aux">元</div>	
						  </div>
						  <div class="layui-form-item">
							<label class="layui-form-label">库存</label>
							<div class="layui-input-inline">
								<input type="text" name="price_min" lay-verify="title" autocomplete="off" class="layui-input laimi-input-80">
							</div>
							<div class="layui-form-mid layui-word-aux">独立库存，与门店无关</div>	
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品图片</label>
						    <div class="layui-input-block">
						      <div class="layui-upload">
								  <button type="button" class="layui-btn" id="test1">上传图片</button>
								  <div class="layui-upload-list">
								    <img class="layui-upload-img" id="demo1" style="width:90px;height:90px;">
								    <p id="demoText"></p>
								  </div>
							  </div>  
						    </div>
						  </div>						  
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品介绍</label>
						    <div class="layui-input-block">
						      <textarea name="desc" placeholder="这里需要父文本编辑器" class="layui-textarea" style="height:400px; width:80%;"></textarea>
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <div class="layui-input-block">
						      <button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">确定</button>
						    </div>
						  </div>
						  <div class="laimi-height-20">						  	
						  </div>
						</form>						
					</div>
				</div>
			</div>
		</div>
<!--新增员工弹出层开始-->
	<div id="laimi-modal-add" class="laimi-modal">
		<form class="layui-form">
			<div class="laimi-tools layui-form-item">
				<label class="layui-form-label">选择分类</label>
				<div class="layui-input-inline">
					<select name="shop">
						<option value="">全部分类</option>
						<option value="饮料">饮料</option>
						<option value="分类2">分类2</option>
					</select>
				</div>
				<label class="layui-form-label">搜索</label>
				<div class="layui-input-inline last">
					<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="商品名称/简拼/编码">
				</div>
				<div class="layui-input-inline">
					<button class="layui-btn layui-btn-normal">搜索</button>
				</div>
			</div>
		</form>
		<table class="layui-table">
		  <thead>
		    <tr>
		      <th>商品分类</th>
		      <th>商品名称</th>
		      <th>商品价格</th>
		      <th>商品会员价</th>
		      <th>选择</th>
		    </tr> 
		  </thead>
		  <tbody>
		    <tr>
		      <td>饮料</td>
		      <td>康师傅绿茶500ml</td>
		      <td>¥28.00</td>
		      <td>¥25.00</td>
		      <td><a href="#" class="laimi-color-lan">选择</a></td>
		    </tr>
		    <tr>
		      <td>饮料</td>
		      <td>康师傅绿茶500ml</td>
		      <td>¥28.00</td>
		      <td>¥25.00</td>
		      <td><a href="#" class="laimi-color-lan">选择</a></td>
		    </tr>
		    <tr>
		      <td>饮料</td>
		      <td>康师傅绿茶500ml</td>
		      <td>¥28.00</td>
		      <td>¥25.00</td>
		      <td><a href="#" class="laimi-color-lan">选择</a></td>
		    </tr>
		  </tbody>
		</table>
	</div>
	<!--新增员工弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "upload", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objupload = layui.upload;
		var objform = layui.form;		
		$("#laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["选择门店商品", "font-size:16px;"],
				btnAlign: "r",
				area: ["800px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-modal-add")
			});
		});
		objform.on("submit(laimi-submit)", function(data) {
			objlayer.alert(JSON.stringify(data.field), {
				title: '提示信息'
			});
			return false;
		});
		//普通图片上传
		  var uploadInst = objupload.render({
		    elem: '#test1'
		    ,url: '/upload/'
		    ,before: function(obj){
		      //预读本地文件示例，不支持ie8
		      obj.preview(function(index, file, result){
		        $('#demo1').attr('src', result); //图片链接（base64）
		      });
		    }
		    ,done: function(res){
		      //如果上传失败
		      if(res.code > 0){
		        return layer.msg('上传失败');
		      }
		      //上传成功
		    }
		    ,error: function(){
		      //演示失败状态，并实现重传
		      var demoText = $('#demoText');
		      demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
		      demoText.find('.demo-reload').on('click', function(){
		      uploadInst.upload();
		      });
		    }
		  });
	});
	</script>
	</body>
</html>