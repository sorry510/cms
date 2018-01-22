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
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">管理收货地址</h1>
</header>
<nav class="mui-bar mui-bar-tab">
	<button onclick="javascript:window.location.href='center_shop_address_add.php?type=2'" type="button" class="mui-btn mui-btn-warning mui-btn-block laimi-botton">新增地址</button>
</nav>
<div id="laimi-content" class="mui-content">
	<?php foreach($this->_data['waddress'] as $row) { ?>
	<div class="mui-card laimi-first">
		<div class="mui-card-content-inner" style="padding:8px;margin-left:8px;margin-right:10px;">
			<span class="laimi-color-orange"><?php echo $row['waddress_name'];?>，<?php echo $row['waddress_phone'];?></span>
			<span style="float:right;"><a href="javascript:;" class="laimi-delete" id="<?php echo $row['waddress_id'];?>">删除</a></span>
		</div>
		<div class="mui-card-footer laimi-font12">
			<?php echo $row['waddress_detail'];?>
		</div>
	</div>
	<?php };?>
</div>
<script type="text/javascript" charset="utf-8">
  mui.init();
  if(mui(".laimi-delete")){
  	mui(".mui-content").on('click','.laimi-delete', function(){
	  	var id = this.getAttribute("id");
	  	mui.post('center_shop_address_delete_do.php',{
					id:id
				},function(res){
					if (res == 0) {
						window.location.href="center_shop_address.php";
					}else{
						console.log(res);
						mui.alert('删除失败');
					}
				},'json'
			);
	  })
  }
  
</script>
</body>
</html>