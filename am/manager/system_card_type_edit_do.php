<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strdiscount = api_value_post('txtdiscount');
$decdiscount = api_value_decimal($strdiscount, 1);
$strmemo = api_value_post('txtmemo');
$sqlmemo = $gdb->fun_escape($strmemo);

$intreturn = 0;
if($intreturn == 0) {
	if($decdiscount < 0.1 || $decdiscount > 10) {
		$decdiscount = 10;
	}
}

$inttime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('card_type') . " SET card_type_name = '". $sqlname . "' , card_type_discount = " . $decdiscount . ", card_type_memo = '" . $sqlmemo
	. "',card_type_ctime = " . $inttime . " WHERE card_type_id = " . $intid . " AND card_type_id > 10 LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>