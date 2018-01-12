<?php
if(!defined('C_CNFLY')) {
	exit();
}

function laimi_shop_info() {
	$strname = '';
	$arr = array();
	$strsql = "SELECT shop_id, shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')
	. " WHERE shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " AND company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$strname = $arr['shop_name'];
	}
	return $strname;
}

function laimi_user_info() {
	$strname = '';
	$arr = array();
	$strsql = "SELECT user_id, user_name FROM " . $GLOBALS['gdb']->fun_table2('user') . " WHERE user_id = " . api_value_int0($GLOBALS['_SESSION']['login_id']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$strname = $arr['user_name'];
	}
	return $strname;
}

function laimi_shop_print() {
	$arrprint = array(
		'sprint_flag' => '',
		'sprint_title' => '',
		'sprint_memo' => '',
		'sprint_width' => '',
		'sprint_device' => '',
		'wprint_device' => ''
	);
	
	$arr = array();
	$arr2 = array();
	$strsql = "SELECT shop_id, shop_config_print FROM " . $GLOBALS['gdb']->fun_table('shop')
	. " WHERE shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid'])
	. " AND company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		if(!empty($arr['shop_config_print'])) {
			$arr2 = json_decode($arr['shop_config_print'], true);
			if(!empty($arr2)) {
				$arrprint = $arr2;
			}
		}
	}
	return $arrprint;
}
?>