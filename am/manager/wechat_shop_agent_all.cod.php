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
					<!-- <li class="layui-this">
						<a href="wechat_shop_agent_month.php">本月佣金</a>
					</li> -->
					<li class="layui-this">
						<a href="wechat_shop_agent_all.php">所有佣金</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">搜索</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="姓名/手机号码" value="<?php echo htmlspecialchars($this->_data['request']['name']); ?>">
		</div>
		<!-- <label class="layui-form-label">日期</label>
		    <div class="layui-input-inline">
		      <input id="laimi-from" class="layui-input laimi-input-100" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>" type="text" name="from" placeholder="yyyy-MM-dd">
		    </div>
		    <label class="layui-form-label">至</label>
		    <div class="layui-input-inline last">
		      <input id="laimi-to" class="layui-input laimi-input-100" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>" type="text" name="to" placeholder="yyyy-MM-dd">
		    </div> -->
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<!-- <th>年月</th> -->
			<th>姓名</th>
			<th>手机号码</th>			
			<th>未提现佣金</th>
			<th>累计佣金</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['worder_list']['list'] as $row) { ?>
		<tr>
			<!-- <td>2017-10</td> -->
			<td><?php echo $row['c_parent_card_name']?></td>
			<td><?php echo $row['c_parent_card_phone']?></td>
			<td class="laimi-color-ju">¥<?php if($row['real_reward']==null){echo $row['sum_reward'];}else{echo $row['real_reward'];}?></td>
			<td>¥<?php echo $row['sum_reward']?></td>
			<td>
				<button class="layui-btn layui-btn-mini laimi-confirm" value="<?php echo $row['card_parent_id']?>" style="<?php if ($row['real_reward'] === '0.00') {
					echo 'display: none';
				}?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					提现
				</button>
			</td>
		</tr>
		<?php }?>
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
		var objpage = layui.laypage;
		var objform = layui.form;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['worder_list']['allcount'];?>,
			limit: 25,
			curr: <?php echo $this->_data['worder_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
		//询问框
		$(".laimi-confirm").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('确定全部提现吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post('wechat_shop_agent_all_get_reward_do.php', {id:id}, function(res){
			  	if(res == 0){
			  		window.location.reload();
			  	}else if(res == 4){
			  		window.location.reload();
			  	}else{
			  		console.log(res);
			  		objlayer.alert('提现失败，请联系管理员', {
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