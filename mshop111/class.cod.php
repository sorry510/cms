<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <script src="js/iconfont.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/>
</head>
<body id="laimi-body">
<header class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-font14">商品分类</h1>
</header>
<div id="laimi-content" class="mui-content">	
	<div class="mui-card" style="padding:0px;margin:0px;margin-top:6px;">
		<ul class="mui-table-view">
			<li class="mui-table-view-cell">
				<a class="mui-navigate-right" href="list.php">
					全部商品
				</a>
			</li>
		</ul>
	</div>
	<div class="mui-card" style="padding:0px;margin:0px;margin-top:6px;">
		<ul class="mui-table-view">
			<?php foreach($this->_data['wgoods_catalog'] as $row) { ?>
			<li class="mui-table-view-cell">
				<a class="mui-navigate-right" href="list.php?catalog_id=<?php echo $row['wgoods_catalog_id'];?>">
					<?php echo $row['wgoods_catalog_name'];?>
				</a>
			</li>
			<?php };?>
		</ul>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
  mui.init();
</script>
</body>
</html>