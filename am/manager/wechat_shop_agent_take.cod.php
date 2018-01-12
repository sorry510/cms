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
						<a href="wechat_shop_agent_take">提现记录</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">搜索</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="姓名/手机号码" value="<?php echo htmlspecialchars($this->_data['request']['name']); ?>">
		</div>
		<label class="layui-form-label">日期</label>
    <div class="layui-input-inline">
      <input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>">
    </div>
    <label class="layui-form-label">至</label>
    <div class="layui-input-inline last">
      <input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>">
    </div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>提现时间</th>
			<th>姓名</th>
			<th>手机号码</th>	
			<th>提现佣金</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['wmoney_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo date('Y-m-d H:i',$row['wmoney_atime'])?></td>
			<td><?php echo $row['card_name']?></td>
			<td><?php echo $row['card_phone']?></td>
			<td class="laimi-color-ju">¥<?php echo $row['wmoney_value']?></td>
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
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['wmoney_list']['allcount'];?>,
			limit: 25,
			curr: <?php echo $this->_data['wmoney_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
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