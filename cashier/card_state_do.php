<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strtype = api_value_post('type');
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
}else{
	$card_ymoney = $arr['s_card_ymoney'];
}
if($intreturn == 0){
	if($strtype == "normal"){
		$strsql = "UPDATE" . $GLOBALS['gdb']->fun_table2('card') . "SET card_state=1 where card_id = ".$intcard_id." limit 1";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 2;
		}
	}
	if($strtype == "stop"){
		$strsql = "UPDATE" . $GLOBALS['gdb']->fun_table2('card') . "SET card_state=2 where card_id = ".$intcard_id." limit 1";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 2;
		}
	}
	if($strtype == "del"){
		if($card_ymoney!=0){
			$intreturn = 3;
		}
		if($intreturn == 0){
			// 有套餐
			$strsql = "SELECT card_mcombo_id FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo'). "where card_id=".$intcard_id." and card_mcombo_gcount!=0";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
			if(!empty($arr)){
				$intreturn = 3;
			}
			// 有余额
			$strsql = "SELECT card_id FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = " .$intcard_id." and s_card_ymoney!=0";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arr)){
				$intreturn = 3;
			}
		}
		if($intreturn == 0){
			$strsql = "UPDATE" . $GLOBALS['gdb']->fun_table2('card') . "SET card_state=3 where card_id = ".$intcard_id." limit 1";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 4;
			}
		}
	}
	if($strtype == "restore"){
		$strsql = "UPDATE" . $GLOBALS['gdb']->fun_table2('card') . "SET card_state=1 where card_id = ".$intcard_id." limit 1";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 3;
		}
	}
}
/*if($strtype == "del"){
	$strsql = "DELETE FROM" . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_id = ".$intcard_id." limit 1";
}*/

echo $intreturn;
?>