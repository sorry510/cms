<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
<style type="text/css">
#laimi-main .layui-row {padding:10px 0; line-height:26px;}
</style>
</head>
<body class="layui-layout-body">
	<div class="layui-layout layui-layout-admin">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_left', ''); ?>
		<div id="laimi-content" class="layui-body">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
					<li class="layui-this">
						<a href="system_company.php">企业信息</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-company layui-tab-content">
<blockquote class="layui-elem-quote">
	<div class="layui-row">
		<div class="layui-col-xs2" style="text-align:center;">
			<img src="../../img/touxiang.png">
		</div>
		<div class="layui-col-xs10 layui-text" style="line-height:26px;">
			<span style="line-height:42px; color:#009688; font-size:22px;"><?php echo $this->_data['company_info']['company_name']; ?></span>&nbsp;&nbsp;<span class="layui-badge">第<?php echo $this->_data['company_info']['myyear']; ?>年</span><br>
			企业代码：<b class="laimi-color-ju"><?php echo $this->_data['company_info']['company_code']; ?></b> 　　　联系人：<?php echo $this->_data['company_info']['company_link_name']; ?>　　　手机号：<?php echo $this->_data['company_info']['company_phone']; ?><br>
			所属区域：<?php echo $this->_data['company_info']['mysheng']; ?> <?php echo $this->_data['company_info']['myshi']; ?>　　　地址：<?php echo $this->_data['company_info']['company_area_address']; ?><br>
		</div>
	</div>
</blockquote>
<blockquote class="layui-elem-quote">
	<div class="layui-row">
		<div class="layui-col-xs-offset2">
			<ul class="layui-timeline">
<?php foreach($this->_data['company_pay_list'] as $row) { ?>
				<li class="layui-timeline-item">
					<i class="layui-icon layui-timeline-axis">&#xe63f;</i>
					<div class="layui-timeline-content layui-text">
						<h3 class="layui-timeline-title"><?php echo date('Y-m-d', $row['company_pay_atime']); ?>  <?php echo $row['company_pay_memo1']; ?></h3>
						<p>
							<span class="laimi-color-ju">￥<?php echo $row['company_pay_money'] + 0; ?></span>（<?php echo $row['company_pay_memo2']; ?>）<br>
							备注：<?php echo $row['company_pay_memo3']; ?>
						</p>
					</div>
				</li>
<?php } ?>
				<!--li class="layui-timeline-item">
					<i class="layui-icon layui-timeline-axis">&#xe63f;</i>
					<div class="layui-timeline-content layui-text">
						<h3 class="layui-timeline-title">2017-8-14 16:24 续费</h3>
						<p>
							<span class="laimi-color-ju">￥1286.00</span>（支付宝付款, 购买内容：1店铺续费1年）<br>
							备注：无<br>
						</p>
					</div>
				</li>
				<li class="layui-timeline-item">
					<i class="layui-icon layui-timeline-axis">&#xe63f;</i>
					<div class="layui-timeline-content layui-text">
						<h3 class="layui-timeline-title">2016-8-15 15:28  开通</h3>
						<p>
							<span class="laimi-color-ju">￥1286.00</span>（支付宝付款, 购买内容：1店铺）<br>
							备注：赠送三个月<br>
						</p>
					</div>
				</li-->
			</ul>
		</div>
	</div>
</blockquote>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
	});
	</script>
</body>
</html>