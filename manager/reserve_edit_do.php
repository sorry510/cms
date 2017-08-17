<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strdtime = api_value_post('dtime');
$strdtime2 = $gdb->fun_escape($strdtime);
$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strid);
$strphone = api_value_post('phone');
$sqlphone = api_value_int0($strphone);
$strcount = api_value_post('count');
$intcount = api_value_int0($strcount);
$strmemo = api_value_post('memo');
$sqlmemo = $gdb->fun_escape($strmemo);
$strmgoods_id = api_value_post('mgoods_id');
$intshop_id = $GLOBALS['_SESSION']['login_sid'];
$time = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($sqlphone) || empty($strmgoods_id)) {
		$intreturn = 1;
	}
}

if (empty($intcard_id)) {
	$intcard_id = 0;
}

$intdtime = 0;
if($intreturn == 0) {
	if(!empty($strdtime2)) {
		$int = strtotime($strdtime2);
		if($int > 0) {
			$intdtime = $int;
		}
	}else{$intreturn = 2;}
}

if ($intreturn == 0) {
	$strsql = "SELECT reserve_here,reserve_dtime FROM " . $gdb->fun_table2('reserve') . " WHERE reserve_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 3;
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
	$strsql = "UPDATE " . $gdb->fun_table2('reserve') . " SET  card_id = " . $intcard_id . ", reserve_dtime = "
	. $intdtime . ", reserve_name = '" . $sqlname . "', reserve_phone = '" . $sqlphone . "', reserve_memo = '" . $sqlmemo . "', reserve_count = " . $intcount .",  reserve_ctime = "
	. $time ." WHERE reserve_id = " . $intid ; 
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 4;
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('reserve_mgoods') . " WHERE reserve_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
	foreach ($strmgoods_id as $key => $value) {
		$strsql = "INSERT INTO " . $gdb->fun_table2('reserve_mgoods') . " (reserve_id,mgoods_id,c_mgoods_name) VALUES (" .$intid . " , " .$value['mgoods_id'] . " , '" . $value['mgoods_name'] . "')";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 6;
		}
	}
}

echo $intreturn;
?>