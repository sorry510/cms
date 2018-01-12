<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strworder_id = api_value_post('worder_id');
$intworder_id = api_value_int0($strworder_id);

$intreturn = 0;
$ctime = time();

if(empty($intworder_id)){
	$intreturn = 1;
}

if ($intreturn == 0) {
	$strsql = "SELECT worder_state FROM ". $gdb->fun_table2('worder') ." WHERE worder_id = ".$intworder_id ." LIMIT 1";
	//echo $strsql;exit();
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
	if ($arr['worder_state'] != 1) {
		$intreturn = 3;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('worder') . " SET worder_ctime = ".$ctime.", worder_state = 4,s_worder_reward = 0 WHERE worder_id = " . $intworder_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 4;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('worder_goods') . " SET worder_goods_state = 4 , 	c_wgoods_reward = 0,worder_goods_ctime = ".$ctime." WHERE worder_id = " . $intworder_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}

if($intreturn == 0) {

	$strsql = "SELECT s_worder_reward,card_parent_id FROM ". $gdb->fun_table2('worder') ." WHERE worder_id = ".$intworder_id ." LIMIT 1";
	//echo $strsql;exit();
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}

if($intreturn == 0) {
	if (!empty($arr)) {
		$strsql = "SELECT card_fenxiao FROM ". $gdb->fun_table2('card') ." WHERE card_id = ".$arr['card_parent_id'] ." LIMIT 1";
		//echo $strsql;exit();
		$hresult = $gdb->fun_query($strsql);
		$arr2 = $gdb->fun_fetch_assoc($hresult);
		if($arr2['card_fenxiao'] == 1){
			$strsql = "UPDATE " . $gdb->fun_table2('card') . " SET s_card_reward = s_card_reward - ".$arr['s_worder_reward']." WHERE card_id = " . $arr['card_parent_id'];
			//echo $strsql;exit();
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 7;
			}
		}
	}
}

echo $intreturn;
?>