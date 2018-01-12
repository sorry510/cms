<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['history_module'] != 1) {
	return;
}

$strchannel = 'card';
$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('worker_group_list', get_worker_group_list());
$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_assign('card_history', get_card_history());
$gtemplate->fun_show('card_history_edit');

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

function get_card_history() {
	$arr = array();
	$arr2 = array();
	$strsql = "SELECT card_history_id, card_id, worker_id, card_history_question, card_history_result, card_history_plan, card_history_photo1, card_history_photo2, "
	. "card_history_photo3, card_history_photo4, card_history_photo5, card_history_atime, c_card_type_name, c_card_code, c_card_name, c_card_phone, c_card_sex, c_card_age FROM "
	. $GLOBALS['gdb']->fun_table2('card_history') . " WHERE card_history_id = " . $GLOBALS['intid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$arr['mysex'] = '';
		if($arr['c_card_sex'] == 1) {
			$arr['mysex'] = '男';
		} else if($arr['c_card_sex'] == 2) {
			$arr['mysex'] = '女';
		} else if($arr['c_card_sex'] == 3) {
			$arr['mysex'] = '保密';
		}
	}
	return $arr;
}
?>