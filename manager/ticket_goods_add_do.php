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

$strname = api_value_post('txtname');
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
	if (empty($sqlname) || empty($decvalue) || empty($intgoods_id) || empty($intdays) || empty($intbegin)) {
		$intreturn = 1;
	}
}

if ($intdays > 365) {
	$intreturn = 100;
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('ticket_goods') . " (ticket_goods_atime, ticket_goods_name, ticket_goods_value,  mgoods_id,ticket_goods_days,ticket_goods_begin,  ticket_goods_memo) VALUES ("
	.time() . ", '" . $sqlname . "', " . $decvalue . ", ". $intgoods_id . ", ". $intdays.",".$intbegin. ", '" .$sqlmemo
	. "')";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}
echo $intreturn;
?>