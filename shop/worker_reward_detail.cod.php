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
						<a href="worker_reward_detail.php">员工提成明细</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker-reward-detail layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
 	<label class="layui-form-label">日期</label>
      <div class="layui-input-inline">
        <input id="laimi-from" name="from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>">
      </div>
      <label class="layui-form-label">至</label>
      <div class="layui-input-inline">
        <input id="laimi-to" name="to" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>">
      </div>
		<label class="layui-form-label">员工</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="search" placeholder="姓名/编号" value="<?php echo htmlspecialchars($this->_data['request']['search']); ?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>时间</th>
			<th>消费单号</th>
			<th>会员卡号</th>
			<th>会员姓名</th>
			<th>消费类型</th>
			<th>消费内容</th>
			<th>提成金额</th>
			<th>员工</th>
			<th>分店</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['reward_list']['list'] as $row){?>
		<tr>
			<td><?php echo $row['atime'];?></td>
			<td><a class="laimi-color-lan laimi-offcanvas" href="javascript:;"><?php echo $row['c_card_record_code'];?></a></td>
			<td><?php echo $row['c_card_code'];?></td>
			<td><?php echo $row['c_card_name'];?></td>
			<td><?php echo $row['worker_reward_type1'];?></td>
			<td><?php if($row['c_goods_name'] !=''){echo $row['c_goods_name'].'*'.$row['c_goods_count'];} else echo '--';?></td>	
			<td><span class="laimi-color-ju"><?php echo $row['worker_reward_money'];?></span></td>
			<td><?php echo $row['c_worker_name'];?></td>
			<td><?php echo $row['shop_name'];?></td>
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
	layui.use(["element", "laydate", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['reward_list']['allcount'];?>,
			limit: 5,
			curr: <?php echo $this->_data['reward_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first){
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