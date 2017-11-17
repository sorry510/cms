<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

if(laimi_config_trade()['act_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strtype = api_value_post('type');
$time = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($intid) || empty($strtype)) {
		$intreturn = 1;
	}
}

if ($strtype == 'stop') {
	$intstate = 2;
}elseif ($strtype == 'start') {
	$intstate = 1;
}

if ($intreturn == 0) {
	$strsql = "SELECT act_give_start,act_give_end FROM " . $gdb->fun_table2('act_give') . " WHERE act_give_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
	if ($time < $arr['act_give_start']) {
		$intreturn = 102;
	}else if($arr['act_give_end'] < $time){
		$intreturn = 101;
	}else{
		$intreturn = 0;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('act_give') ."SET act_give_state = ".$intstate."  WHERE act_give_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;

?>