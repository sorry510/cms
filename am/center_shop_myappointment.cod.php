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
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">我的预约</h1>
</header>
<div id="laimi-content" class="mui-content">
	<?php foreach($this->_data['reserve'] as $row) { ?>
	<div class="mui-card laimi-first" style="padding:6px;">
		<div class="mui-card-header mui-card-media laimi-card-header1">	
			<div class="laimi-font14" style="line-height:22px;">
				<p>
					<svg class="laimi-icon2" aria-hidden="true">
					    <use xlink:href="#icon-daoqi"></use>
					</svg>
					&nbsp;预约时间：<?php echo date('Y-m-d H:i',$row['reserve_dtime']);?>
				</p>
				<p class="laimi-font14 laimi-color-orange" style="line-height:22px;">预约项目：<?php echo $row['mgoods'];?></p>
				<button type="button" class="
				<?php if ($row['reserve_here'] == 2) {
					if ($row['reserve_state'] == 1) {
						echo 'mui-btn mui-btn-primary';
					}else{
						echo 'mui-btn mui-btn-grey';
					}
				}else{
					echo 'mui-btn mui-btn-warning';
				};?>" style="position: absolute;right:10px; top:10px;height:30px;">
				<?php if ($row['reserve_here'] == 2) {
					if ($row['reserve_state'] == 1) {
						echo '未到店';
					}else{
						echo '已取消';
					}
				}else{
					echo '已到店';
				};?></button>
			</div>
		</div>
		<div class="laimi-color-gray laimi-font12" style="line-height:30px;margin-left:10px;">
			<span class="laimi-font12">预约人数：<?php echo $row['reserve_count'];?>人</span>
			<span class="laimi-font12" style="float:right; margin-right:10px;">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="<?php if ($row['reserve_type'] == 1) {
				    	echo '#icon-dianhua';
				    }else{
				    	echo '#icon-weixin1';
				    };?>"></use>
				</svg>
				<?php echo date('Y-m-d H:i',$row['reserve_atime']);?>
			</span>
		</div>
	</div>
	<?php };?>
</div>
<script src="js/layer.js"></script>
<script src="js/bind_phone.js"></script>
<script type="text/javascript" charset="utf-8">
  mui.init();
	mui.ready(function(){
    bind_phone(mui, layer, <?php echo api_value_int0($GLOBALS['_SESSION']['login_id']); ?>);
  })
</script>
</body>
</html>