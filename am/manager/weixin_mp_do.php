<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wmp_module'] != 1) {
	return 1;
}

$strname = api_value_post('txtname');
$strappid = api_value_post('txtappid');
$strappsecret = api_value_post('txtappsecret');

$intreturn = 0;

$arrweixin = array();
if($intreturn == 0) {
	$arrweixin = get_company_weixin();
	$arrweixin['name'] = $strname;
	$arrweixin['appid'] = $strappid;
	$arrweixin['appsecret'] = $strappsecret;
}

if($intreturn == 0) {
	$strjson = json_encode($arrweixin, JSON_UNESCAPED_UNICODE);
	$strsql = "UPDATE " . $gdb->fun_table('company') . " SET company_config_weixin = '" . $gdb->fun_escape($strjson)
	. "' WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;

function get_company_weixin() {
	$arrweixin = array(
		'name' => '',
		'appid' => '',
		'appsecret' => '',
		'reserve_flag' => '',
		'line_flag' => '',
		'card_image' => ''
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