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
						<form class="layui-form" id="laimi-form2" action="wechat_shop_manage_edit_do.php" method="post">
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品分类</label>
						    <div class="layui-input-block laimi-input-200">
							    <select name="txtwgoods_catalog_id" lay-verify="required" >
										<option value="">请选择分类</option>
										<?php foreach($this->_data['wgoods_catalog'] as $row) { ?>
						        <option value="<?php echo $row['wgoods_catalog_id'] ?>" <?php if($row['wgoods_catalog_id'] == $this->_data['edit']['wgoods_catalog_id']){echo "selected";} ?> ><?php echo $row['wgoods_catalog_name'] ?></option>
						        <?php } ?>
									</select>
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品名称</label>
						    <div class="layui-input-inline">
						      <input type="text" name="txtwgoods_name" class="layui-input laimi-input-300" value="<?php echo $this->_data['edit']['wgoods_name']; ?>">
						      <input type="hidden" name="txtwgoods_id" class="layui-input laimi-input-300" value="<?php echo $this->_data['edit']['wgoods_id']; ?>">
						    </div>
						    <div class="layui-input-inline">
						      <a id="laimi-edit" class="layui-btn layui-btn-normal layui-btn-xs">选择门店商品</a>
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label">特点说明</label>
						    <div class="layui-input-inline">
						      <input type="text" name="txtwgoods_name2" class="layui-input laimi-input-300" value="<?php echo $this->_data['edit']['wgoods_name2']; ?>">
						    </div>
						    <div class="layui-form-mid layui-word-aux">例：无添加、无污染</div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品编码</label>
						    <div class="layui-input-inline">
						      <input type="text" name="txtwgoods_code" class="layui-input laimi-input-200" value="<?php echo $this->_data['edit']['wgoods_code']; ?>">
						    </div>
						    <div class="layui-form-mid layui-word-aux">条形码或二维码</div>
						  </div>
						  <div class="layui-form-item">
								<label class="layui-form-label">价格</label>
								<div class="layui-input-inline">
									<input type="text" name="txtwgoods_price" placeholder="￥" autocomplete="off" class="layui-input laimi-input-80" value="<?php echo $this->_data['edit']['wgoods_price']; ?>">
								</div>
								<div class="layui-form-mid layui-word-aux">元</div>	
						  </div>
						  <div class="layui-form-item">
								<label class="layui-form-label">会员价格</label>
								<div class="layui-input-inline">
									<input type="text" name="txtwgoods_cprice" placeholder="￥" class="layui-input laimi-input-80" value="<?php echo $this->_data['edit']['wgoods_cprice']; ?>">
								</div>
								<div class="layui-form-mid layui-word-aux">元</div>	
						  </div>
						  <div class="layui-form-item">
								<label class="layui-form-label">库存</label>
								<div class="layui-input-inline">
									<input type="text" name="txtwgoods_store"  class="layui-input laimi-input-80" value="<?php echo $this->_data['edit']['wgoods_store']; ?>">
								</div>
								<div class="layui-form-mid layui-word-aux">独立库存，与门店无关</div>
						  </div>
						  <div class="layui-form-item">
						    <label class="layui-form-label">参与预约</label>
						    <div class="layui-input-inline">
						      <input type="radio" name="txtwgoods_act" value="2" title="不参与" <?php if ($this->_data['edit']['wgoods_act'] == 2) { echo "checked";};?>>
								  <input type="radio" name="txtwgoods_act" value="1" <?php if ($this->_data['edit']['wgoods_act'] == 1) { echo "checked";};?> title="参与活动">
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
							 			      	<?php if($strp = $this->_data['edit']['wgoods_photo'.($i+1)]){ ?>
							 			      	<tr style="padding:3px;">
							 			      		<td><img src="<?php echo "read_image.php?c=".$GLOBALS['_SESSION']['login_cid']."&type=wgoods&image=".$strp;?>" width="60" height="60"/></td>
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
						  <div class="layui-form-item">
						    <label class="layui-form-label">商品介绍</label>
						    <div class="layui-input-block" style="width: 70%;">
						      <!-- 加载编辑器的容器 -->
							    <script id="container" name="txtwgoods_content" type="text/plain"><?php echo $this->_data['edit']['wgoods_content']; ?></script>
							    <!-- 配置文件 -->
							    <script type="text/javascript" src="../utf8-php/ueditor.config.js"></script>
							    <!-- 编辑器源码文件 -->
							    <script type="text/javascript" src="../utf8-php/ueditor.all.js"></script>
							    <!-- 实例化编辑器 -->
							    <script type="text/javascript">
							        var ue = UE.getEditor('container');
							    </script>
						    </div>
						  </div>
						  <div class="layui-form-item">
						    <div class="layui-input-block">
						      <button class="layui-btn laimi-button-100" lay-submit="" lay-filter="laimi-submit">确定</button>
						    </div>
						  </div>
						  <div class="laimi-height-20">
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
<!--新增商品弹出层开始-->
	<script type="text/html" id="laimi-goods-modal">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form" id="laimi-form">
				<div class="laimi-tools layui-form-item">
					<label class="layui-form-label">选择分类</label>
					<div class="layui-input-inline">
						<select name="search" lay-search>
							<option value="0">请选择商品分类</option>
							<?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
              <option value="<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
            	<?php } ?>
						</select>
					</div>
					<label class="layui-form-label">搜索</label>
					<div class="layui-input-inline last">
						<input class="layui-input laimi-input-200" type="text" name="txtsearch" placeholder="商品名称/简拼/编码">
					</div>
					<div class="layui-input-inline">
						<button type="button" class="layui-btn layui-btn-normal laimi-search">搜索</button>
					</div>
				</div>
			</form>
			<table class="layui-table" id="laimi-goods">
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
			    <?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
						<?php foreach($this->_data['mgoods'] as $row2) { 
             if ($row['mgoods_catalog_id'] == $row2['mgoods_catalog_id']) {
          	?>
					<tr class="laimi-goods laimi-use1" mgoods_code="<?php echo $row2['mgoods_code'];?>" mgoods_name="<?php echo $row2['mgoods_name'];?>" mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'];?>" mgoods_id="<?php echo $row2['mgoods_id'];?>" mgoods_price="<?php echo $row2['mgoods_price'];?>">
						<td><?php echo $row['mgoods_catalog_name'];?></td>
						<td style="text-align: left;"><?php echo $row2['mgoods_name'];?></td>
						<td>￥<?php echo $row2['mgoods_price'];?></td>
						<td>￥<?php echo $row2['mgoods_cprice'];?></td>
						<td><a href="#" class="laimi-color-lan laimi-choose" mgoods_code="<?php echo $row2['mgoods_code'];?>" mgoods_name="<?php echo $row2['mgoods_name'];?>" mgoods_price="<?php echo $row2['mgoods_price'];?>" mgoods_cprice="<?php echo $row2['mgoods_cprice'];?>">选择</a></td>
					</tr>
						<?php }
            } ?>
          <?php } ?>
			  </tbody>
			</table>
		</div>
	</script>
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
	        ,'<td style="pediting:3px;"><img src="'+result+'" width="60" height="60"/></td>'
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
	        	id: <?php echo $this->_data['edit']['wgoods_id']; ?>,
	        	photo: res.data.photo
	        };
	        $.post('wechat_shop_manage_update_photo_do.php', data, function(msg){
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
	        		console.log(msg);
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
	  //打卡新增弹出框JS
	  $("#laimi-edit").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["选择门店商品", "font-size:16px;"],
				btnAlign: "r",
				area: ["800px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-goods-modal").html()
			});
			objform.render();
		});
		//搜索分类JS
		$(document).on('click','.laimi-search', function(){
		  $('#laimi-goods .laimi-goods').each(function () {
		  	$(this).editClass('layui-hide');
		  	if ($("#laimi-form input[name='txtsearch']").val() == '') {
		  		if($("#laimi-form select[name='search']").val() == '0') {
			      $(this).removeClass('layui-hide');
			    }else{
			      if ($("#laimi-form select[name='search']").val() == $(this).attr('mgoods_catalog_id')) {
			      	$(this).removeClass('layui-hide');
			      }
			    }
		  	}else{
		  		if ($("#laimi-form input[name='txtsearch']").val() == $(this).attr('mgoods_code') || $("#laimi-form input[name='txtsearch']").val() == $(this).attr('mgoods_name')) {
		  			$(this).removeClass('layui-hide');
		  		}
		  	}
		  }) 
		});
		//点击选择商品JS
		$(document).on('click','.laimi-choose',function(){
			var mgoods_name = $(this).attr('mgoods_name');
			var mgoods_code = $(this).attr('mgoods_code');
			var mgoods_price = $(this).attr('mgoods_price');
			var mgoods_cprice = $(this).attr('mgoods_cprice');
			$("#laimi-form2 input[name='txtwgoods_name']").val(mgoods_name);
			$("#laimi-form2 input[name='txtwgoods_code']").val(mgoods_code);
			$("#laimi-form2 input[name='txtwgoods_price']").val(mgoods_price);
			$("#laimi-form2 input[name='txtwgoods_cprice']").val(mgoods_cprice);
			layer.close(layer.index);
		});
		$('.laimi-del').on('click', function(){
			var _this = $(this);
			var data = {
				id: <?php echo $this->_data['edit']['wgoods_id']; ?>,
				key: $(this).attr('pkey'),
				photo: $(this).val()
			}
			$.post('wechat_shop_manage_del_photo_do.php', data, function(msg){
				if(msg == 0){
					_this.parent().parent().remove();
				}else{
					objlayer.alert('删除失败', {
						title: '提示信息'
					});
				}
			})
		})
		objform.on("submit(laimi-submit)", function(data) {
			data.field.photo = photo;
			$.post('wechat_shop_manage_edit_do.php', data.field, function(msg){
			  console.log(msg);
			  if(msg == 0){
			    window.location.href='wechat_shop_manage.php';
			  }else{
			    objlayer.alert('新增失败，请联系管理员', {
						title: '提示信息'
					});
			  }
			})
			return false;
		})
	});
	</script>
	</body>
</html>