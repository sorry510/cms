<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT card_id, s_card_ymoney FROM " . $gdb->fun_table2('card') . " WHERE card_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	} else {
		if($arr['s_card_ymoney'] > 0) {
			$intreturn = 2;
		}
	}
}

if($intreturn == 0) {
	$strsql = "SELECT card_mcombo_id FROM " . $gdb->fun_table2('card_mcombo')
	. " WHERE card_id = " . $intid . " AND card_mcombo_cedate > " . time() . "  AND card_mcombo_gcount > 0 LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$intreturn = 3;
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_id = " . $intid . " LIMIT 1";
	$gdb->fun_do($strsql);
	$strsql = "DELETE FROM " . $GLOBALS['gdb']->fun_table2('card_mcombo') . " WHERE card_id = " . $intid;
	$gdb->fun_do($strsql);
	$strsql = "DELETE FROM " . $GLOBALS['gdb']->fun_table2('card_ticket') . " WHERE card_id = " . $intid;
	$gdb->fun_do($strsql);
}

echo $intreturn;
?>