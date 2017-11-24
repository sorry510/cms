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

$gtemplate->fun_assign('wgoods', get_wgoods());
$gtemplate->fun_assign('wgoods_catalog', get_wgoods_catalog());
$gtemplate->fun_show('wechat_shop_act_discount_add');

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

?>