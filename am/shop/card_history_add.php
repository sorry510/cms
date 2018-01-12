<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['history_module'] != 1) {
	return;
}

$strchannel = 'card';

$gtemplate->fun_assign('worker_group_list', get_worker_group_list());
$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_show('card_history_add');

function get_worker_group_list() {
	$arr = array();
	$strsql = "SELECT worker_group_id, worker_group_name FROM " . $GLOBALS['gdb']->fun_table2('worker_group') . " ORDER BY worker_group_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_worker_list() {
	$arr = array();
	$strsql = "SELECT worker_id, worker_group_id, worker_name FROM " . $GLOBALS['gdb']->fun_table2('worker')
	. " WHERE shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " AND worker_state = 1 ORDER BY worker_group_id DESC, worker_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>