<!DOCTYPE html>
<html>
<head>
	<title>ddd</title>
</head>
<body>
	<input type="button" class="gsubmit2" value="立即支付" onclick="pay_do();">
</body>
<?php
$app_id = 'eea84032-74e0-43bc-ada6-7a4f1ef4c21a';
$app_secret = 'dd1a3d75-7757-40cb-8d7a-a33e7eaf4706';
$out_trade_no = 'axzyd9159T1498459459';
$title = '阿新自由订';
$amount = 1;
$sign = md5($app_id . $title . $amount . $out_trade_no . $app_secret);//生成sign
?>
<script src="../js/jquery.min.js"></script>
<script id="spay-script" src="https://jspay.beecloud.cn/1/pay/jsbutton/returnscripts?appId=eea84032-74e0-43bc-ada6-7a4f1ef4c21a"></script>
<script>
function pay_do() {
	BC.click({
		"out_trade_no": "axzyd9159T1498459459",
		"title": "阿新自由订",
		"amount": 1,
		"sign": "<?php echo $sign;?>",
		"return_url": "http://www.axzyd.com/cart_finish.php",
		"optional": {"addressid":$(".caddress:checked").val()}
	});
}
</script>
</html>