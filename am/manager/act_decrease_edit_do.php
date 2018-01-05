<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['act_module'] != 1) {
	return 1;
}

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strclient = api_value_post('txtclient');
$intclient = api_value_int0($strclient);
$strman = api_value_post('txtman');
$decman = api_value_decimal($strman, 2);
$strjian = api_value_post('txtjian');
$decjian = api_value_decimal($strjian, 2);
$strstart = api_value_post('txtstart');
$strend = api_value_post('txtend');
$strmemo = api_value_post('txtmemo');
$sqlmemo = $gdb->fun_escape($strmemo);

$intreturn = 0;
if($intreturn == 0) {
	if($intclient != 1 && $intclient != 2 && $intclient != 3) {
		$intclient = 1;
	}
}

$inttime = time();
$intstart = 0;
if($intreturn == 0) {
	if($strstart != '') {
		$int = strtotime($strstart);
		if($int > 0) {
			$intstart = $int;
		}
	}
	if($intstart == 0) {
		$intreturn = 2;
	}
}

$intend = 0;
if($intreturn == 0) {
	if($strend != '') {
		$int = strtotime($strend . ' 23:59:59');
		if($int > 0 && $int > $inttime) {
			$intend = $int;
		}
	}
	if($intend == 0) {
		$intreturn = 2;
	}
}

if($intreturn == 0) {
	if($intstart > $intend) {
		$intreturn = 2;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('act_decrease') . " SET act_decrease_name = '" . $sqlname . "', act_decrease_client = " . $intclient . ", act_decrease_man = " . $decman
	. ", act_decrease_jian = " . $decjian . ",  act_decrease_start = " . $intstart . ", act_decrease_end = " . $intend . ", act_decrease_memo = '" . $sqlmemo
	. "', act_decrease_ctime =" . $inttime . " WHERE act_decrease_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('act') . " SET act_ctime = " . $inttime . " WHERE act_decrease_id = " . $intid . " LIMIT 1";
	$gdb->fun_do($strsql);
}

echo $intreturn;
?>