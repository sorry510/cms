<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strclient = api_value_post('client');
$intclient = api_value_int0($strclient);
$strman = api_value_post('man');
$decman = api_value_decimal($strman,2);
$strjian = api_value_post('jian');
$decjian = api_value_decimal($strjian,2);
$strstart = api_value_post('start');
$strstart2 = $gdb->fun_escape($strstart);
$strend = api_value_post('end');
$strend2 = $gdb->fun_escape($strend);
$strmemo = api_value_post('memo');
$sqlmemo = $gdb->fun_escape($strmemo);
$strshop = api_value_post('shop');
$strshop_id = api_value_post('shop_id');

$intreturn = 0;

if ($strshop == 'all') {
	$intshop = 1;
}else{
	$intshop = 2;
}

if ($intreturn == 0) {
	if (empty($sqlname) || empty($decman) || empty($decjian) || empty($strshop_id) || empty($intclient)) {
		$intreturn = 1;
	}
}

$intstart = 0;
if($intreturn == 0) {
	if(!empty($strstart2)) {
		$int = strtotime($strstart2);
		if($int > 0) {
			$intstart = $int;
		}
	}else{$intreturn = 1;}
}

$intend = 0;
if($intreturn == 0) {
	if(!empty($strend2)) {
		$int = strtotime($strend2);
		if($int > 0) {
			$intend = $int;
		}
	}else{$intreturn = 1;}
}

$intstate = 1;

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act_decrease') . " (act_decrease_atime, act_decrease_name, act_decrease_client, act_decrease_man, act_decrease_jian, act_decrease_start,  act_decrease_end,  act_decrease_state,  act_decrease_memo,  act_decrease_shop) VALUES ("
	.time() . ", '" . $sqlname . "', " . $intclient .", " . $decman .", " . $decjian . ", ". $intstart .",".$intend.",".$intstate. ", '" .$sqlmemo. "',". $intshop .")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}else{
		$id = mysql_insert_id();
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act') . " (act_atime, act_type, act_decrease_id) VALUES (" .time() . ", 2 , " .$id . ")";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

if($intreturn == 0) {
	foreach ($strshop_id as $key => $value) {
		$strsql = "INSERT INTO " . $gdb->fun_table2('act_decrease_shop') . " (act_decrease_id,shop_id) VALUES (" .$id . " , " .$value . ")";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 4;
		}
	}
}
echo $intreturn;
?>