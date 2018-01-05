<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strshop_flag = api_value_post('txtwshop_flag');
$intshop_flag = api_value_int0($strshop_flag);
$strpay_flag = api_value_post('txtpay_flag');
$intpay_flag = api_value_int0($strpay_flag);
$strsend_method = api_value_post('txtsend_method');
$intsend_method = api_value_int0($strsend_method);
/*$strsend_from = api_value_post('txtsend_from');
$intsend_from = api_value_int0($strsend_from);*/
$strfenxiao_flag = api_value_post('txtfenxiao_flag');
$intfenxiao_flag = api_value_int0($strfenxiao_flag);

$intreturn = 0;

if($GLOBALS['intshop_flag'] != 1){
	$intsms = 2;
}
if($GLOBALS['intpay_flag'] != 1){
	$intscore = 2;
}

$arrshop = array();
$arrpay = array();

$arrshop['wshop_flag'] = $intshop_flag;
$arrshop['fenxiao_flag'] = $intfenxiao_flag;
$arrshop['send_method'] = $intsend_method;
/*$arrshop['send_from'] = $intsend_from;*/
$arrpay['pay_flag'] = $intpay_flag;

$strjson_shop = json_encode($arrshop);
$strjson_pay = json_encode($arrpay);
//echo $strjson_trade;return;
$strsql = "UPDATE " . $gdb->fun_table('company') . " SET company_config_wshop ='" . $strjson_shop . "', company_config_wpay = '". $strjson_pay ."' where company_id=" . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
$hresult = $gdb->fun_do($strsql);

if(!$hresult){
	$intreturn = 2;
}

echo $intreturn;
?>