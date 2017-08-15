<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

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
// 优惠券商品
$strsql = "SELECT ticket_goods_id FROM ".$GLOBALS['gdb']->fun_table2('ticket_goods'). " where mgoods_id=".$intmgoods_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 2;
}
// 库存商品,没有缓存价格有时用到
$strsql = "SELECT store_info_id FROM ".$GLOBALS['gdb']->fun_table2('store_info'). " where mgoods_id=".$intmgoods_id;
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

echo $intreturn;
?>