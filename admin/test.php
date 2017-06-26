<!DOCTYPE html>
<html>
<head>
	<title>ddd</title>
</head>
<body>
	<input type="button" class="gsubmit2" value="立即支付" onclick="pay_do();">
</body>
<script src="../js/jquery.min.js"></script>
<script id="spay-script" src="https://jspay.beecloud.cn/1/pay/jsbutton/returnscripts?appId=eea84032-74e0-43bc-ada6-7a4f1ef4c21a"></script>
<script>
function pay_do() {
	BC.click({
		"out_trade_no": "axzyd9159T1497952363",
		"title": "阿新自由订",
		"amount": 3600,
		"sign": "b2f1c7a718ef19c6083ed39252189fba",
		"return_url": "http://www.axzyd.com/cart_finish.php",
		"optional": {"addressid":$(".caddress:checked").val()}
	});
}
</script>
</html>