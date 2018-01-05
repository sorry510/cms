<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wmp_module'] != 1) {
	return 1;
}

$strreserve = api_value_post('txtreserve');
$intreserve = api_value_int0($strreserve);
$strline = api_value_post('txtline');
$intline = api_value_int0($strline);
$strimage = api_value_post('txtimage');
$strimage = basename($strimage);

$intreturn = 0;

$arrweixin = array();
if($intreturn == 0) {
	if($intreserve != 1) {
		$intreserve = 2;
	}
	if($intline != 1) {
		$intline = 2;
	}
	$arrweixin = get_company_weixin();
	$arrweixin['reserve_flag'] = $intreserve;
	$arrweixin['line_flag'] = $intline;
	if($strimage != '') {
		$arrweixin['card_image'] = 'laimi.png';
	}
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

if($intreturn == 0) {
	if($strimage != '') {
		copy($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . $strimage,
		$GLOBALS['gconfig']['path']['weixin'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['card_image'] . '/laimi.png');
		unlink($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . $strimage);
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