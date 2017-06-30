<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strtype = api_value_post('type');
$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$arr = array();
$intreturn = 0;

if($strtype == "normal"){
	$strsql = "UPDATE" . $GLOBALS['gdb']->fun_table2('card') . "SET card_state=1 where card_id = ".$intcard_id." limit 1";
}
if($strtype == "stop"){
	$strsql = "UPDATE" . $GLOBALS['gdb']->fun_table2('card') . "SET card_state=2 where card_id = ".$intcard_id." limit 1";
}
if($strtype == "del"){
	$strsql = "DELETE FROM" . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_id = ".$intcard_id." limit 1";
}

$hresult = $gdb->fun_do($strsql);
if($hresult == FALSE) {
	$intreturn = 1;
}
echo $intreturn;
?>