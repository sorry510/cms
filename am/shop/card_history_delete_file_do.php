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
$strkey = api_value_post('key');
$intkey = api_value_int0($strkey);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT card_history_id, card_history_photo1, card_history_photo2, card_history_photo3, card_history_photo4, card_history_photo5 FROM "
	. $gdb->fun_table2('card_history') . " WHERE card_history_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	if($intkey < 1 || $intkey > 5) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	if($arr['card_history_photo' . $intkey] != '') {
		unlink($GLOBALS['gconfig']['path']['upload'] . '\\' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['card_history'] . '\\'
		. $arr['card_history_photo' . $intkey]);
		$strsql = "UPDATE " . $gdb->fun_table2('card_history') . " SET card_history_photo" . $intkey . " = '' WHERE card_history_id = " . $intid . " LIMIT 1";
		$gdb->fun_do($strsql);
	}
}

echo $intreturn;
?>