<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['act_module'] != 1) {
	return 1;
}

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

$strid = 0;
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act_decrease') . " (act_decrease_name, act_decrease_client, act_decrease_man, act_decrease_jian, act_decrease_start, "
	. "act_decrease_end, act_decrease_memo, act_decrease_state, act_decrease_atime, act_decrease_ctime) VALUES ('"
	. $sqlname . "', " . $intclient .", " . $decman .", " . $decjian . ", " . $intstart . ", " . $intend . ", '" . $sqlmemo . "', 1, " . $inttime . ", 0)";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
	if($intreturn == 0) {
		$strid = mysql_insert_id();
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act') . " (act_type, act_decrease_id, act_atime) VALUES (2, " . $strid . ", " . $inttime . ")";
	$gdb->fun_do($strsql);
}

echo $intreturn;
?>