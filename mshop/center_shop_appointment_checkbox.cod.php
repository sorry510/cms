<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="./js/mui.min.js"></script>
    <script src="http://at.alicdn.com/t/font_485373_jtxfnkz96dlblnmi.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/> 
    <link rel="stylesheet" href="css/mui.picker.min.css" />
	</head>
	<body id="laimi-body">
		<header id="laimi-header" class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">微信预约</h1>
		</header>
		<div id="laimi-content" class="mui-content">
			<form class="mui-input-group" action="center_shop_appointment.php" method="get">
				<div class="mui-card">
					<?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
						<?php foreach($this->_data['mgoods'] as $row2) { 
             if ($row['mgoods_catalog_id'] == $row2['mgoods_catalog_id']) {
          	?>
					<div class="mui-input-row mui-checkbox">
						<label><?php echo $row2['mgoods_name'];?></label>
						<input mgoods_id="<?php echo $row2['mgoods_id'];?>" name="mgoods[]" value="<?php echo $row2['mgoods_id'].','.$row2['mgoods_name'];?>" type="checkbox" >
					</div>
						<?php }
            } ?>
          <?php } ?>
				</div>
				<input type="hidden" name="shop_id" value="<?php echo $this->_data['assign']['shop_id']?>">
				<input type="hidden" name="card_name" value="<?php echo $this->_data['assign']['card_name']?>">
				<input type="hidden" name="card_phone" value="<?php echo $this->_data['assign']['card_phone']?>">
				<input type="hidden" name="dtime" value="<?php echo $this->_data['assign']['dtime']?>">
				<input type="hidden" name="count" value="<?php echo $this->_data['assign']['count']?>">
				<input type="hidden" name="memo" value="<?php echo $this->_data['assign']['memo']?>">
				<div class="mui-content-padded">
			    <button type="submit" class="mui-btn mui-btn-warning mui-btn-block laimi-botton laimi-submit">确定</button>
			  </div>
		  </form>
		</div>
	</body>
	<script>
		mui.init();
		var goods = <?php echo $this->_data['assign']['goods_id'];?>;
		console.log(goods);
		mui("#laimi-content input[name='mgoods[]']").each(function(k,v){
			for (var i = 0; i < goods.length; i++) {
				console.log(v.getAttribute('mgoods_id'));
				if (v.getAttribute('mgoods_id') == goods[i]) {
					v.setAttribute('checked','checked');
				}
			}
		})
	</script>
</html>