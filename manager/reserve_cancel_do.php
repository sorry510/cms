<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

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
	$strsql = "SELECT reserve_here,reserve_dtime FROM " . $gdb->fun_table2('reserve') . " WHERE reserve_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
	$etime = date('Y-m-d',$arr['reserve_dtime']);
	$etime = strtotime($etime) + 86399;
	if ($arr['reserve_here'] == 1) {
		$intreturn = 100;
	}else if($etime < $time){
		$intreturn = 101;
	}
}
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('reserve') ."SET reserve_state = ".$intstate."  WHERE reserve_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;

?>