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
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">我的信息</h1>
</header>
<div id="laimi-content" class="mui-content">
	<div class="mui-card laimi-first">
		<ul class="mui-table-view laimi-table-view">
			<li class="mui-table-view-cell">
				<span class="mui-badge mui-badge-inverted">
					<input type="text" placeholder="您的姓名" class="laimi-font14 laimi-input100" style="border:0px;text-align:right;">
				</span>
				微信昵称
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-badge mui-badge-inverted" style="font-size:14px;">CY10001</span>
				会员卡号
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-badge mui-badge-inverted"><input type="text" value="张小宇" class="laimi-font14 laimi-input100" style="border:0px;text-align:right;"></span>
				会员姓名
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-badge mui-badge-inverted"><input type="text" value="13623833360" class="laimi-font14 laimi-input100" style="border:0px;text-align:right;"></span>
				手机号码
			</li>
			<li class="mui-table-view-cell">
				<span class="mui-badge mui-badge-inverted" style="font-size:14px;"><input type="password" value="123654" class="laimi-font14 laimi-input100" style="border:0px;text-align:right;"></span>
				会员密码
			</li>
			<li class="mui-table-view-cell">				
				<a class="mui-navigate-right">
					<span class="mui-badge mui-badge-danger mui-badge-inverted" style="font-size:14px;font-family:'Segoe UI';">2017-11-30</span>					
					出生日期
				</a>
			</li>
		</ul>		
	</div>
	<div class="mui-content-padded">
        <button type="button" class="mui-btn mui-btn-warning mui-btn-block laimi-botton">完成</button>
    </div>
</div>
 <script type="text/javascript" charset="utf-8">
    mui.init();
</script>
</body>
</html>