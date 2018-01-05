<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('mgoods_catalog', get_mgoods_catalog());
$gtemplate->fun_assign('mgoods', get_mgoods());
$gtemplate->fun_assign('mcombo_info', get_mcombo_info());
$gtemplate->fun_show('mcombo2_edit');

function get_mgoods_catalog() {
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id, mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . " ORDER BY mgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods() {
	$arr = array();
	$strsql = "SELECT a.*, b.mcombo_goods_id FROM " . $GLOBALS['gdb']->fun_table2('mgoods')
	. " AS a LEFT JOIN (SELECT mcombo_goods_id, mgoods_id FROM " . $GLOBALS['gdb']->fun_table2('mcombo_goods') . " WHERE mcombo_id = " . $GLOBALS['intid']
	. ") AS b ON a.mgoods_id = b.mgoods_id WHERE a.mgoods_state = 1 ORDER BY a.mgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mcombo_info() {
	$arr = array();
	$strsql = "SELECT mcombo_id, mcombo_code, mcombo_name, mcombo_jianpin, mcombo_price, mcombo_cprice, mcombo_limit_type, mcombo_limit_days, mcombo_act FROM "
	. $GLOBALS['gdb']->fun_table2('mcombo') . " WHERE mcombo_id = " . $GLOBALS['intid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	return $arr;
}
?>