<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
</head>
<body style="background-image:url('images/1.jpg');">
<div class="gcenter" style="position:relative; width:85%; height:100%;">
	<div style="position:absolute; right:0px; top:180px; width:350px; height:260px; border:1px solid white; background-color:black; filter:alpha(opacity=70); -ms-filter:'progid:DXImageTransform.Microsoft.Alpha(Opacity=70)'; opacity:0.7;">
<form id="form1" method="post" action="login_do.php" onsubmit="return submit_do();">
		<div class="gcenter" style="width:306px; height:10px; line-height:10px; font-size:10px; border-top:1px solid gray;"></div>
		<div class="gcenter" style="overflow:hidden; zoom:1; margin-top:10px; width:306px;">
			<div style="float:left; width:80px; height:28px; line-height:28px; color:white; text-align:right;">企业代码：</div>
			<div style="float:left; height:28px;"><input class="ginput" type="text" name="txtcode" style="padding:0px 5px; width:200px; height:28px; line-height:26px; border:1px solid black; font-family:'Microsoft YaHei',Verdana; font-size:16px;"></div>
		</div>
		<div class="gcenter" style="overflow:hidden; zoom:1; margin-top:10px; width:306px;">
			<div style="float:left; width:80px; height:28px; line-height:28px; color:white; text-align:right;">登录帐号：</div>
			<div style="float:left; height:28px;"><input class="ginput" type="text" name="txtaccount" style="padding:0px 5px; width:200px; height:28px; line-height:26px; border:1px solid black; font-family:'Microsoft YaHei',Verdana; font-size:16px;"></div>
		</div>
		<div class="gcenter" style="overflow:hidden; zoom:1; margin-top:20px; width:306px;">
			<div style="float:left; width:80px; height:28px; line-height:28px; color:white; text-align:right;">登录密码：</div>
			<div style="float:left; height:28px;"><input class="ginput" type="password" name="txtpassword" style="padding:0px 5px; width:200px; height:28px; line-height:26px; border:1px solid black; font-family:'Microsoft YaHei',Verdana; font-size:16px;"></div>
		</div>
		<div class="gcenter" style="overflow:hidden; zoom:1; margin-top:20px; width:306px;">
			<div style="float:left; width:80px;">&nbsp;</div>
			<div style="float:left;"><input type="image" src="img/2.jpg" value="登录"></div>
		</div>
</form>
	</div>
</div>
<script>
function submit_do() {
	if(document.getElementById("form1").txtaccount.value == "") {
		alert("请输入登录帐号！");
		document.getElementById("form1").txtaccount.focus();
		return false;
	}
	if(document.getElementById("form1").txtpassword.value == "") {
		alert("请输入登录密码！");
		document.getElementById("form1").txtpassword.focus();
		return false;
	}
	return true;
}
</script>
</body>
</html>