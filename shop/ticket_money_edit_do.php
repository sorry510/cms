<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strname =api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strvalue = api_value_post('value');
$decvalue = api_value_decimal($strvalue, 2);
$strlimit = api_value_post('limit');
$declimit = api_value_decimal($strlimit, 2);
$strdays = api_value_post('days');
$intdays = api_value_int0($strdays);
$strbegin = api_value_post('begin');
$intbegin = api_value_int0($strbegin);
$strmemo = api_value_post('memo');
$sqlmemo = $gdb->fun_escape($strmemo);

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($decvalue) || empty($intbegin) || empty($declimit) || empty($intid) || empty($intdays)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('ticket_money') . " SET  ticket_money_name = '" . $sqlname . "', ticket_money_value = "
	. $decvalue . ", ticket_money_limit = " . $declimit . ",  ticket_money_days = "
	. $intdays. ",  ticket_money_begin = "
	. $intbegin. ",  ticket_money_memo = '"
	. $sqlmemo . "', ticket_money_ctime = " . time() . " WHERE ticket_money_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}
echo $intreturn;



?>