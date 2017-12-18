<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
// require('inc_limit.php');

$straddress = api_value_get('address');
$intaddress = api_value_int0($straddress);
$strgettype = api_value_get('gettype');
$intgettype = api_value_int0($strgettype);
$intreturn = 0;

$strout_trade_no = api_value_int0($GLOBALS['_SESSION']['login_id']) . 'T' . time();
$inttotal_fee = laimi_wgoods_allprice() * 100;//分

$arr = array(
	'address' => $intaddress,
	'worder_get' => $intgettype,
	'paytype' => "KAKOU",
	'out_trade_no' => $strout_trade_no,
	'total_fee' => $inttotal_fee
	);

$intreturn = laimi_pay_return($arr);

if($intreturn == 0){
	echo "<script>window.location='./cart_ok.php';</script>";
}else if($intreturn == 5){
	echo "<script>alert('卡内余额不足');window.location='./cart_center.php';</script>";
}else{
	echo "<script>alert('操作异常');window.location='./cart_center.php';</script>";
}
