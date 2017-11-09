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
				<div id="laimi-main" class="p-system-card_type layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<div class="laimi-float-right">
			<a id="laimi-add" class="layui-btn">新增分类</a>
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
		<tr>
			<td>白金8折卡</td>
			<td>8.8折</td>
			<td>13623833360</td>
			<td>
				<button class="layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>		
				<button class="layui-btn layui-btn-primary layui-btn-mini">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shanchu1"></use></svg>
					删除
				</button>	  
			</td>
		</tr>			    
	</tbody>
</table>
				</div>
			</div>
		</div>
	</div>
	<!--新增卡分类弹出层开始-->
	<div id="laimi-modal-add" class="laimi-modal">
		<form class="layui-form">
		  <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 分类名称</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-200" type="text" name="txtname">
		    </div>
		    <div class="layui-form-mid layui-word-aux">例：钻石卡</div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 折扣</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-200" type="text" name="txtdiscount">
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
		      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>完成</button>
		      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		  </div>
		  <div class="laimi-height-20">		  	
		  </div>
		</form>
	</div>
	<!--新增卡分类弹出层开始-->
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
				title: ["新增会员卡分类", "font-size:16px;"],
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