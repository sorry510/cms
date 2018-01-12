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
						<a href="sgoods.php">单店商品管理</a>
					</li>
					<li class="layui-this">
						<a href="sgoods_catalog.php">商品分类</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-sgoods-catalog layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">新增分类</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>分类名称</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['sgoods_catalog_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['sgoods_catalog_name']; ?></td>
			<td>
				<button class="layui-btn layui-btn-mini laimi-edit" sgoods_catalog_id="<?php echo $row['sgoods_catalog_id']; ?>" sgoods_catalog_name="<?php echo htmlspecialchars($row['sgoods_catalog_name']); ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" sgoods_catalog_id="<?php echo $row['sgoods_catalog_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shanchu1"></use></svg>
					删除
				</button>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<div class="laimi-page">
	<div id="laimi-page-content"></div>
</div>
				</div>
			</div>
		</div>
	</div>
	<!--新增分类出层开始-->
	<script type="text/html" id="laimi-script-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-add">
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 分类名称</label>
			    <div class="layui-input-block">
			      <input class="layui-input laimi-input-200" type="text" name="txtname" lay-verify="required">
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
			</form>
		</div>
	</script>
	<!--新增分类弹出层结束-->
	<!--修改分类弹出层开始-->
	<script type="text/html" id="laimi-script-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-edit">
			<input class="layui-input laimi-input-200" type="hidden" name="txtid">
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 分类名称</label>
			    <div class="layui-input-block">
			      <input class="layui-input laimi-input-200" type="text" name="txtname" lay-verify="required">
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
			</form>
		</div>
	</script>
	<!--修改分类弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['sgoods_catalog_list']['allcount']; ?>,
			limit: 50,
			curr: <?php echo $this->_data['sgoods_catalog_list']['pagenow']; ?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				if(!first) {
					window.location = "sgoods_catalog.php?page=" + obj.curr;
				}
			}
		});
		$(".laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增分类", "font-size:16px;"],
				btnAlign: "r",
				area: ["480px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add").html()
			});
		});
		objform.on("submit(laimi-submit-add)", function(objdata) {
			var objthis = $(this);
		  objthis.attr('disabled', true);
		  $.post("sgoods_catalog_add_do.php", objdata.field, function(strdata) {
		    if(strdata == 0) {
		      window.location.reload();
		    } else {
					objlayer.alert('新增商品分类失败，请联系管理员！', {
						title: '提示信息'
					});
		    }
		    objthis.attr('disabled', false);
		  });
			return false;
		});
		$(".laimi-edit").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["修改分类", "font-size:16px;"],
				btnAlign: "r",
				area: ["480px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-edit").html()
			});
		  $("#laimi-modal-edit input[name='txtid']").val($(this).attr("sgoods_catalog_id"));
		  $("#laimi-modal-edit input[name='txtname']").val($(this).attr("sgoods_catalog_name"));
		});
		objform.on("submit(laimi-submit-edit)", function(objdata) {
		  var objthis = $(this);
		  objthis.attr('disabled', true);
		  $.post("sgoods_catalog_edit_do.php", objdata.field, function(strdata) {
		    if(strdata == 0) {
		      window.location.reload();
		    } else {
		      objlayer.alert('修改商品分类失败，请联系管理员！', {
						title: '提示信息'
					});
		    }
		    objthis.attr('disabled', false);
		  });
			return false;
		});
		$(".laimi-del").on("click", function() {
			var strid = $(this).attr("sgoods_catalog_id");
			objlayer.confirm('确定要删除该商品分类吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('sgoods_catalog_delete_do.php', {id:strid}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else if(strdata == 2) {
			  		objlayer.alert("分类下有商品，不能删除分类！", {
			  			title: '提示信息'
			  		});
			  	} else {
			  		objlayer.alert('删除商品分类失败，请联系管理员！', {
			  			title: '提示信息'
			  		});
			  	}
			  });
			  objlayer.close(hindex);
			});
		});
		//修改商品submit
		/*objform.on("submit(laimi-submitedit)", function(data) {
		  var _self = $(this);
		  _self.attr('disabled',true);
		  var url="sgoods_catalog_edit_do.php";
		  console.log(data.field);
		  $.post(url,data.field,function(res){
		    if(res=='0'){
		      window.location.href='sgoods_catalog.php';
		    }else if(res=='1'){
		      alert("缺少必填项");
		      _self.attr('disabled',false);
		    }else if(res=='2'){
		      alert("商品编码不能重复");
		      _self.attr('disabled',false);
		    }else{
		      alert("添加失败");
		    }
		  });
			return false;
		});*/
		//删除操作JS
	  /*$(".laimi-del").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要删除吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post('sgoods_catalog_delete_do.php', {id:id}, function(res){
			  	if(res == 0){
			  		window.location.reload();
			  	}else if(res=='1'){
			  		objlayer.alert("分类下有商品，不能删除！", {
			  			title: '提示信息'
			  		});
			  	}else{
			  		objlayer.alert('删除失败，请联系管理员', {
			  			title: '提示信息'
			  		});
			  	}
			  })
			  objlayer.close(index);
			});
		});*/
	});
	</script>
</body>
</html>