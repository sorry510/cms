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
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">会员卡套餐</h1>
</header>
<div id="laimi-content" class="mui-content">
<?php foreach($this->_data['card_mcombo'] as $row){ ?>
	<div class="mui-card laimi-first">
		<div class="mui-card-header">
			<a class="mui-card-link laimi-font14">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-favorites"></use>
				</svg>&nbsp;
				<?php echo $row['c_mcombo_name']; ?>
			</a>
			<a class="mui-card-link laimi-font14 laimi-color-gray">有效期：<span class="laimi-color-orange"><?php echo $row['days'] != 0 ? $row['days'].'天' : '无限期'; ?></span></a>
		</div>
		<div class="laimi-color-gray laimi-font12">
			<ul class="mui-table-view">
			<?php foreach($row['goods'] as $row2){ ?>
        <li class="mui-table-view-cell">
        	<svg class="laimi-icon2" aria-hidden="true">
					    <use xlink:href="#icon-yiyuyue1"></use>
					</svg>
        	<?php echo $row2['c_mgoods_name']; ?>
        	<?php if($row2['c_mcombo_type'] == 1){ ?>
        		<span class="mui-badge mui-badge-warning">余<?php echo $row2['card_mcombo_gcount']; ?>次</span>
        	<?php } ?>
        </li>
      <?php } ?>
      </ul>
		</div>
	</div>
<?php } ?>
</div>
 <script type="text/javascript" charset="utf-8">
    mui.init();
</script>
</body>
</html>