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
						<li><a href="wechat_shop_manage.php">微商城管理</a></li>
						<li class="layui-this">商城分类</li>						
					</ul>
					<div class="layui-tab-content">
						<form class="layui-form" action="">
							<div class="layui-form-item">								
								<div class="layui-inline laimi-float-right">
									<a id="laimi-modal" href="javascript:;" class="layui-btn">
										新增分类
									</a>
								</div>
							</div>
							<table class="layui-table">
								<colgroup>
									<col width="900">
									<col>
								</colgroup>
								<thead>
									<tr>
										<th>分类名称</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>水果</td>
										<td>
											<button class="layui-btn layui-btn-mini">
			      	<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>&nbsp;修改</button>		
			      	<button class="layui-btn layui-btn-primary layui-btn-mini" data-method="confirmTrans">
			      	<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>&nbsp;删除</button></td>
									</tr>
								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--新增分店弹出层开始-->
		<div id="id1" style="display: none;padding: 20px;max-height:500px;">
			<form class="layui-form" action="">
				<div class="layui-form-item">
					<label class="layui-form-label">分类名称</label>
					<div class="layui-input-block u-input1">
						<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-300">
					</div>
				</div>				
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">
						完成
						</button>
					</div>
				</div>
				<div class="laimi-height-20">
					
				</div>
			</form>					
					</div>
				</div>
			</div>
		</div>
		<!--消息弹出层结束-->
		<?php echo $this -> fun_fetch('inc_foot', ''); ?>
		<script>layui.use(["element"], function() {
	var objelement = layui.element;
});</script>

		<script>//这个是下拉框
layui.use('form', function() {
			var form = layui.form;

			//监听提交
			form.on('submit(formDemo)', function(data) {
				layer.msg(JSON.stringify(data.field));
				return false;
			});

			//四、弹出层
			layui.use('layer', function() { //独立版的layer无需执行这一句
						var $ = layui.jquery,
							layer = layui.layer; //独立版的layer无需执行这一句
						//弹出一个页面层
						$('#laimi-modal').on('click', function() {
									layer.open({
												type: 1,
												title: ['新增商城分类', 'font-size:16px;'],
												btnAlign: 'r',
												area: ['480px', '200px'],
												shadeClose: true,//点击遮罩关闭
content: $('#id1')
});
});
});
});
		</script>
	</body>
</html>