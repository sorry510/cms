<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'card';

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('card', get_card());
$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_show('card_edit');

function get_card(){
	$arr = array();
	$strsql = "SELECT card_id,card_ikey,card_code,card_state,card_name,card_photo_file,card_phone,card_carcode,card_sex,card_birthday_date,card_password_state,card_password,card_identity,card_atime,card_edate,card_memo,s_card_ymoney,s_card_yscore,s_card_smoney,s_card_sscore,c_card_type_name,c_card_type_discount,worker_id,card_link FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$GLOBALS['intid']." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$arr['sex'] = $arr['card_sex'] == '3' ? '保密' : ($arr['card_sex'] == '1' ? '男':'女');
	$arr['birthday'] = $arr['card_birthday_date'] == 0 ? '' : date("Y-m-d",$arr['card_birthday_date']);
	// $arr['atime'] = date("Y-m-d H:i",$arr['card_atime']);
	// $arr['discount'] = $arr['c_card_type_discount'] == 0 ? 10 : $arr['c_card_type_discount'];
	$arr['edate'] = $arr['card_edate'] == 0 ? '' : date("Y-m-d",$arr['card_edate']);
	// $arr['state'] = $arr['card_state'] == '1' ? '正常' : '停用';
	return $arr;
}
function get_worker_list(){
	$arr = array();
	$strsql = "SELECT worker_id,worker_name FROM ".$GLOBALS['gdb']->fun_table2('worker'). " where shop_id =".$GLOBALS['_SESSION']['login_sid']." order by worker_name asc";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>