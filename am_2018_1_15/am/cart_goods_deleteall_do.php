<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
// require('inc_limit.php');

$intcard_id = api_value_int0($GLOBALS['_SESSION']['login_id']);
$intreturn = 0;

$arr = array();

if($intreturn == 0){
	$strsql = "DELETE FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE card_id = ".$intcard_id;
	$hresult = $GLOBALS['gdb']->fun_do($strsql);
	if(!$hresult){
		$intreturn = 1;
	}
}

echo $intreturn;
