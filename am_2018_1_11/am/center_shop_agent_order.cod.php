<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <script src="http://at.alicdn.com/t/font_485373_ir4fvm75c4ygb9.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/> 
</head>
<body id="laimi-body">
<header id="laimi-header" class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">订单记录</h1>
</header>
<div id="laimi-content" class="mui-content">
	<?php foreach($this->_data['worder'] as $row) { ?>
	<div class="mui-card laimi-first" style="padding:6px;">
		<ul class="mui-table-view mui-table-view-chevron">
			<li class="mui-table-view-cell mui-collapse">
				<a class="mui-navigate-right" href="#">
					<svg class="laimi-icon2" aria-hidden="true">
					  <use xlink:href="#icon-jiekuanwenti"></use>
					</svg>
					<span class="laimi-font12 laimi-color-gray"><?php echo date('Y-m-d H:i',$row['worder_atime']);?> </span>
					<span class="mui-badge mui-badge-inverted laimi-font14" style="float:right;color:#FFA500;"><span class="laimi-color-gray laimi-font12">佣金：</span> ¥<?php echo $row['s_worder_reward'];?></span>
				</a>
				<ul class="mui-table-view mui-table-view-chevron">
					<li class="mui-table-view-cell laimi-font12 laimi-color-gray">
          	会员姓名：<?php echo $row['c_card_name'];?>，手机：<?php echo $row['c_card_phone'];?>，
          </li>
          <li class="mui-table-view-cell laimi-font12 laimi-color-gray">
          	消费：¥<?php echo $row['worder_money2'];?>&nbsp;&nbsp;(<?php echo $row['pay'];?>支付)
          </li>
          <li class="laimi-font12 laimi-color-gray" style="padding:8px;margin-left:22px;">
          	订单状态：<?php echo $row['state'];?>
          </li>
				</ul>
			</li>
		</ul>
	</div>
	<?php };?>
</div>
<script type="text/javascript" charset="utf-8">
  mui.init();
</script>
</body>
</html>