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
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">添加收货地址</h1>
</header>
<div id="laimi-content" class="mui-content">
	<form method="post" action="center_shop_address_add_do.php">
		<div class="mui-card laimi-first">
			<ul class="mui-table-view laimi-table-view">
				<li class="mui-table-view-cell">				
					<span class="mui-badge mui-badge-inverted">
						<input type="text" placeholder="您的姓名" name="name" class="laimi-font14 laimi-input100" style="border:0px;text-align:right;">
						<input type="hidden" value="<?php echo $this->_data['assign']['type'];?>" name="type" class="laimi-font14 laimi-input100" style="border:0px;text-align:right;">
					</span>					
					会员姓名
				</li>
				<li class="mui-table-view-cell">			
					<span class="mui-badge mui-badge-inverted">
						<input type="text" placeholder="您的手机" name="phone" class="laimi-font14 laimi-input100" style="border:0px;text-align:right;">
					</span>					
					手机号码
				</li>
				<li class="mui-table-view-cell">						
					<span style="line-height:35px;">收货地址</span>
					<textarea id="textarea" rows="5" placeholder="请填写收货地址" name="address" class="laimi-font14 laimi-color-gray" style="height:80px;padding:10px;"></textarea>
				</li>
			</ul>
		</div>
		<div class="mui-content-padded">
	    <button type="submit" class="mui-btn mui-btn-warning mui-btn-block laimi-botton">完成</button>
	  </div>
  </form>
</div>
<script type="text/javascript" charset="utf-8">
  mui.init();
</script>
</body>
</html>