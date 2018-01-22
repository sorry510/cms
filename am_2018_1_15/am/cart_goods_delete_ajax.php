<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
// require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$intcard_id = api_value_int0($GLOBALS['_SESSION']['login_id']);
$intreturn = 0;

$arr = array();
$strsql = "SELECT wcart_id FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE wcart_id=".$intid." and card_id = ".$intcard_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "DELETE FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE wcart_id=".$intid." and card_id = ".$intcard_id;
	$hresult = $GLOBALS['gdb']->fun_do($strsql);
	if(!$hresult){
		$intreturn = 2;
	}
}

echo $intreturn;
