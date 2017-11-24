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
						<a href="mcombo2.php">计次套餐</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-mcombo2 layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<label class="layui-form-label">商品</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" value="<?php echo $this->_data['request']['search']?>" name="search" placeholder="商品名称/编码/简拼">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>套餐名称</th>
			<th>编码</th>
			<th>商品价格</th>
			<th>会员价格</th>
			<th>有效期</th>
			<th>活动</th>
			<th>预约</th>
			<th>状态</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['mcombo_time_list']['list'] as $row) { ?>
		<tr>
			<td title="<?php echo $row['mcombo_name']; ?>"><a href="#" class="coffopen" mcombo_id="<?php echo $row['mcombo_id'];?>"><?php echo $row['mcombo_name']; ?></a></td>
			<td><?php echo $row['mcombo_code']; ?></td>
			<td>¥<?php echo $row['mcombo_price']; ?></td>
			<td><?php echo $row['mcombo_cprice']==0?'--':'¥'.$row['mcombo_cprice']; ?></td>
			<td><?php echo $row['mcombo_limit_type'] == '2'?$row['mcombo_limit_days'].'天':'不限期' ;?></td>
			<td><i class="layui-icon <?php echo $row['mcombo_act']==1?'laimi-icon-dui':'laimi-icon-cuo';?>">&#x1005;</i></td>
			<td><i class="layui-icon <?php echo $row['mcombo_reserve']==1?'laimi-icon-dui':'laimi-icon-cuo';?>">&#x1005;</i></td>
			<td>正常</td>
		</tr>
		<?php }; ?>
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
	layui.use(["element", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['mcombo_time_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['mcombo_time_list']['pagenow'];?>,
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