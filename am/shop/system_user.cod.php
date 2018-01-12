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
						<a href="system_user.php">操作员管理</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">新增操作员</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>身份</th>
			<th>登录账号</th>
			<th>姓名</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['user_list'] as $row) { ?>
		<tr>
			<td><?php echo $row['mytype']; ?></td>
			<td><?php echo $row['user_account']; ?></td>
			<td><?php echo $row['user_name']; ?></td>
			<td>
				<button class="layui-btn layui-btn-mini laimi-edit" user_id="<?php echo $row['user_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
<?php if($row['user_id'] != $GLOBALS['_SESSION']['login_id']) { ?>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" user_id="<?php echo $row['user_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shanchu1"></use></svg>
					删除
				</button>
<?php } ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
				</div>
			</div>
		</div>
	</div>
	<!--新增操作员弹出层开始-->
	<script type="text/html" id="laimi-script-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-add">
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 操作权限</label>
			    <div class="layui-input-block">
			      <input type="radio" name="txttype" value="2" title="店长" lay-verify="radio">
			      <input type="radio" name="txttype" value="3" title="收银员" lay-verify="radio">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 姓名</label>
			    <div class="layui-input-block">
			      <input class="layui-input laimi-input-200" type="text" name="txtname" lay-verify="required">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 手机号码</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-200" type="text" name="txtaccount" lay-verify="phone">
			    </div>
			     <div class="layui-form-mid layui-word-aux">使用手机号码登录，请正确填写</div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 登录密码</label>
			    <div class="layui-input-inline">
			    	<input class="layui-input laimi-input-200" type="password" name="password" placeholder="请输入密码" lay-verify="pass">
			    </div>
			    <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 确认密码</label>
			    <div class="layui-input-block">
			      <input class="layui-input laimi-input-200" type="password" name="password2" placeholder="请再次输入密码" lay-verify="pass|pass2">
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
	<!--新增操作员弹出层结束-->
	<!--修改操作员弹出层开始-->
	<script type="text/html" id="laimi-script-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-edit">
			<input type="hidden" name="txtid">
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 新密码</label>
			    <div class="layui-input-inline">
			    	<input class="layui-input laimi-input-200" type="password" name="password" placeholder="请输入密码" lay-verify="pass">
			    </div>
			    <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 确认密码</label>
			    <div class="layui-input-block">
			      <input class="layui-input laimi-input-200" type="password" name="password2" placeholder="请再次输入密码" lay-verify="pass|pass2">
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
	<!--修改操作员弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		objform.verify({
			radio: function(strvalue, objitem) {
				var obj = $("#laimi-modal-add input:radio[name='txttype']:checked");
				if(obj.length == 0) {
					return '请选择操作权限！';
				}
			},
		  pass: [
		    /^[\S]{6,12}$/,
		    '密码长度必须6到12位，且不能出现空格！'
		  ],
		  pass2: function(strvalue, objitem) {
		  	if($("input[name='password']").val() != $("input[name='password2']").val()) {
		  		return '两次输入密码不一致！';
		  	}
		  }
		});
		$(".laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增操作员", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add").html()
			});
			objform.render(null, 'laimi-form-add');
		});
		objform.on("submit(laimi-submit-add)", function(objdata) {
			$.post('system_user_add_do.php', objdata.field, function(strdata) {
				if(strdata == 0) {
					window.location.reload();
				} else if(strdata == 2) {
					objlayer.alert('您的操作员数量已到达上限！', {
						title: '提示信息'
					});
				} else if(strdata == 3) {
					objlayer.alert('手机号码已存在！', {
						title: '提示信息'
					});
				} else {
					objlayer.alert('新增操作员失败，请联系管理员！', {
						title: '提示信息'
					});
				}
			});
			return false;
		});
		$(".laimi-edit").on("click", function() {
			var intid = $(this).attr("user_id");
			objlayer.open({
				type: 1,
				title: ["修改密码", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-edit").html(),
				success: function(layero, index) {
			    $('#laimi-modal-edit input[name="txtid"]').val(intid);
			  }
			});
		});
		objform.on("submit(laimi-submit-edit)", function(objdata) {
			$.post('system_user_edit_do.php', objdata.field, function(strdata) {
				if(strdata == 0) {
					window.location.reload();
				} else {
					objlayer.alert('修改操作员失败，请联系管理员！', {
						title: '提示信息'
					});
				}
			});
			return false;
		});
		$(".laimi-del").on("click", function() {
			var intid = $(this).attr("user_id");
			objlayer.confirm('确定要删除该操作员吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('system_user_delete_do.php', {id:intid}, function(strdata) {
			  	if(strdata == 0){
			  		window.location.reload();
			  	}else{
			  		objlayer.alert('删除操作员失败，请联系管理员！', {
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