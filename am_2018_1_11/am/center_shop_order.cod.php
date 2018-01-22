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
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">商城订单</h1>
</header>
<div id="laimi-content" class="mui-content">
	<?php foreach($this->_data['worder'] as $row) { ?>
	<div class="mui-card laimi-first" style="padding:6px;">
		<ul class="mui-table-view laimi-table-view">
			<li class="mui-table-view-cell">
				<span class="mui-badge mui-badge-inverted laimi-font16" style="font-family:'Segoe UI';color:#FF0000;">￥<?php echo $row['worder_money2'];?></span>		
				<span class="laimi-font14 laimi-color-gray">
					<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-daoqi"></use>
				</svg>
					<?php echo date('Y-m-d H:i',$row['worder_atime']);?>
				</span>
			</li>
			<?php foreach($row['wgoods'] as $row2) { ?>
			<li class="mui-table-view-cell">
				<div class="mui-media-body">
					<img src="../upload/<?php echo api_value_int0($GLOBALS['_SESSION']['login_cid']); ?>/wgoods_image/<?php echo $row2['c_wgoods_photo1'];?>" style="height: 40px;width:40px;float:left;margin-right:10px;border-radius:3px;"/>
					<p class="laimi-color-blue"><?php echo $row2['c_wgoods_name'];?></p>
					<p style="line-height:22px;font-size:12px;">￥<?php echo $row2['worder_goods_price'];?>&nbsp;&nbsp;&nbsp;&nbsp;×<?php echo $row2['worder_goods_count'];?></p>
				</div>
			</li>
			<?php };?>
			<li class="mui-table-view-cell laimi-color-gray laimi-font14">
				<svg class="laimi-icon2" aria-hidden="true">
				  <use xlink:href="#icon-dizhi"></use>
				</svg>
				地址：<?php echo $row['worder_address_detail'];?>,<?php echo $row['worder_address_name'];?>，<?php echo $row['worder_address_phone'];?>
			</li>
			<li class="mui-table-view-cell laimi-color-gray laimi-font14">
				<span class="mui-badge mui-badge-inverted"><button type="button" class="mui-btn mui-btn-primary"><?php echo $row['state'];?></button></span>
				<span class="laimi-color-gray">方式：<?php echo $row['get'];?></span>
			</li>
			<?php if ($row['worder_state'] == 3) { ?>
			<li class="mui-table-view-cell laimi-color-gray">
				自取时间：<?php echo date('Y-m-d H:i',$row['worder_ctime']);?>
			</li>
			<li class="mui-table-view-cell laimi-color-gray">
				自取店铺：<?php echo $row['shop_name'];?>
			</li>
			<?php	};?>
			<?php if ($row['worder_state'] == 2) { ?>
			<li class="mui-table-view-cell laimi-color-gray">
				发货时间：<?php echo date('Y-m-d H:i',$row['worder_ctime']);?>
			</li>
			<li class="mui-table-view-cell laimi-color-gray">
				物流信息：<?php echo $row['worder_express_company'];?>，<?php echo $row['worder_express_code'];?>
			</li>
			<?php	};?>
		</ul>		
	</div>
	<?php };?>
</div>
 <script type="text/javascript" charset="utf-8">
    mui.init();
</script>
</body>
</html>