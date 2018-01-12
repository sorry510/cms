<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wshop_module'] != 1) {
	return;
}

$strchannel = 'wshop';

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('goods', get_goods());
$gtemplate->fun_assign('wgoods', get_wgoods());
$gtemplate->fun_assign('wgoods_catalog', get_wgoods_catalog());
$gtemplate->fun_show('wechat_shop_agent_money');

function get_wgoods(){
	$arr = array();
	$strsql = ' SELECT wgoods_id, wgoods_name,wgoods_price, wgoods_catalog_id FROM ' . $GLOBALS['gdb']->fun_table2('wgoods') . ' order by wgoods_id ';
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

function get_goods(){
	$arr = array();
	$strsql = "SELECT wgoods_id,wgoods_reward FROM " . $GLOBALS['gdb']->fun_table2('wgoods');
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	$json = json_encode($arr);
	return $json;
}
?>