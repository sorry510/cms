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
$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strstart = api_value_post('start');
$strstart2 = $gdb->fun_escape($strstart);
$strend = api_value_post('end');
$strend2 = $gdb->fun_escape($strend);
$strmemo = api_value_post('memo');
$sqlmemo = $gdb->fun_escape($strmemo);
$arr1 = api_value_post('arr1');
$inttime = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($intid)) {
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
	if($arr['wechat_shop_act_discount_end'] < $inttime){
		$intreturn = 101;
	}else{
		$intreturn = 0;
	}
}

if (empty($arr1) && empty($arr2)) {
	$intreturn = 3;
}

$intstart = 0;
if($intreturn == 0) {
	if(!empty($strstart2)) {
		$int = strtotime($strstart2);
		if($int > 0) {
			$intstart = $int;
		}
	}else{$intreturn = 4;}
}

$intend = 0;
if($intreturn == 0) {
	if(!empty($strend2)) {
		$int = strtotime($strend2);
		if($int > time()) {
			$intend = $int;
		}else{$intreturn = 100;}
	}else{$intreturn = 5;}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('wechat_shop_act_discount') . " SET  wechat_shop_act_discount_name = '" . $sqlname . "', wechat_shop_act_discount_start = "
	. $intstart . ", wechat_shop_act_discount_end = " . $intend . ", wechat_shop_act_discount_memo = '" . $sqlmemo . "', wechat_shop_act_discount_ctime =". $inttime ." WHERE wechat_shop_act_discount_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('wechat_shop_act_discount_goods') . " WHERE wechat_shop_act_discount_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 9;
	}
}

if (!empty($arr1)) {
	if ($intreturn == 0) {
		foreach ($arr1 as $key => $value) {
			$wgoods_catalog_id = api_value_int0($value['wgoods_catalog_id']);
			$wgoods_id = api_value_int0($value['wgoods_id']);
			$discount_goods_price = api_value_decimal($value['price'],2);
			$discount_goods_value = api_value_decimal($value['value'],2);

			$strsql = ' SELECT wgoods_catalog_name FROM ' . $GLOBALS['gdb']->fun_table2('wgoods_catalog') . ' WHERE wgoods_catalog_id = ' . $wgoods_catalog_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			$c_wgoods_catalog_name = $arr['wgoods_catalog_name'];

			$strsql = ' SELECT wgoods_name,wgoods_price FROM ' . $GLOBALS['gdb']->fun_table2('wgoods') . ' WHERE wgoods_id = ' . $wgoods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			$c_wgoods_name = $arr['wgoods_name'];
			$c_wgoods_price = $arr['wgoods_price'];

			$strsql = "INSERT INTO " . $gdb->fun_table2('wechat_shop_act_discount_goods') . " (wechat_shop_act_discount_id,wgoods_catalog_id,wgoods_id,	wechat_shop_act_discount_goods_value,	wechat_shop_act_discount_goods_price, c_wgoods_catalog_name , c_wgoods_name , c_wgoods_price , 	wechat_shop_act_discount_goods_atime) VALUES (" .$intid . " , " .$wgoods_catalog_id ." , ". $wgoods_id. " , " .$discount_goods_value ." , ". $discount_goods_price." , '" . $c_wgoods_catalog_name . "' , '" .$c_wgoods_name ."' , ". $c_wgoods_price . " , " .$inttime .")";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 10;
			}
		}
	}
}

echo $intreturn;

?>