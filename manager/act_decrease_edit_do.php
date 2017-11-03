<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strclient = api_value_post('txtclient');
$intclient = api_value_int0($strclient);
$strman = api_value_post('txtman');
$decman = api_value_decimal($strman,2);
$strjian = api_value_post('txtjian');
$decjian = api_value_decimal($strjian,2);
$strstart = api_value_post('txtstart');
$strstart2 = $gdb->fun_escape($strstart);
$strend = api_value_post('txtend');
$strend2 = $gdb->fun_escape($strend);
$strmemo = api_value_post('txtmemo');
$sqlmemo = $gdb->fun_escape($strmemo);
$time = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($decman) || empty($decjian) || empty($intclient) || empty($intid)) {
		$intreturn = 1;
	}
}

if ($intreturn == 0) {
	$strsql = "SELECT act_decrease_start,act_decrease_end FROM " . $gdb->fun_table2('act_decrease') . " WHERE act_decrease_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
	if($arr['act_decrease_end'] < $time){
		$intreturn = 101;
	}else{
		$intreturn = 0;
	}
}

$intstart = 0;
if($intreturn == 0) {
	if(!empty($strstart2)) {
		$int = strtotime($strstart2);
		if($int > 0) {
			$intstart = $int;
		}
	}else{$intreturn = 3;}
}

$intend = 0;
if($intreturn == 0) {
	if(!empty($strend2)) {
		$int = strtotime($strend2);
		if($int > time()) {
			$intend = $int;
		}else{$intreturn = 100;}
	}else{$intreturn = 4;}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('act_decrease') . " SET  act_decrease_name = '" . $sqlname . "', act_decrease_client = " . $intclient . ", act_decrease_man = " . $decman . ", act_decrease_jian = " . $decjian .",  act_decrease_start = "
	. $intstart . ", act_decrease_end = " . $intend . ", act_decrease_memo = '" . $sqlmemo . "', act_decrease_ctime =". $time ." WHERE act_decrease_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('act') . " SET act_ctime =". $time ." WHERE act_decrease_id = " . $intid . " LIMIT 1";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}

echo $intreturn;

?>