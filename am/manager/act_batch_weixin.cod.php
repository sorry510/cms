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
						<a href="act_batch.php">批量营销</a>
					</li>
					<li class="layui-this">
						<a href="act_batch_weixin.php">赠送优惠券记录</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-batch-weixin layui-tab-content">
<form class="layui-form">		    
	<div class="laimi-tools layui-form-item">		  	
		<label class="layui-form-label">活动名称</label>
		<div class="layui-input-inline">
			<input class="layui-input" type="text" name="act_name" value="<?php echo htmlspecialchars($this->_data['request']['act_name']); ?>">
		</div>
		<label class="layui-form-label">日期</label>
		<div class="layui-input-inline">
			<input name="from" id="laimi-from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>">
		</div>
		<label class="layui-form-label">至</label>
		<div class="layui-input-inline last">
			<input name="to" id="laimi-to" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>日期</th>
			<th>活动名称</th>
			<th>优惠券</th>
			<th>通知方式</th>
			<th>发送人数</th>
		</tr> 
	</thead>
	<tbody>
		<?php foreach($this->_data['weixin_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo date('Y-m-d H:i',$row['act_ticket_atime']) ; ?></td>
			<td><?php echo $row['act_ticket_name']; ?></td>
			<td><?php echo $row['c_ticket_name']; ?></td>
			<td><?php echo $row['way']; ?></td>
			<td><?php echo $row['s_act_ticket_count']; ?></td>
		</tr>
		<?php };?>			   	    
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
	layui.use(["element", "laydate", "laypage"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['weixin_list']['allcount'];?>,
			limit: 25,
			curr: <?php echo $this->_data['weixin_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj,first) {
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
	});
	</script>
</body>
</html>