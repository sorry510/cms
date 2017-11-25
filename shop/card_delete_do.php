<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_id = api_value_post('id');
$intcard_id = api_value_int0($strcard_id);
$arr = array();
$intreturn = 0;
$card_ymoney = 0;
$card_reward = 0;
$strsql = "SELECT card_id,s_card_ymoney,s_card_reward FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = " .$intcard_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}else{
	$card_ymoney = $arr['s_card_ymoney'];
	$card_reward = $arr['s_card_reward'];
}
// 有余额
if($card_ymoney != 0 || $card_reward != 0){
	$intreturn = 2;
}
if($intreturn == 0){
	// 有套餐，分2类计时和记次（计时要考虑过期，记次要考虑次数和过期）
	$strsql = "SELECT card_mcombo_id FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo'). " where card_id=".$intcard_id." and	((c_mcombo_type=1 and card_mcombo_gcount!=0) OR c_mcombo_type=2) and 	(card_mcombo_cedate>=".time()." OR card_mcombo_cedate=0)";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		$intreturn = 2;
	}
}
if($intreturn == 0){
	$strsql = "DELETE FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_id = ".$intcard_id." limit 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}
if($intreturn == 0){
	$strsql = "DELETE FROM " . $GLOBALS['gdb']->fun_table2('card_ticket') . " WHERE card_id = ".$intcard_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 4;
	}
}
/*if($intreturn == 0){
	$strsql = "DELETE FROM " . $GLOBALS['gdb']->fun_table2('card_ticket_record') . " WHERE card_id = ".$intcard_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 4;
	}
}*/
if($intreturn == 0){
	$strsql = "DELETE FROM " . $GLOBALS['gdb']->fun_table2('card_mcombo') . " WHERE card_id = ".$intcard_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}
echo $intreturn;
?>