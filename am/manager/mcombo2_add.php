<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';

$gtemplate->fun_assign('mgoods_catalog', get_mgoods_catalog());
$gtemplate->fun_assign('mgoods', get_mgoods());
$gtemplate->fun_show('mcombo2_add');

function get_mgoods_catalog() {
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id, mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . " ORDER BY mgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods() {
	$arr = array();
	$strsql = "SELECT mgoods_id, mgoods_catalog_id, mgoods_name, mgoods_price FROM " . $GLOBALS['gdb']->fun_table2('mgoods')
	. " WHERE mgoods_state = 1 ORDER BY mgoods_catalog_id DESC, mgoods_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>