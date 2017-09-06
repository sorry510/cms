<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'workbench';

$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('sgoods_list', get_sgoods_list());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_show('workbench');

function get_mgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_sgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." order by sgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_mgoods_list(){
	$arr = array();
	$arrmgoods = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$v){
		$strsql = "SELECT mgoods_id, mgoods_name, mgoods_price,mgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_catalog_id = ".$v['mgoods_catalog_id']." ORDER BY mgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$v['mgoods'] = $arrmgoods;
	}
	return $arr;
}
function get_sgoods_list(){
	$arr = array();
	$arrsgoods = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." order by sgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$v){
		$strsql = "SELECT sgoods_id, sgoods_name, sgoods_price,sgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('sgoods')." WHERE sgoods_catalog_id = ".$v['sgoods_catalog_id']." and shop_id=".$GLOBALS['_SESSION']['login_sid']." ORDER BY sgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrsgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$v['sgoods'] = $arrsgoods;
	}
	return $arr;
}