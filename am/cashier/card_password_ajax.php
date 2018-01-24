<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$arr = array();
$strcard_id = api_value_get('id');
$intcard_id = api_value_int0($strcard_id);
$strcard_password = api_value_get('password');
$sqlcard_password = $gdb->fun_escape($strcard_password);

$intreturn = 0;

//启用状态下检测
$strsql = "SELECT card_password,card_password_state FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." and card_state=1 limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	if($arr['card_password_state'] == 1){
		if($arr['card_password'] != $sqlcard_password){
			$intreturn = 1;
		}
	}
}else{
	$intreturn = 2;
}

echo $intreturn;


