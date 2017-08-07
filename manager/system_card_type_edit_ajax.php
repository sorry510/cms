<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_type_id = api_value_get('card_type_id');
$intcard_type_id = api_value_int0($strcard_type_id);

$intreturn = 0;
if($intreturn == 0) {
	$arr = array();
	$strsql = "SELECT card_type_id, card_type_name, card_type_discount , card_type_info  FROM ". $GLOBALS['gdb']->fun_table2('card_type')." WHERE card_type_id = ". $intcard_type_id ." LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	
	echo json_encode($arr);
}


?>