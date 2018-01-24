<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'store';

$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_assign('sgoods_list', get_sgoods_list());
$gtemplate->fun_show('store_add');

function get_mgoods_catalog_list() {
	$arr = array();
	$strsql = " SELECT mgoods_catalog_id, mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . " ORDER BY mgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods_list() {
	$arr = array();
	$strsql = "SELECT a.*, b.mgoods_catalog_name FROM (SELECT mgoods_id, mgoods_catalog_id, mgoods_code, mgoods_name, mgoods_jianpin, mgoods_price FROM "
	. $GLOBALS['gdb']->fun_table2('mgoods') . " WHERE mgoods_type = 2) AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')
	. " AS b ON a.mgoods_catalog_id = b.mgoods_catalog_id ORDER BY a.mgoods_catalog_id DESC, a.mgoods_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_sgoods_catalog_list() {
	$arr = array();
	$strsql = " SELECT sgoods_catalog_id, sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog') . " ORDER BY sgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_sgoods_list() {
	$arr = array();
	$strsql = "SELECT a.*, b.sgoods_catalog_name FROM (SELECT sgoods_id, sgoods_catalog_id, sgoods_code, sgoods_name, sgoods_jianpin, sgoods_price FROM "
	. $GLOBALS['gdb']->fun_table2('sgoods') . " WHERE shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " AND sgoods_type = 2) AS a LEFT JOIN "
	. $GLOBALS['gdb']->fun_table2('sgoods_catalog') . " AS b ON a.sgoods_catalog_id = b.sgoods_catalog_id ORDER BY a.sgoods_catalog_id DESC, a.sgoods_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>