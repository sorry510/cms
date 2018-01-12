<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wshop_module'] != 1) {
	return;
}

$strchannel = 'wshop';

$gtemplate->fun_assign('wgoods', get_wgoods());
$gtemplate->fun_assign('wgoods_catalog', get_wgoods_catalog());
$gtemplate->fun_assign('mgoods', get_mgoods());
$gtemplate->fun_assign('mgoods_catalog', get_mgoods_catalog());
$gtemplate->fun_show('wechat_shop_manage_add');

function get_wgoods_catalog() {
	$arr = array();
	$strsql = "SELECT wgoods_catalog_id,wgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('wgoods_catalog')." order by wgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_wgoods() {
	$arr = array();
	$arrwgoods = array();
	$strsql = "SELECT wgoods_catalog_id,wgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('wgoods_catalog')." order by wgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $k=>$v){
		$strsql = "SELECT wgoods_id, wgoods_name, wgoods_price FROM " . $GLOBALS['gdb']->fun_table2('wgoods')." WHERE wgoods_catalog_id = ".$v['wgoods_catalog_id']." and wgoods_state=1 ORDER BY wgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrwgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$arr[$k]['wgoods'] = $arrwgoods;
	}
	return $arr;
}

function get_mgoods(){
	$arr = array();
	$strsql = ' SELECT mgoods_id, mgoods_name,mgoods_price, mgoods_catalog_id,mgoods_code,mgoods_cprice FROM ' . $GLOBALS['gdb']->fun_table2('mgoods') . 'WHERE mgoods_act = 1 AND mgoods_state = 1 order by mgoods_id ';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods_catalog(){
	$arr = array();
	$strsql = ' SELECT mgoods_catalog_id, mgoods_catalog_name FROM ' . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . ' order by mgoods_catalog_id ';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>