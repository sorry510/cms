<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
$arrwpay = laimi_config_wpay(api_value_int0($GLOBALS['_SESSION']['login_cid']));
require_once "wx_pay/lib/WxPay.Api.php";
require_once "wx_pay/WxPay.MicroPay.php";
require_once 'wx_pay/log.php';

//初始化日志
$logHandler= new CLogFileHandler("wx_pay/logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}
$strout_trade_no = api_value_int0($GLOBALS['_SESSION']['login_id']) . 'T' . time();//订单号，需要保证唯一性

if(isset($_REQUEST["auth_code"]) && $_REQUEST["auth_code"] != ""){
	$auth_code = $_REQUEST["auth_code"];
	$input = new WxPayMicroPay();
	$input->SetAuth_code($auth_code);
	$input->SetBody("刷卡测试样例-支付");
	$input->SetTotal_fee("1");
	$input->SetOut_trade_no($strout_trade_no);
	
	$microPay = new MicroPay();
	printf_info($microPay->pay($input));
}

/**
 * 注意：
 * 1、提交被扫之后，返回系统繁忙、用户输入密码等错误信息时需要循环查单以确定是否支付成功
 * 2、多次（一半10次）确认都未明确成功时需要调用撤单接口撤单，防止用户重复支付
 */

?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>刷卡支付款单</title>
</head>
<body>
	<form action="#" method="post">
        <div style="margin-left:2%;">商品描述：</div><br/>
        <input type="text" style="width:96%;height:35px;margin-left:2%;" readonly value="刷卡测试样例-支付" name="auth_code" /><br /><br />
        <div style="margin-left:2%;">支付金额：</div><br/>
        <input type="text" style="width:96%;height:35px;margin-left:2%;" readonly value="1分" name="auth_code" /><br /><br />
        <div style="margin-left:2%;">授权码：</div><br/>
        <input type="text" style="width:96%;height:35px;margin-left:2%;" name="auth_code" /><br /><br />
       	<div align="center">
			<input type="submit" value="提交刷卡" style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()" />
		</div>
	</form>
</body>
</html>