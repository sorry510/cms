<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strmgoods_id = api_value_post('mgoods_id');
$intmgoods_id = api_value_int0($strmgoods_id);

$intreturn = 0;
//套餐商品
$strsql = "SELECT mcombo_goods_id FROM ".$GLOBALS['gdb']->fun_table2('mcombo_goods'). "where mgoods_id=".$intmgoods_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 1;
}
//优惠券商品
$strsql = "SELECT ticket_goods_id FROM ".$GLOBALS['gdb']->fun_table2('ticket_goods'). " where mgoods_id=".$intmgoods_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 2;
}
//库存商品,如果有对应店铺的商品数量不为零
$strsql = "SELECT store_info_id,store_info_count FROM ".$GLOBALS['gdb']->fun_table2('store_info'). " where mgoods_id=".$intmgoods_id." and store_info_count!=0";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 3;
}
//卡的优惠券
$strsql = "SELECT card_ticket_id FROM ".$GLOBALS['gdb']->fun_table2('card_ticket'). " where c_mgoods_id=".$intmgoods_id." and card_ticket_edate>".time();
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 4;
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('mgoods') . " WHERE mgoods_id = " . $intmgoods_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}
// 删除库存,对应各个店铺的mgoods
if($intreturn == 0){
	$strsql = "DELETE FROM " . $gdb->fun_table2('store_info') . " WHERE mgoods_id = " . $intmgoods_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}

echo $intreturn;
?>