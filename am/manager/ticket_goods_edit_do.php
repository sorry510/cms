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
$strname =api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strvalue = api_value_post('txtvalue');
$decvalue = api_value_decimal($strvalue, 2);
$strmgoods = api_value_post('txtmgoods');
$intmgoods = api_value_int0($strmgoods);
$strdays = api_value_post('txtdays');
$intdays = api_value_int0($strdays);
$strbegin = api_value_post('txtbegin');
$intbegin = api_value_int0($strbegin);
$strmemo = api_value_post('txtmemo');
$sqlmemo = $gdb->fun_escape($strmemo);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT mgoods_id FROM " . $gdb->fun_table2('mgoods') . " WHERE mgoods_id = " . $intmgoods . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	if($intdays <= 0 || $intdays > 365 * 2) {
		$intreturn = 2;
	}
}

if($intreturn == 0) {
	if($intbegin != 1 && $intbegin != 2) {
		$intbegin = 2;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('ticket_goods') . " SET ticket_goods_name = '" . $sqlname . "', ticket_goods_value = " . $decvalue . ", mgoods_id = " . $arr['mgoods_id']
	. ", ticket_goods_days = " . $intdays. ", ticket_goods_begin = " . $intbegin . ",  ticket_goods_memo = '" . $sqlmemo . "', ticket_goods_ctime = " . time()
	. " WHERE ticket_goods_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>