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
						<li>
							<a href="wechat_shop_notice.php">商城公告</a>
						</li>
						<li class="layui-this">
							<a href="wechat_shop_notice_add.php">新增公告</a>
						</li>
					</ul>
					<div class="layui-tab-content">
						<form class="layui-form" action="">
						  <div class="layui-form-item">
						    <label class="layui-form-label">公告标题</label>
						    <div class="layui-input-block">
						      <input type="text" name="txtwnotice_title" class="layui-input" style="width:80%;" value="<?php echo $this->_data['edit']['wnotice_title'];?>" lay-verify="required">
						      <input type="hidden" name="txtwnotice_id" class="layui-input" style="width:80%;" value="<?php echo $this->_data['edit']['wnotice_id'];?>">
						    </div>
						  </div>						  					  
						  <div class="layui-form-item">
						    <label class="layui-form-label">公告详情</label>
						    <div class="layui-input-block">
						      <!-- 加载编辑器的容器 -->
							    <script id="container" name="txtwnotice_content" type="text/plain"><?php echo $this->_data['edit']['wnotice_content'];?></script>
							    <!-- 配置文件 -->
							    <script type="text/javascript" src="../../utf8-php/ueditor.config.js"></script>
							    <!-- 编辑器源码文件 -->
							    <script type="text/javascript" src="../../utf8-php/ueditor.all.js"></script>
							    <!-- 实例化编辑器 -->
							    <script type="text/javascript">
							        var ue = UE.getEditor('container');
							    </script>
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <div class="layui-input-block">
						      <button class="layui-btn laimi-button-100" lay-submit="" lay-filter="laimi-submitedit">确定</button>
						    </div>
						  </div>
						  <div class="laimi-height-20">						  	
						  </div>
						</form>						
					</div>
				</div>
			</div>
		</div>
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
		//添加商品submit
		objform.on("submit(laimi-submitedit)", function(data) {
			var _self = $(this);
		  _self.attr('disabled',true);
		  var url="wechat_shop_notice_edit_do.php";
		  console.log(data.field);
		  $.post(url,data.field,function(res){
		    if(res=='0'){
		      window.location.href='wechat_shop_notice.php';
		    }else{
		    	console.log(res);
		      _self.attr('disabled',false);
		      alert("添加失败");
		    }
		  });
			return false;
		});
	});
	</script>
	</body>
</html>