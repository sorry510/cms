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
		<label class="layui-form-label">选择分店</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分店</option>
				<option value="东风路分店">东风路分店</option>
				<option value="王城路分店">王城路分店</option>
				<option value="九都路分店">九都路分店</option>
			</select>
		</div>
		<div class="laimi-float-right">
			<a id="laimi-add" class="layui-btn">新增店长 / 收银员</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>身份</th>
			<th>店铺名称</th>
			<th>登录账号</th>
			<th>姓名</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>收银员</td>
			<td>东风路分店</td>
			<td>13623833360</td>
			<td>张小宇</td>
			<td>
				<a class="layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</a>
				<a class="layui-btn layui-btn-primary layui-btn-mini">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shanchu1"></use></svg>
					删除
				</a>
			</td>
		</tr>
	</tbody>
</table>
				</div>
			</div> 
		</div>
	</div>
	<!--新增操作员弹出层开始-->
	<div id="laimi-modal-add" class="laimi-modal">
		<form class="layui-form">
			<div class="layui-form-item">
		    <label class="layui-form-label">操作权限</label>
		    <div class="layui-input-block">
		      <input type="radio" name="txttype" value="1" title="管理员">
		      <input type="radio" name="txttype" value="2" title="店长">
		      <input type="radio" name="txttype" value="3" title="收银员">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 所属分店</label>
		    <div class="layui-input-inline">
		      <select name="txtshop">
		        <option value="" selected="">请选择分店</option>
		        <option value="东风路分店">东风路分店</option>
		        <option value="解放路分店">解放路分店</option>
		      </select>
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 姓名</label>
		    <div class="layui-input-block">
		      <input class="layui-input laimi-input-200" type="text" name="txtname">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 手机号码</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-200" type="text" name="txtaccount">
		    </div>
		     <div class="layui-form-mid layui-word-aux">使用手机号码登录，请正确填写</div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 登录密码</label>
		    <div class="layui-input-inline">
		    	<input class="layui-input laimi-input-200" type="password" name="password" placeholder="请输入密码">
		    </div>
		    <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 确认密码</label>
		    <div class="layui-input-block">
		      <input class="layui-input laimi-input-200" type="password" name="password" placeholder="请再次输入密码">
		    </div>
		  </div>	  	  
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
		</form>
	</div>
	<!--新增操作员弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		$("#laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增操作员", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
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
	});
	</script>
</body>
</html>