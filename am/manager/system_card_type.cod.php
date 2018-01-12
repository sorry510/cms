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
						<a href="system_card_type.php">会员卡分类</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-card-type layui-tab-content">
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
			<th>卡折扣</th>
			<th>备注</th>
			<th width="130">操作</th>
		</tr>
  </thead>
	<tbody>
	<?php foreach($this->_data['card_type_list'] as $row) { ?>
		<tr>
			<td><?php echo $row['card_type_name']; ?></td>
			<td><?php echo $row['card_type_discount']; ?>折</td>
			<td><?php echo $row['card_type_memo']; ?></td>
			<td>
				<button class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['card_type_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['card_type_id']; ?>">
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
	<!--新增会员卡分类弹出层开始-->
	<script type="text/html" id="laimi-script-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form">
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 分类名称</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-200" type="text" name="txtname" lay-verify="required">
			    </div>
			    <div class="layui-form-mid layui-word-aux">例：钻石卡</div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 折扣</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-200" type="text" name="txtdiscount" lay-verify="discount|number" value="10">
			    </div>
			     <div class="layui-form-mid layui-word-aux">例：88折，填8.8，不打折填10</div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">备注</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtmemo"></textarea>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit-add" lay-submit>完成</button>
			      <button class="layui-btn layui-btn-primary" type="reset">重置</button>
			    </div>
			  </div>
			</form>
		</div>
	</script>
	<!--修改会员卡分类弹出层开始-->
	<script type="text/html" id="laimi-script-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form">
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 分类名称</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-200" type="text" name="txtname" value="{{d.card_type_name}}" lay-verify="required">
			      <input class="layui-input laimi-input-200" type="hidden" name="txtid" value="{{d.card_type_id}}">
			    </div>
			    <div class="layui-form-mid layui-word-aux">例：钻石卡</div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 折扣</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-200" type="text" name="txtdiscount" value="{{d.card_type_discount}}" lay-verify="carddiscount|number">
			    </div>
			     <div class="layui-form-mid layui-word-aux">例：88折，填8.8，不打折填10</div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">备注</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtmemo">{{d.card_type_memo}}</textarea>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit-edit" lay-submit>完成</button>
			      <button class="layui-btn layui-btn-primary" type="reset">重置</button>
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
		objform.verify({
		  discount: function(strvalue, objitem) { //value：表单的值、item：表单的DOM对象
		    if(strvalue > 10 || strvalue < 0.1) {
		    	 return '折扣必须在0.1-10折之间';
		    }
		  }
		});
		$(".laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增分类", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,	//点击遮罩关闭
				content: $("#laimi-script-add").html()
			});
		});
		objform.on("submit(laimi-submit-add)", function(objdata) {
			$.post('system_card_type_add_do.php', objdata.field, function(strdata) {
				if(strdata == 0) {
					window.location.reload();
				} else {
					objlayer.alert('新增分类失败，请联系管理员！', {
						title: '提示信息'
					});
				}
			});
			return false;
		});
		$(".laimi-edit").on("click", function() {
			$.getJSON('system_card_type_edit_ajax.php', {id:$(this).val()}, function(objdata) {
				objlaytpl($("#laimi-script-edit").html()).render(objdata, function(strhtml) {
				  objlayer.open({
				  	type: 1,
				  	title: ["修改分类", "font-size:16px;"],
				  	btnAlign: "r",
				  	area: ["680px", "auto"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: strhtml
				  });
				});
			});
		});
		objform.on("submit(laimi-submit-edit)", function(objdata) {
			$.post('system_card_type_edit_do.php', objdata.field, function(strdata) {
				if(strdata == 0){
					window.location.reload();
				} else {
					objlayer.alert('修改分类失败，请联系管理员！', {
						title: '提示信息'
					});
				}
			});
			return false;
		});
		$(".laimi-del").on("click", function() {
			var intid = $(this).val();
			objlayer.confirm('确定要删除该分类吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex){
			  $.post('system_card_type_delete_do.php', {id:intid}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else {
			  		objlayer.alert('删除分类失败，请联系管理员！', {
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