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
						<a href="worker.php?state=1">员工管理</a>
					</li>
					<li>
						<a href="worker.php?state=2">离职员工</a>
					</li>
					<li class="layui-this">
						<a href="worker_group.php">员工分组</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker-group layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">新增分组</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>分组名称</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['worker_group_list'] as $row) { ?>
		<tr>
			<td><?php echo $row['worker_group_name']?></td>
			<td>
				<button class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['worker_group_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['worker_group_id']; ?>">
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
	<!--新增分组弹出层结束-->
	<script type="text/html" id="laimi-script-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form">
			<input type="hidden" name="txtid" value="{{d.worker_group_id}}">
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 分组名称</label>
			    <div class="layui-input-block">
			      <input class="layui-input laimi-input-200" type="text" name="txtname" value="{{d.worker_group_name}}" lay-verify="required">
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
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "laytpl", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objlaytpl = layui.laytpl;
		var objform = layui.form;
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
		objform.on("submit(laimi-submit-add)", function(objdata) {
			$.post('worker_group_add_do.php', objdata.field, function(strdata) {
				if(strdata == 0) {
					window.location.reload();
				} else {
					objlayer.alert('新增员工分组失败，请联系管理员！', {
						title: '提示信息'
					});
				}
			});
			return false;
		});
		$(".laimi-edit").on("click", function() {
			$.getJSON('worker_group_edit_ajax.php', {id:$(this).val()}, function(objdata) {
				objlaytpl($("#laimi-script-edit").html()).render(objdata, function(strhtml) {
				  objlayer.open({
				  	type: 1,
				  	title: ["修改分组", "font-size:16px;"],
				  	btnAlign: "r",
				  	area: ["680px", "auto"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: strhtml
				  });
				});
			});
		});
		objform.on("submit(laimi-submit-edit)", function(objdata) {
			$.post('worker_group_edit_do.php', objdata.field, function(strdata) {
				if(strdata == 0) {
					window.location.reload();
				} else {
					objlayer.alert('修改员工分组失败，请联系管理员！', {
						title: '提示信息'
					});
				}
			});
			return false;
		});
		$(".laimi-del").on("click", function() {
			var strid = $(this).val();
			objlayer.confirm('确定要删除该员工分组吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('worker_group_delete_do.php', {id:strid}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else if(strdata == 2) {
			  		objlayer.alert('分组下有员工，不能删除分组！', {
			  			title: '提示信息'
			  		});
			  	} else {
			  		objlayer.alert('删除员工分组失败，请联系管理员！', {
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