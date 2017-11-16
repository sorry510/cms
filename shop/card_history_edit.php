<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'card';

$strcard_history_id = api_value_get('id');
$intcard_history_id = api_value_int0($strcard_history_id);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_assign('card_history', get_card_history());
$gtemplate->fun_show('card_history_edit');

function get_worker_list(){
	$arr = array();
	$strsql = "SELECT worker_id,worker_name FROM ".$GLOBALS['gdb']->fun_table2('worker'). " where shop_id =".$GLOBALS['_SESSION']['login_sid']." order by worker_id asc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_card_history(){
	$arr = array();
	$strsql = "SELECT a.*,b.card_photo_file,c.shop_name FROM (SELECT card_history_id,card_id,card_record_id,shop_id,worker_id,card_history_question,card_history_result,card_history_plan,card_history_atime,c_card_type_name,c_card_code,c_card_name,c_card_phone,c_card_sex,c_card_age,c_card_record_code,c_worker_name,card_history_photo1,card_history_photo2,card_history_photo3,card_history_photo4,card_history_photo5 FROM ".$GLOBALS['gdb']->fun_table2('card_history')." WHERE card_history_id=".$GLOBALS['intcard_history_id']." and shop_id=".$GLOBALS['intshop'].") as a LEFT JOIN ".$GLOBALS['gdb']->fun_table2('card')." as b on a.card_id = b.card_id LEFT JOIN ". $GLOBALS['gdb']->fun_table('shop') ." as c on a.shop_id = c.shop_id";;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$arr['atime'] = date('Y-m-d H:i', $arr['card_history_atime']);
		$arr['sex'] = $arr['c_card_sex'] == '1' ? '男' : ($arr['c_card_sex'] == '2' ? '女':'保密');
		$arr['age'] = $arr['c_card_age'] != 0 ? $arr['c_card_age'] : '保密';
	}
	return $arr;
}
?>