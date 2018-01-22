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
						<a href="system_gift_record.php">积分换礼</a>
					</li>
					<li>
						<a href="system_gift.php">礼品管理</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-score layui-tab-content">
<form class="layui-form">		    
	<div class="laimi-tools layui-form-item">		  	
		<label class="layui-form-label">分店</label>
		<div class="layui-input-inline last">
			<select name="shop">
				<option value="">全部分店</option>
				<?php foreach($GLOBALS['gshop'] as $row1) { ?>
				<option value="<?php echo $row1['shop_id']; ?>"<?php if($GLOBALS['intshop'] == $row1['shop_id']) echo ' selected'; ?>><?php echo $row1['shop_name']; ?></option>
				<?php } ?>
			</select>
		</div>
		<label class="layui-form-label">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" value="<?php echo htmlspecialchars($GLOBALS['strfrom']); ?>" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label">至</label>
		<div class="layui-input-inline">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" value="<?php echo htmlspecialchars($GLOBALS['strto']); ?>" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label">搜索</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-focus" type="text" name="key" placeholder="卡号/手机号/姓名" value="<?php echo htmlspecialchars($this->_data['request']['key']); ?>">
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
			<th>卡号</th>
			<th>会员姓名</th>
			<th>兑换内容</th>
			<th>兑换积分</th>
			<th>分店</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['gift_record_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo date("Y-m-d H:i", $row['gift_record_atime']); ?></td>
			<td><?php echo $row['c_card_code']; ?></td>
			<td><?php echo $row['c_card_name']; ?></td>
			<td><?php echo $row['mycontent']; ?></td>
			<td><?php echo $row['gift_record_score']; ?>分</td>
			<td><?php echo $row['shop_name']; ?></td>
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
	layui.use(["layer", "element", "laydate", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;

		$('.laimi-focus').focus();
		
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['gift_record_list']['allcount']; ?>,
			limit: 50,
			curr: <?php echo $this->_data['gift_record_list']['pagenow']; ?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				if(!first) {
					window.location = "system_score.php?<?php echo api_value_query($this->_data['request']);?>&page=" + obj.curr;
        }
			}
		});
	});
	</script>
</body>
</html>