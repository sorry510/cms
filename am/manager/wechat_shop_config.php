<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wshop_module'] != 1) {
	return;
}

$strchannel = 'wshop';

$arrwshop = laimi_config_wshop();
$arrwpay = laimi_config_wpay(api_value_int0($GLOBALS['_SESSION']['login_cid']));

$gtemplate->fun_assign('system_config_wshop', $arrwshop);
$gtemplate->fun_assign('system_config_wpay', $arrwpay);
$gtemplate->fun_show('wechat_shop_config');

// function laimi_config_wshop(){
// 	$arr = array();
// 	$arrwshop = array();
// 	$arrwshop_init = array(
// 					'wshop_flag' => 2,
// 					'send_method' => 3,
// 					'send_from' => 2,
// 					'fenxiao_flag' => 2,
// 				);
// 	$strsql = "SELECT company_config_wshop FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id=" . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
// 	$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
// 	if(!empty($arr)){
// 		if(!empty($arr['company_config_wshop'])){
// 			$arrwshop = json_decode($arr['company_config_wshop'], true);
// 			if(!$arrwshop){
// 				$arrwshop = $arrwshop_init;
// 			}
// 		}else{
// 			$arrwshop = $arrwshop_init;
// 		}
// 	}
// 	return $arrwshop;
// }

// function laimi_config_wpay($cid){
// 	$arr = array();
// 	$arrwpay = array();
// 	$arrwpay_init = array(
// 					'pay_flag' => 2,
// 					'alipay_appid' => '',
// 					'alipay_key' => '',
// 					'alipay_rsa2' => '',
// 					'weixin_appid' => '',
// 					'weixin_mchid' => '',
// 					'weixin_key' => '',
// 					'weixin_appsecret' => '',
// 				);
// 	$strsql = "SELECT company_config_wpay FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id = " . $cid . " LIMIT 1";
// 	$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
// 	if(!empty($arr)){
// 		if(!empty($arr['company_config_wpay'])){
// 			$arrwpay = json_decode($arr['company_config_wpay'], true);
// 			if(!$arrwpay){
// 				$arrwpay = $arrwpay_init;
// 			}
// 		}else{
// 			$arrwpay = $arrwpay_init;
// 		}
// 	}
// 	return $arrwpay;
// }
?>