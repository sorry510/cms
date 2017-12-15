<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'wechat';

if(laimi_config_trade()['wsc_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$arrwshop = laimi_config_wshop();
$arrwpay = laimi_config_wpay(api_value_int0($GLOBALS['_SESSION']['login_cid']));
 //echo json_encode($arrwshop);exit;
$gtemplate->fun_assign('system_config_wshop', $arrwshop);
$gtemplate->fun_assign('system_config_wpay', $arrwpay);
$gtemplate->fun_show('wechat_shop_config');
?>