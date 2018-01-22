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
						<a href="worker_reward_tongji.php">员工提成统计</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker-reward-tongji layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">日期</label>
      <div class="layui-input-inline">
        <input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd" value="<?php echo $GLOBALS['strfrom']; ?>">
      </div>
      <label class="layui-form-label">至</label>
      <div class="layui-input-inline">
        <input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd" value="<?php echo $GLOBALS['strto']; ?>">
      </div>
		<label class="layui-form-label">员工</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200 laimi-focus" type="text" name="key" placeholder="姓名/编号" value="<?php echo htmlspecialchars($GLOBALS['strkey']); ?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th rowspan="2">排名</th>
			<th rowspan="2">员工姓名</th>
			<th rowspan="2">分组</th>
			<th colspan="2">办卡</th>
			<th colspan="2">充值</th>
			<th colspan="2">服务</th>
			<th colspan="2">商品</th>
			<th colspan="2">导购</th>
			<th rowspan="2">基本工资</th>
			<th rowspan="2">合计工资</th>
			<th rowspan="2">分店</th>
		</tr>
		<tr>
			<th>数量</th>
			<th>提成</th>
			<th>金额</th>
			<th>提成</th>
			<th>次数</th>
			<th>提成</th>
			<th>数量</th>
			<th>提成</th>
			<th>次数</th>
			<th>提成</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['worker_reward_tongji']['list'] as $key => $row) { ?>
	  <tr>
	    <td><?php echo $key+1;?></td>
	    <td><?php echo $row['c_worker_name'];?></td>
	    <td><?php echo $row['c_worker_group_name'];?></td>
	    <td><?php echo $row['num_kk'];?></td>
	    <td><span class="laimi-color-ju"><?php echo $row['tc_kk'];?></span></td>
	    <td><span class="laimi-color-ju"><?php echo $row['je_cz'];?></span></td>
	    <td><span class="laimi-color-ju"><?php echo $row['tc_cz'];?></span></td>
	    <td><span class="laimi-color-ju"><?php echo $row['je_fw'];?></span></td>
	    <!-- <td><span><?php echo $row['num_fw'];?></span></td> -->
	    <td><span class="laimi-color-ju"><?php echo $row['tc_fw'];?></span></td>
	    <td><span class="laimi-color-ju"><?php echo $row['je_sw'];?></span></td>
	    <!-- <td><span><?php echo $row['num_sw'];?></span></td> -->
	    <td><span class="laimi-color-ju"><?php echo $row['tc_sw'];?></span></td>
	    <td><span class="laimi-color-ju"><?php echo $row['je_dg'];?></span></td>
	    <!-- <td><span><?php echo $row['num_dg'];?></span></td> -->
	    <td><span class="laimi-color-ju"><?php echo $row['tc_dg'];?></span></td>
	    <td><span class="laimi-color-ju"><?php echo $row['worker_wage'];?></span></td>
	    <td><span class="laimi-color-ju"><?php echo $row['sz_wage'];?></span>元</td>
	    <td><?php echo $row['shop_name'];?></td>
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
			count: <?php echo $this->_data['worker_reward_tongji']['allcount']; ?>,
			limit: 50,
			curr: <?php echo $this->_data['worker_reward_tongji']['pagenow']; ?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first){
				if(!first) {
					window.location = "worker_reward_tongji.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + obj.curr;
				}
			}
		});
	});
	</script>
</body>
</html>