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
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">活动消息</h1>
</header>
<div id="laimi-content" class="mui-content">
	<?php foreach($this->_data['notice'] as $row) { ?>
	<div class="mui-card laimi-first" style="padding:6px;">
		<div class="mui-card-header mui-card-media laimi-card-header1">	
			<div class="laimi-font14" style="line-height:22px;">
				<p>
					<svg class="laimi-icon2" aria-hidden="true">
					    <use xlink:href="#icon-daoqi"></use>
					</svg>
					&nbsp;<?php echo $row['wnotice_title']; ?>
				</p>
				<p class="laimi-font14 laimi-color-orange" style="line-height:22px;">活动详情：<?php echo $row['wnotice_content']; ?></p>
			</div>
		</div>
	</div>
	<?php };?>
</div>
 <script type="text/javascript" charset="utf-8">
    mui.init();
</script>
</body>
</html>