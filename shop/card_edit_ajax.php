<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_id = api_value_get('id');
$intcard_id = api_value_int0($strcard_id);

$arr = array();
$arrmcombo = array();
$arrticket = array();
$strsql = "SELECT a.*,b.worker_name FROM (SELECT card_id,card_ikey,card_code,card_state,card_name,card_photo_file,card_phone,card_carcode,card_sex,card_birthday_date,card_password_state,card_password,card_identity,card_atime,card_edate,card_memo,s_card_ymoney,s_card_yscore,s_card_smoney,s_card_sscore,c_card_type_name,c_card_type_discount,worker_id,card_link FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1) as a LEFT JOIN ". $GLOBALS['gdb']->fun_table2('worker') ." as b on a.worker_id = b.worker_id";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
$arr['sex'] = $arr['card_sex'] == '3' ? '保密' : ($arr['card_sex'] == '1' ? '男':'女');
$arr['birthday'] = $arr['card_birthday_date'] == 0 ? '--' : date("Y-m-d",$arr['card_birthday_date']);
$arr['atime'] = date("Y-m-d H:i",$arr['card_atime']);
$arr['discount'] = $arr['c_card_type_discount'] == 0 ? 10 : $arr['c_card_type_discount'];
$arr['edate'] = $arr['card_edate'] == 0 ? '--' : date("Y-m-d",$arr['card_edate']);
$arr['state'] = $arr['card_state'] == '1' ? '正常' : '停用';
// $arr['photo'] = $arr['card_photo_file'] != '' ? $arr['card_photo_file'] : 'no.jpg';//默认图片名称

$strsql = "SELECT c_mgoods_name,c_mcombo_type,card_mcombo_gcount,card_mcombo_cedate,c_mgoods_price FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_id=".$arr['card_id']." and card_mcombo_type=2 and (card_mcombo_cedate>".time()." or card_mcombo_cedate=0)";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arrmcombo = $GLOBALS['gdb']->fun_fetch_all($hresult);
foreach($arrmcombo as &$row){
	$row['edate'] = date("Y-m-d", $row['card_mcombo_cedate']);
}
unset($row);
$arr['mcombo'] = $arrmcombo;

$strsql = "SELECT ticket_type,c_ticket_name,c_ticket_value,card_ticket_edate FROM ".$GLOBALS['gdb']->fun_table2('card_ticket')." where card_id=".$arr['card_id']." and card_ticket_state=1 and card_ticket_edate>".time();
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arrticket = $GLOBALS['gdb']->fun_fetch_all($hresult);
foreach($arrticket as &$row){
	$row['typename'] = $row['ticket_type'] == 1 ? '代金券' : ($row['ticket_type'] == 2 ? '体验券' : '其它');
	$row['edate'] = date("Y-m-d", $row['card_ticket_edate']);
}
unset($row);
$arr['ticket'] = $arrticket;

echo json_encode($arr);
