<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <script src="http://at.alicdn.com/t/font_485373_jtxfnkz96dlblnmi.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/> 
</head>
<body id="laimi-body">
<header id="laimi-header" class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">微信预约</h1>
</header>
<div id="laimi-content" class="mui-content">
	<?php foreach($this->_data['laimi_shop_list'] as $row) { ?>
	<div class="mui-card laimi-first" style="padding:6px;">
		<div class="mui-card-header mui-card-media laimi-card-header1">
			<img src="img/store.png" style="width:45px;height:45px;margin-right:10px;border-radius:50px;">
			<div class="mui-media-body laimi-font14" style="line-height:24px;">
				<?php echo $row['shop_name']; ?>
				<p class="laimi-font12" style="line-height:26px;">电话：<?php echo $row['shop_phone']; ?></p>
				<button onclick="javascript:window.location.href='center_shop_appointment.php?shop_id=<?php echo api_value_int0($GLOBALS['_SESSION']['login_cid']); ?>'" type="button" class="mui-btn mui-btn-primary" style="position: absolute;right:10px; top:10px;">预约</button>
			</div>
		</div>
		<div class="laimi-color-gray laimi-font12" style="line-height:30px;margin-left:10px;">
			地址：<?php echo $row['shop_area_address']; ?>
		</div>
	</div>
	<?php } ?>
</div>
 <script type="text/javascript" charset="utf-8">
    mui.init();
</script>
</body>
</html>