<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'card';
$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('card_info', get_card_info());
$gtemplate->fun_assign('card_type_list', get_card_type_list());
$gtemplate->fun_show('card_edit');

function get_card_info() {
	$arr = array();
	$strsql = "SELECT card_id, card_type_id, card_ikey, card_code, card_password, card_password_state, card_name, card_photo_file, card_phone, card_identity, card_sex, card_birthday_date, "
	. "card_link, card_memo, card_edate, c_card_type_name, c_card_type_discount, s_card_smoney, s_card_ymoney, s_card_yscore  FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_id = " . $GLOBALS['intid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$arr['mybirthday'] = '';
	if($arr['card_birthday_date'] > 0) {
		$arr['mybirthday'] = date("Y-m-d", $arr['card_birthday_date']);
	}
	$arr['myedate'] = '';
	if($arr['card_edate'] > 0) {
		$arr['myedate'] = date("Y-m-d", $arr['card_edate']);
	}
	$strsql = "SELECT card_mcombo_id, c_mgoods_name,c_mcombo_type,card_mcombo_gcount,card_mcombo_cedate,c_mgoods_price FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_id=".$GLOBALS['intid']." and card_mcombo_type=2 and (card_mcombo_cedate>".time()." or card_mcombo_cedate=0) and ((c_mcombo_type=1 and card_mcombo_gcount!=0) or c_mcombo_type=2)";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrmcombo = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrmcombo as &$row){
		$row['edate'] = $row['card_mcombo_cedate'] == 0 ? '' : date("Y-m-d", $row['card_mcombo_cedate']);
	}
	unset($row);
	$arr['mcombo'] = $arrmcombo;
	return $arr;
}

function get_card_type_list() {
	$arr = array();
	$strsql = "SELECT card_type_id, card_type_name, card_type_discount, card_type_memo FROM " . $GLOBALS['gdb']->fun_table2('card_type')
	. " WHERE card_type_id > 10 ORDER BY card_type_id DESC";	//10以内为保留卡分类
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>