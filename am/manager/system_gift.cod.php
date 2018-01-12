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
						<a href="system_gift_record.php">积分换礼</a>
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
			<input class="layui-input" type="text" name="name" placeholder="输入礼品名称" value="<?php echo htmlspecialchars($GLOBALS['strname']); ?>">
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
			<th>名称</th>
			<th>积分</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['gift_list'] as $row) { ?>
		<tr>
			<td><?php echo $row['gift_name']; ?></td>
			<td><?php echo $row['gift_score']; ?>分</td>
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
	<?php } ?>
	</tbody>
</table>
				</div>
			</div>
		</div>
	</div>
	<!--新增礼品弹出层开始-->
	<script type="text/html" id="laimi-script-add">
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
							<button class="layui-btn laimi-button-100" lay-filter="laimi-submit-add" lay-submit>
								完成
							</button>
						</div>
					</div>
			</form>	
		</div>
	</script>
	<!--新增礼品弹出层结束-->
	<script type="text/html" id="laimi-script-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form">
			<input type="hidden" name="txtid" value="{{d.gift_id}}" lay-verify="required">
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 礼品名称</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-300" type="text" name="txtname" value="{{d.gift_name}}" lay-verify="required">
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
							<button class="layui-btn laimi-button-100" lay-filter="laimi-submit-edit" lay-submit>
								完成
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
		objform.verify({
		  score: function(strvalue, objitem) { //value：表单的值、item：表单的DOM对象
		    if(strvalue <= 0) {
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
				content: $("#laimi-script-add").html()
			});
		});
		objform.on("submit(laimi-submit-add)", function(objdata) {
			$.post('system_gift_add_do.php', objdata.field, function(strdata) {
				if(strdata == 0) {
					window.location.reload();
				} else {
					objlayer.alert('新增礼品失败，请联系管理员！', {
						title: '提示信息'
					});
				}
			});
			return false;
		});
		$(".laimi-edit").on("click", function() {
			$.getJSON('system_gift_edit_ajax.php', {id:$(this).val()}, function(objdata) {
				objlaytpl($("#laimi-script-edit").html()).render(objdata, function(strhtml) {
				  objlayer.open({
				  	type: 1,
				  	title: ["修改礼品", "font-size:16px;"],
				  	btnAlign: "r",
				  	area: ["680px", "auto"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: strhtml
				  });
				});
			});
		});
		objform.on("submit(laimi-submit-edit)", function(objdata) {
			$.post('system_gift_edit_do.php', objdata.field, function(strdata) {
				if(strdata == 0) {
					window.location.reload();
				} else {
					objlayer.alert('修改礼品失败，请联系管理员！', {
						title: '提示信息'
					});
				}
			});
			return false;
		});
		$(".laimi-del").on("click", function() {
			var intid = $(this).val();
			objlayer.confirm('确定要删除该礼品吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('system_gift_delete_do.php', {id:intid}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else {
			  		objlayer.alert('删除礼品失败，请联系管理员！', {
			  			title: '提示信息',
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