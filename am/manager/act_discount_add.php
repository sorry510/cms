<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['act_module'] != 1) {
	return;
}

$strchannel = 'act';

$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('mcombo_list', get_mcombo_list());
$gtemplate->fun_show('act_discount_add');

function get_mgoods_catalog_list() {
	$arr = array();
	$strsql = " SELECT mgoods_catalog_id, mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . " ORDER BY mgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods_list() {
	$arr = array();
	$strsql = "SELECT mgoods_id, mgoods_catalog_id, mgoods_name, mgoods_price FROM " . $GLOBALS['gdb']->fun_table2('mgoods')
	. "WHERE mgoods_act = 1 AND mgoods_state = 1 ORDER BY mgoods_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mcombo_list() {
	$arr = array();
	$strsql = "SELECT mcombo_id, mcombo_name, mcombo_price FROM " . $GLOBALS['gdb']->fun_table2('mcombo') . " WHERE mcombo_act = 1 AND mcombo_state = 1 ORDER BY mcombo_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>