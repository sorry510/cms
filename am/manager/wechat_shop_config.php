<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wshop_module'] != 1) {
	return;
}

$strchannel = 'wshop';

$gtemplate->fun_assign('company_wshop', get_company_wshop());
$gtemplate->fun_show('wechat_shop_config');

function get_company_wshop() {
	$arrwshop = array(
		'wshop_flag' => 0,
		'wshop_title' => '',
		'wshop_phone' => '',
		'send_method' => 0,
		'send_from' => 1,
		'fenxiao_flag' => 0,
		'share_title' => '',
		'share_image' => '',
		'ad_image1' => '',
		'ad_image2' => '',
		'ad_image3' => ''
	);
	
	$arr = array();
	$arr2 = array();
	$strsql = "SELECT company_id, company_config_wshop FROM " . $GLOBALS['gdb']->fun_table('company')
	. " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		if(!empty($arr['company_config_wshop'])) {
			$arr2 = json_decode($arr['company_config_wshop'], true);
			if(!empty($arr2)) {
				$arrwshop = $arr2;
			}
		}
	}
	return $arrwshop;
}
?>