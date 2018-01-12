<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['worker_module'] != 1) {
	return;
}

$strchannel = 'worker';

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('group_reward_info', get_group_reward_info());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('mcombo_list', get_mcombo_list());
$gtemplate->fun_show('group_reward_edit');

function get_group_reward_info() {
	$arr = array();
	$strsql = "SELECT group_reward_id, group_reward_create, group_reward_fill, group_reward_pfill, group_reward_guide, group_reward_pguide FROM "
	. $GLOBALS['gdb']->fun_table2('group_reward') . " WHERE worker_group_id = " . $GLOBALS['intid'] . " AND shop_id = 0 LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)){
		$arr['group_reward_id'] = 0;
		$arr['group_reward_create'] = 0;
		$arr['group_reward_fill'] = 0;
		$arr['group_reward_pfill'] = 0;
		$arr['group_reward_guide'] = 0;
		$arr['group_reward_pguide'] = 0;
	}
	return $arr;
}

function get_mgoods_catalog_list() {
	$arr = array();
	$strsql = " SELECT mgoods_catalog_id, mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . " ORDER BY mgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods_list() {
	$arr = array();
	$strsql = "SELECT a.*, b.*, a.mgoods_id AS goods_id FROM (SELECT mgoods_id, mgoods_catalog_id, mgoods_name, mgoods_price FROM " . $GLOBALS['gdb']->fun_table2('mgoods')
	. " WHERE mgoods_state = 1) AS a "
	. "LEFT JOIN (SELECT group_reward2_id, mgoods_id, group_reward2_money, group_reward2_percent FROM " . $GLOBALS['gdb']->fun_table2('group_reward2')
	. " WHERE worker_group_id = " . $GLOBALS['intid'] . " AND shop_id = 0 AND mgoods_id > 0) AS b ON a.mgoods_id = b.mgoods_id ORDER BY a.mgoods_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mcombo_list() {
	$arr = array();
	$strsql = "SELECT a.*, b.*, a.mcombo_id AS combo_id FROM (SELECT mcombo_id, mcombo_name, mcombo_price FROM " . $GLOBALS['gdb']->fun_table2('mcombo')
	. " WHERE mcombo_state = 1) AS a "
	. " LEFT JOIN (SELECT group_reward2_id, mcombo_id, group_reward2_money, group_reward2_percent FROM " . $GLOBALS['gdb']->fun_table2('group_reward2')
	. " WHERE worker_group_id = " . $GLOBALS['intid'] . " AND shop_id = 0 AND mcombo_id > 0) AS b ON a.mcombo_id = b.mcombo_id ORDER BY a.mcombo_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>