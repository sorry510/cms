<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$time = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($intid)){
		$intreturn = 1;
	}
}

if ($intreturn == 0) {
	$strsql = "SELECT wact_discount_start,wact_discount_end FROM " . $gdb->fun_table2('wact_discount') . " WHERE wact_discount_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
	if ($arr['wact_discount_start'] < $time && $arr['wact_discount_end'] > $time) {
		$intreturn = 100;
	}else if($arr['wact_discount_end'] < $time){
		$intreturn = 101;
	}else{
		$intreturn = 0;
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('wact_discount') . " WHERE wact_discount_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

if ($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('wact_discount_goods') . " WHERE wact_discount_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}

echo $intreturn;

?>