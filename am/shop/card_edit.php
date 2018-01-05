<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'card';
$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('card_info', get_card_info());
$gtemplate->fun_show('card_edit');

function get_card_info() {
	$arr = array();
	$strsql = "SELECT card_id, card_ikey, card_code, card_password, card_password_state, card_name, card_photo_file, card_phone, card_identity, card_sex, card_birthday_date, "
	. "card_link, card_memo FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_id = " . $GLOBALS['intid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$arr['mybirthday'] = '';
	if($arr['card_birthday_date'] > 0) {
		$arr['mybirthday'] = date("Y-m-d", $arr['card_birthday_date']);
	}
	return $arr;
}
?>