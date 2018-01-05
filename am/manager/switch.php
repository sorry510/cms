<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT shop_id FROM " . $gdb->fun_table('shop') . " WHERE shop_id = " . $intshop . " AND company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid'])
	. " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$GLOBALS['_SESSION']['login_sid'] = $intshop;
	echo '<script>window.location = "../shop/main.php";</script>';
} else {
	echo '<script>window.history.back();</script>';
}
?>