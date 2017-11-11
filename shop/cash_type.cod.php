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
						<a href="cash.php">收支管理</a>
					</li>
					<li class="layui-this">
						<a href="cash_type.php">收支分类</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker-group layui-tab-content">
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
	<?php foreach($this->_data['cash_type'] as $row){ ?>
		<tr>
			<td><?php echo $row['cash_type_name']; ?></td>
			<td>
				<button type="button" class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['cash_type_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button type="button" class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['cash_type_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shanchu1"></use></svg>
					删除
				</button>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
				</div>
			</div>
		</div>
	</div>
	<!--新增分组弹出层开始-->
	<script type="text/html" id="laimi-script-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form">
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 分组名称</label>
			    <div class="layui-input-block">
			      <input class="layui-input laimi-input-200" type="text" name="txtname" lay-verify="required">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-button-add" lay-submit>
			      	完成
			      </button>
			      <button class="layui-btn layui-btn-primary" type="reset">
			      	重置
			      </button>
			    </div>
			  </div>
			  <div class="laimi-height-20">
			  </div>
			</form>
		</div>
	</script>
	<!--新增分组弹出层结束-->
	<script type="text/html" id="laimi-script-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form">
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 分组名称</label>
			    <div class="layui-input-block">
			      <input class="layui-input laimi-input-200" type="text" name="txtname" lay-verify="required" value="{{d.cash_type_name}}">
			      <input class="layui-input laimi-input-200" type="hidden" name="txtid" lay-verify="required" value="{{d.cash_type_id}}">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-button-edit" lay-submit>
			      	完成
			      </button>
			      <button class="layui-btn layui-btn-primary" type="reset">
			      	重置
			      </button>
			    </div>
			  </div>
			  <div class="laimi-height-20">
			  </div>
			</form>
		</div>
	</script>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "layer", "form", "laytpl"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		var objlaytpl = layui.laytpl;
		$(".laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增分组", "font-size:16px;"],
				btnAlign: "r",
				area: ["480px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add").html()
			});
		});
		objform.on("submit(laimi-button-add)", function(data) {
			$.post('cash_type_add_do.php', data.field, function(msg){
				if(msg == 0){
					window.location.reload();
				}else{
					objlayer.alert('新增失败', {
						title: '提示信息'
					});
				}
			})
			return false;
		});
		$(".laimi-edit").on("click", function() {
			$.getJSON('cash_type_edit_ajax.php', {id:$(this).val()}, function(res){
				objlaytpl($("#laimi-script-edit").html()).render(res, function(html){
				  objlayer.open({
				  	type: 1,
				  	title: ["修改分类", "font-size:16px;"],
				  	btnAlign: "r",
				  	area: ["480px", "auto"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: html
				  });
				});
			})
		})
		objform.on("submit(laimi-button-edit)", function(data) {
			$.post('cash_type_edit_do.php', data.field, function(msg){
				if(msg == 0){
					window.location.reload();
				}else{
					objlayer.alert('修改失败，请联系管理员', {
						title: '提示信息'
					});
				}
			})
			return false;
		});
		$(".laimi-del").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要删除吗', {icon: 0, title:'提示', shadeClose: true}, function(index){
			  $.post('cash_type_delete_do.php', {id:id}, function(msg){
			  	if(msg == 0){
			  		window.location.reload();
			  	}else if(msg == 1){
			  		objlayer.alert('删除失败，分类下面有明细，不能删除', {
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
		})
	});
	</script>
</body>
</html>