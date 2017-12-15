<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$GLOBALS['_SESSION']['login_cid'] = 1;

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$intreturn = 0;

$strid = api_value_post('id');
$intid = api_value_int0($strid);

if (empty($intid)) {
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('waddress') . " SET waddress_state = 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

if ($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('waddress') . " SET waddress_state = 2 WHERE waddress_id = ".$intid;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

?>