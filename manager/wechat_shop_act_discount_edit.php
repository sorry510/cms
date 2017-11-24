<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

if(laimi_config_trade()['act_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strchannel = 'marketing';

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('edit', get_edit());
$gtemplate->fun_assign('goods', get_goods());
$gtemplate->fun_assign('wgoods', get_wgoods());
$gtemplate->fun_assign('wgoods_catalog', get_wgoods_catalog());
$gtemplate->fun_show('wechat_shop_act_discount_edit');

function get_wgoods(){
	$arr = array();
	$strsql = ' SELECT wgoods_id, wgoods_name,wgoods_price, wgoods_catalog_id FROM ' . $GLOBALS['gdb']->fun_table2('wgoods') . 'WHERE wgoods_act = 1 AND wgoods_state = 1 order by wgoods_id ';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_wgoods_catalog(){
	$arr = array();
	$strsql = ' SELECT wgoods_catalog_id, wgoods_catalog_name FROM ' . $GLOBALS['gdb']->fun_table2('wgoods_catalog') . ' order by wgoods_catalog_id ';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_edit(){
	$arr = array();
	$strsql = "SELECT wechat_shop_act_discount_id, wechat_shop_act_discount_name, wechat_shop_act_discount_client, wechat_shop_act_discount_start, wechat_shop_act_discount_end, wechat_shop_act_discount_memo FROM" . $GLOBALS['gdb']->fun_table2('wechat_shop_act_discount') . " WHERE wechat_shop_act_discount_id = ".$GLOBALS['intid'];

		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

		$arr['wechat_shop_act_discount_start'] = date('Y-m-d',$arr['wechat_shop_act_discount_start'] );
		$arr['wechat_shop_act_discount_end'] = date('Y-m-d',$arr['wechat_shop_act_discount_end'] );

	return $arr;
}

function get_goods(){
	$arr = array();
	$strsql = "SELECT wgoods_id,wechat_shop_act_discount_goods_value,wechat_shop_act_discount_goods_price FROM " . $GLOBALS['gdb']->fun_table2('wechat_shop_act_discount_goods') . " WHERE wechat_shop_act_discount_id = " . $GLOBALS['intid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	$json = json_encode($arr);
	return $json;
}

?>