<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
// require('inc_limit.php');
// $GLOBALS['_SESSION']['login_id'] = 7;
// $strsystem_code = 'am';
// $intid = 1;
// $strprefix2 = substr($strsystem_code, 0, 5) . "_"
// 		. str_pad(api_value_int0($intid), 4, '0', STR_PAD_LEFT) . '_';
// $gdb->pubprefix2 = $strprefix2;

$straddress = api_value_get('address');
$intaddress = api_value_int0($straddress);
$strgettype = api_value_get('gettype');
$intgettype = api_value_int0($strgettype);
$intreturn = 0;

$strout_trade_no = api_value_int0($GLOBALS['_SESSION']['login_id']) . 'T' . time();
$inttotal_fee = laimi_wgoods_allprice() * 100;//分

$intparent_id = 0;
if($GLOBALS['gwshop']['fenxiao_flag'] == 1){
	if($GLOBALS['_SESSION']['login_sid'] != 0 && $GLOBALS['_SESSION']['login_sid'] != $GLOBALS['_SESSION']['login_id']){
		$intparent_id = $GLOBALS['_SESSION']['login_sid'];
	}
}

$arr = array(
	'address' => $intaddress,
	'worder_get' => $intgettype,
	'paytype' => "KAKOU",
	'out_trade_no' => $strout_trade_no,
	'total_fee' => $inttotal_fee,
	'parentid' => $intparent_id
	);
$intreturn = laimi_pay_return($arr);

if($intreturn == 0){
	echo "<script>window.location='./cart_ok.php';</script>";
}else if($intreturn == 5){
	echo "<script>alert('卡内余额不足');window.location='./cart_center.php';</script>";
}else{
	echo "<script>alert('操作异常');window.location='./cart_center.php';</script>";
}
