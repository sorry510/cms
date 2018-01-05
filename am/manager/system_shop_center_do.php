<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT shop_id FROM " . $gdb->fun_table('shop') . " WHERE shop_id = " . $intid . " AND company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table('shop') . " SET shop_center = 2 WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']);
	$gdb->fun_do($strsql);
	$strsql = "UPDATE " . $gdb->fun_table('shop') . " SET shop_center = 1 WHERE shop_id = " . $arr['shop_id'] . " LIMIT 1";
	$gdb->fun_do($strsql);
}

echo $intreturn;