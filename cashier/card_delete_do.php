<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$arr = array();
$intreturn = 0;
$card_ymoney = 0;
$strsql = "SELECT card_id,s_card_ymoney FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = " .$intcard_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}
if($intreturn == 0){
	$strsql = "DELETE FROM" . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_id = ".$intcard_id." limit 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}
if($intreturn == 0){
	$strsql = "DELETE FROM" . $GLOBALS['gdb']->fun_table2('card_ticket') . " WHERE card_id = ".$intcard_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}
if($intreturn == 0){
	$strsql = "DELETE FROM" . $GLOBALS['gdb']->fun_table2('card_ticket_record') . " WHERE card_id = ".$intcard_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 4;
	}
}
if($intreturn == 0){
	$strsql = "DELETE FROM" . $GLOBALS['gdb']->fun_table2('card_mcombo') . " WHERE card_id = ".$intcard_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}
echo $intreturn;
?>