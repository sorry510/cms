<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <script src="http://at.alicdn.com/t/font_485373_cencq7eaouqjv2t9.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/> 
</head>
<body id="laimi-body">
<header id="laimi-header" class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">优惠券</h1>
</header>
<div id="laimi-content" class="mui-content">	
	<div style="padding: 10px 10px;">
		<div id="segmentedControl" class="mui-segmented-control laimi-font14" style="height:25px;">
			<a class="mui-control-item mui-active laimi-font14" href="#item1">可用优惠券</a>
			<a class="mui-control-item laimi-font14" href="#item2">已使用</a>
			<a class="mui-control-item laimi-font14" href="#item3">已过期</a>
		</div>
	</div>
	<div>
		<div id="item1" class="mui-control-content mui-active">
			<div class="mui-card laimi-first" style="padding: 15px;">
			<?php foreach($this->_data['card_coupon1'] as $row){ ?>
				<div class="mui-card-header" style="background-image: url('../img/ticket_bg2.png');height:78px;margin-top:10px;padding:0px;">
					<ul>
						<li class="laimi-color-white laimi-font16"><?php echo $row['c_ticket_name']; ?> ×1 <span style="background-color:#000000;border-radius:6px;padding:2px 6px 2px 6px;opacity:0.8;" class="laimi-font12 laimi-color-white"><?php echo $row['typename']; ?></span>&nbsp;<span style="background-color:#FFA500;border-radius:6px;padding:2px 6px 2px 6px;opacity:0.8;" class="laimi-font12 laimi-color-white">门店券</span></li>
						<li class="laimi-font12" style="line-height:26px;"><?php if($row['ticket_type'] == 1) echo '满'.$row['c_ticket_limit'].'元可用,';?>到期时间：<?php echo $row['edate']; ?></li>
					</ul>
				</div>
			<?php } ?>
			</div>
			<?php if(empty($this->_data['card_coupon1'])){ ?>
			<div style="height:100%;text-align:center;">无</div>
			<? } ?>
		</div>
		<div id="item2" class="mui-control-content">
			<div class="mui-card laimi-first" style="padding: 15px;">
			<?php foreach($this->_data['card_coupon2'] as $row){ ?>
				<div class="mui-card-header" style="background-image: url('../img/ticket_bg3.png');height:78px;margin-top:10px;padding:0px;">
					<ul>
						<li class="laimi-color-white laimi-font16"><?php echo $row['c_ticket_name']; ?> ×1 <span style="background-color:#000000;border-radius:6px;padding:2px 6px 2px 6px;opacity:0.8;" class="laimi-font12 laimi-color-white"><?php echo $row['typename']; ?></span>&nbsp;<span style="background-color:#FFA500;border-radius:6px;padding:2px 6px 2px 6px;opacity:0.8;" class="laimi-font12 laimi-color-white">门店券</span></li>
						<li class="laimi-font12" style="line-height:26px;"><?php if($row['ticket_type'] == 1) echo '满'.$row['c_ticket_limit'].'元可用,';?>到期时间：<?php echo $row['edate']; ?></li>
					</ul>
				</div>
			<?php } ?>
			</div>
			<?php if(empty($this->_data['card_coupon2'])){ ?>
			<div style="height:100%;text-align:center;">无</div>
			<? } ?>
		</div>
		<div id="item3" class="mui-control-content">
			<div class="mui-card laimi-first" style="padding: 15px;">
			<?php foreach($this->_data['card_coupon3'] as $row){ ?>
				<div class="mui-card-header" style="background-image: url(img/ticket_bg3.png);height:78px;margin-top:10px;padding:0px;">
					<ul>
						<li class="laimi-color-white laimi-font16"><?php echo $row['c_ticket_name']; ?> ×1 <span style="background-color:#000000;border-radius:6px;padding:2px 6px 2px 6px;opacity:0.8;" class="laimi-font12 laimi-color-white"><?php echo $row['typename']; ?></span>&nbsp;<span style="background-color:#FFA500;border-radius:6px;padding:2px 6px 2px 6px;opacity:0.8;" class="laimi-font12 laimi-color-white">门店券</span></li>
						<li class="laimi-font12" style="line-height:26px;"><?php if($row['ticket_type'] == 1) echo '满'.$row['c_ticket_limit'].'元可用,';?>到期时间：<?php echo $row['edate']; ?></li>
					</ul>
				</div>
			<?php } ?>
			<?php if(empty($this->_data['card_coupon3'])){ ?>
			<div style="height:100%;text-align:center;">无</div>
			<? } ?>
		</div>
	</div>
</div>
 <script type="text/javascript" charset="utf-8">
    mui.init();
</script>
</body>
</html>