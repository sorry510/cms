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
						<a href="system_score.php">积分换礼</a>
					</li>
					<li class="layui-this">
						<a href="system_gift.php">礼品管理</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-gift layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label laimi-input">礼品名称</label>
		<div class="layui-input-inline last">
			<input class="layui-input" type="text" name="name" placeholder="输入礼品名称" value="<?php echo $this->_data['request']['name'];?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">新增礼品</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>新增日期</th>
			<th>名称</th>
			<th>积分</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['gift_list'] as $row){?>
		<tr>
			<td><?php echo $row['atime'];?></td>
			<td><?php echo $row['gift_name'];?></td>
			<td><?php echo $row['gift_score'];?>分</td>
			<td>
				<button class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['gift_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['gift_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shanchu1"></use></svg>
					删除
				</button>
			</td>
		</tr>
	<?php }?>
	</tbody>
</table>
				</div>
			</div>
		</div>
	</div>
	<!--新增礼品弹出层开始-->
	<script type="text/html" id="laimi-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 礼品名称</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-300" type="text" name="txtname" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 扣除积分</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-100" type="text" name="txtscore" lay-verify="score|number">
					</div>
					<div class="layui-form-mid layui-word-aux">分，兑换一份礼品所需的积分</div>
				</div>
					<div class="layui-form-item">
						<div class="layui-input-block">
							<button class="layui-btn laimi-button-100" lay-filter="laimi-add" lay-submit>
								完成
							</button>
						</div>
					</div>
			</form>	
		</div>
	</script>
	<!--新增礼品弹出层结束-->
	<script type="text/html" id="laimi-edit">
		<div id="laimi-modal-edit" class="laimi-modal" style="display: block;">
			<form class="layui-form">
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 礼品名称</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-300" type="text" name="txtname" value="{{d.gift_name}}" lay-verify="required">
						<input class="layui-input laimi-input-300" type="hidden" name="txtid" value="{{d.gift_id}}" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 扣除积分</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-100" type="text" name="txtscore" value="{{d.gift_score}}" lay-verify="score|number">
					</div>
					<div class="layui-form-mid layui-word-aux">分，兑换一份礼品所需的积分</div>
				</div>
					<div class="layui-form-item">
						<div class="layui-input-block">
							<button class="layui-btn laimi-button-100" lay-filter="laimi-edit" lay-submit>
								完成
							</button>
						</div>
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
		objform.verify({
		  score: function(value, item){ //value：表单的值、item：表单的DOM对象
		    if(value <= 0){
		    	 return '积分必须大于0';
		    }
		  }
		});
		$(".laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增礼品", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-add").html()
			});
		});
		objform.on("submit(laimi-add)", function(data) {
			$.post('system_gift_add_do.php', data.field, function(res){
				if(res == 0){
					window.location.reload();
				}else{
					objlayer.alert('新增失败，请联系管理员', {
						title: '提示信息'
					});
				}
			})
			return false;
		});
		$(".laimi-edit").on("click", function() {
			$.getJSON('system_gift_edit_ajax.php', {id:$(this).val()}, function(res){
				objlaytpl($("#laimi-edit").html()).render(res, function(html){
				  objlayer.open({
				  	type: 1,
				  	title: ["修改分类", "font-size:16px;"],
				  	btnAlign: "r",
				  	area: ["680px", "auto"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: html
				  });
				});
			})
		});
		objform.on("submit(laimi-edit)", function(data) {
			$.post('system_gift_edit_do.php', data.field, function(res){
				if(res == 0){
					window.location.reload();
				}else{
					objlayer.alert('新增失败，请联系管理员', {
						title: '提示信息'
					});
				}
			})
			return false;
		});
		$(".laimi-del").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要删除吗', {icon: 0, title:'提示', shadeClose: true}, function(index){
			  $.post('system_gift_delete_do.php', {id:id}, function(res){
			  	if(res == 0){
			  		window.location.reload();
			  	}else{
			  		objlayer.alert('删除失败，请联系管理员', {
			  			title: '提示信息',
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