<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

if(laimi_config_trade()['act_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$time = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($intid)){
		$intreturn = 1;
	}
}

if ($intreturn == 0) {
	$strsql = "SELECT wechat_shop_act_discount_start,wechat_shop_act_discount_end FROM " . $gdb->fun_table2('wechat_shop_act_discount') . " WHERE wechat_shop_act_discount_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
	if ($arr['wechat_shop_act_discount_start'] < $time && $arr['wechat_shop_act_discount_end'] > $time) {
		$intreturn = 100;
	}else if($arr['wechat_shop_act_discount_end'] < $time){
		$intreturn = 101;
	}else{
		$intreturn = 0;
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('wechat_shop_act_discount') . " WHERE wechat_shop_act_discount_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

if ($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('wechat_shop_act_discount_goods') . " WHERE wechat_shop_act_discount_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}

echo $intreturn;

?>