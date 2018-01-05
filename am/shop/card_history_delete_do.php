<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['history_module'] != 1) {
	return 1;
}

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT card_history_id FROM " . $GLOBALS['gdb']->fun_table2('card_history')
	. " WHERE card_history_id = " . $intid . " AND shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $GLOBALS['gdb']->fun_table2('card_history') . " WHERE card_history_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}
echo $intreturn;
?>