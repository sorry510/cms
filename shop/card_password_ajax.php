<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_id = api_value_get('card_id');
$intcard_id = api_value_int0($strcard_id);

$arr = array();
$intreturn = 0;

$strsql = "SELECT card_password_state FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	if($arr['card_password_state'] == 1){
		$intreturn = 1;//启用
	}
}

echo $intreturn;


