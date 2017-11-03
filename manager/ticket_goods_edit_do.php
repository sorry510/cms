<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strname =api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strvalue = api_value_post('txtvalue');
$decvalue = api_value_decimal($strvalue, 2);
$strgoods_id = api_value_post('txtmgoods');
$intgoods_id = api_value_int0($strgoods_id);
$strdays = api_value_post('txtdays');
$intdays = api_value_int0($strdays);
$strbegin = api_value_post('txtbegin');
$intbegin = api_value_int0($strbegin);
$strmemo = api_value_post('txtmemo');
$sqlmemo = $gdb->fun_escape($strmemo);

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($decvalue) || empty($intgoods_id) || empty($intid) || empty($intdays) || empty($intbegin)) {
		$intreturn = 1;
	}
}

if ($intdays > 365) {
	$intreturn = 100;
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('ticket_goods') . " SET  ticket_goods_name = '" . $sqlname . "', ticket_goods_value = "
	. $decvalue . ", mgoods_id = " . $intgoods_id  . ", ticket_goods_days = " . $intdays. ", ticket_goods_begin = " . $intbegin . ",  ticket_goods_memo = '"
	. $sqlmemo . "', ticket_goods_ctime = " . time() . " WHERE ticket_goods_id = " . $intid . " LIMIT 1";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}
echo $intreturn;


?>