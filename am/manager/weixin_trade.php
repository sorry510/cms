<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wmp_module'] != 1) {
	return;
}

$strchannel = 'weixin';

$gtemplate->fun_assign('company_weixin', get_company_weixin());
$gtemplate->fun_show('weixin_trade');

function get_company_weixin() {
	$arrweixin = array(
		'name' => '',
		'appid' => '',
		'appsecret' => '',
		'reserve_flag' => '',
		'line_flag' => '',
		'card_background' => ''
	);
	
	$arr = array();
	$arr2 = array();
	$strsql = "SELECT company_id, company_config_weixin FROM " . $GLOBALS['gdb']->fun_table('company')
	. " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		if(!empty($arr['company_config_weixin'])) {
			$arr2 = json_decode($arr['company_config_weixin'], true);
			if(!empty($arr2)) {
				$arrweixin = $arr2;
			}
		}
	}
	return $arrweixin;
}
?>