<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;

//套餐商品
$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT mcombo_goods_id FROM " . $GLOBALS['gdb']->fun_table2('mcombo_goods') . " WHERE mgoods_id = ". $intid . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$intreturn = 2;
	}
}

//体验券商品
if($intreturn == 0) {
	$strsql = "SELECT ticket_goods_id FROM " . $GLOBALS['gdb']->fun_table2('ticket_goods') . " WHERE mgoods_id = " . $intid . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$intreturn = 3;
	}
}

//会员卡体验券涉及商品
$inttime = time();
if($intreturn == 0) {
	$strsql = "SELECT card_ticket_id FROM " . $GLOBALS['gdb']->fun_table2('card_ticket') . " WHERE c_mgoods_id = " . $intid . " AND card_ticket_edate > " . $inttime . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$intreturn = 4;
	}
}

//满送活动涉及商品
if($intreturn == 0) {
	$strsql = "SELECT act_give_id FROM " . $GLOBALS['gdb']->fun_table2('act_give') . " WHERE c_mgoods_id = " . $intid . " AND act_give_end > " . $inttime . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$intreturn = 5;
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('mgoods') . " WHERE mgoods_id = " . $intid . " LIMIT 1";
	$gdb->fun_do($strsql);
	
	$strsql = "DELETE FROM " . $gdb->fun_table2('store_info') . " WHERE mgoods_id = " . $intid;
	$gdb->fun_do($strsql);
	
	$strsql = "DELETE FROM " . $gdb->fun_table2('group_reward2') . " WHERE mgoods_id = " . $intid;
	$gdb->fun_do($strsql);
	
	$strsql = "DELETE FROM " . $gdb->fun_table2('act_discount_goods') . " WHERE mgoods_id = " . $intid;
	$gdb->fun_do($strsql);
}

echo $intreturn;
?>