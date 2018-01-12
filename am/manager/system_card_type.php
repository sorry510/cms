<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';

$gtemplate->fun_assign('card_type_list', get_card_type_list());
$gtemplate->fun_show('system_card_type');

function get_card_type_list() {
	$arr = array();
	$strsql = "SELECT card_type_id, card_type_name, card_type_discount, card_type_memo FROM " . $GLOBALS['gdb']->fun_table2('card_type')
	. " WHERE card_type_id > 10 ORDER BY card_type_id DESC";	//10以内为保留卡分类
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>