<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');

require(C_ROOT . '/_include/inc_init.php');

$strcode = api_value_post('txtcode');
$sqlcode = $gdb->fun_escape($strcode);
$straccount = api_value_post('txtaccount');
$sqlaccount = $gdb->fun_escape($straccount);
$strpassword = api_value_post('txtpassword');
$sqlpassword = $gdb->fun_escape($strpassword);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT company_id, system_code FROM " . $gdb->fun_table('company') . " WHERE company_code = '" . $sqlcode . "' LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$gdb->pub_prefix2 = $arr['system_code'] . "_" . str_pad($arr['company_id'], 4, '0', STR_PAD_LEFT) . "_";
	} else {
		$intreturn = 2;
	}
}

$inttime = time();
$arr2 = array();
if($intreturn == 0) {
	$strsql = "SELECT shop_id FROM " . $gdb->fun_table('shop')
	. " WHERE company_id = " . $arr['company_id'] . " AND shop_etime > " . $inttime . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr2 = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr2)) {
		$intreturn = 3;
	}
}

$arr3 = array();
if($intreturn == 0) {
	$strsql = "SELECT user_id, user_type, user_name, shop_id FROM " . $gdb->fun_table2('user')
	. " WHERE user_account = '" . $sqlaccount . "' AND user_password = '" . $sqlpassword . "' LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr3 = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr3)) {
		$intreturn = 4;
	} else {
		if($arr3['user_type'] != 1 && $arr3['user_type'] != 2 && $arr3['user_type'] != 3) {
			$intreturn = 1;
		}
	}
}

$arr4 = array();
if($intreturn == 0) {
	if($arr3['user_type'] == 2 || $arr3['user_type'] == 3) {
		$strsql = "SELECT shop_id FROM " . $gdb->fun_table('shop')
		. " WHERE shop_id = " . $arr3['shop_id'] . " AND shop_etime > " . $inttime . " LIMIT 1";
		$hresult = $gdb->fun_query($strsql);
		$arr4 = $gdb->fun_fetch_assoc($hresult);
		if(empty($arr4)) {
			$intreturn = 5;
		}
	}
}

if($intreturn == 0) {
	$GLOBALS['_SESSION']['login_type'] = $arr3['user_type'];
	$GLOBALS['_SESSION']['login_id'] = $arr3['user_id'];
	$GLOBALS['_SESSION']['login_name'] = $arr3['user_name'];
	$GLOBALS['_SESSION']['login_code'] = $arr['system_code'];
	$GLOBALS['_SESSION']['login_cid'] = $arr['company_id'];
	$GLOBALS['_SESSION']['login_sid'] = $arr3['shop_id'];
}

if($intreturn == 0) {
	if($arr3['user_type'] == 1) {
		echo 'manager';
	} else if($arr3['user_type'] == 2) {
		echo 'shop';
	} else if($arr3['user_type'] == 3) {
		echo 'cashier';
	}
} else {
	echo $intreturn;
}
?>