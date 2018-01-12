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
					<li class="<?php if ($this->_data['request']['expire'] == 0) {
						echo 'layui-this';
					};?>">
						<a href="wechat_shop_agent.php">未审核</a>
					</li>
					<li class="<?php if ($this->_data['request']['expire'] == 1) {
						echo 'layui-this';
					};?>">
						<a href="wechat_shop_agent.php?expire=1">正式分销商</a>
					</li>
					<li class="<?php if ($this->_data['request']['expire'] == 2) {
						echo 'layui-this';
					};?>">
						<a href="wechat_shop_agent.php?expire=2">未通过分销商</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">搜索</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" value="<?php echo htmlspecialchars($this->_data['request']['search']); ?>" type="text" name="search" placeholder="姓名/手机号码">
			<input type="hidden" name="expire" class="layui-input" value="<?php echo $this->_data['request']['expire'];?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>姓名</th>
			<th>手机号码</th>
			<th>性别</th>
			<th>出生日期</th>
			<th>申请时间</th>
			<th>未提现佣金</th>
			<th>累计佣金</th>
			<th>查询</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['shop_agent_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['card_name']; ?></td>
			<td><?php echo $row['card_phone']; ?></td>
			<td><?php echo $row['card_sex']; ?></td>
			<td><?php echo date('Y-m-d',$row['card_birthday_date']); ?></td>
			<td><?php echo date('Y-m-d',$row['card_ftime']); ?></td>
			<td>¥25.00</td>
			<td>¥<?php echo $row['s_card_reward']; ?></td>
			<th><a href="#" class="laimi-color-lan">详情</a></th>
			<td>
				<button style="<?php if ($row['card_fenxiao2'] == 4 || $row['fenxiao2'] ==3) {
					echo "display:none;";
				};?>" class="layui-btn layui-btn-mini" id="ask1" value="<?php echo $row['card_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					审核
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini" id="ask2" value="<?php echo $row['card_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
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
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "upload", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objupload = layui.upload;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-birthday'
		});
		objdate.render({
			elem: '#laimi-join'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['shop_agent_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['shop_agent_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj,first) {
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
		//询问框
		$("#ask1").on("click", function() {
			var url = "wechat_shop_agent_do.php";
			var id = $(this).val();
			layer.confirm('是否通过分销商审核？', {
			  btn: ['通过审核','不通过审核','取消'] //按钮
				},function () {
					var type = 1;
					$.post(url, {card_id:id,type:type}, function(res){
				  	if(res == 0){
				  		window.location.reload();
				  	}else{
				  		console.log(res);
				  		objlayer.alert('操作失败，请联系管理员', {
				  			title: '提示信息'
				  		});
				  	}
				  })
				},function () {
					var type = 2;
					$.post(url, {card_id:id,type:type}, function(res){
				  	if(res == 0){
				  		window.location.reload();
				  	}else{
				  		console.log(res);
				  		objlayer.alert('操作失败，请联系管理员', {
				  			title: '提示信息'
				  		});
				  	}
				  })
				}
			)
		});
		//询问框
		$("#ask2").on("click", function() {
			var url = "wechat_shop_agent_delete_do.php";
			var id = $(this).val();
			layer.confirm('是否删除此申请？', {
		  	btn: ['确定删除','再想想'] //按钮
		  },function(){
		  	$.post(url, {card_id:id}, function(res){
			  	if(res == 0){
			  		window.location.reload();
			  	}else{
			  		console.log(res);
			  		objlayer.alert('操作失败，请联系管理员', {
			  			title: '提示信息'
			  		});
			  	}
			  })
		  });
		});
	});
	</script>
</body>
</html>