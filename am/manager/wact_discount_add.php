<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'wechat';

$gtemplate->fun_assign('wgoods', get_wgoods());
$gtemplate->fun_assign('wgoods_catalog', get_wgoods_catalog());
$gtemplate->fun_show('wact_discount_add');

function get_wgoods(){
	$arr = array();
	$strsql = ' SELECT wgoods_id, wgoods_name,wgoods_price, wgoods_catalog_id FROM ' . $GLOBALS['gdb']->fun_table2('wgoods') . 'WHERE wgoods_state = 1 order by wgoods_id ';
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