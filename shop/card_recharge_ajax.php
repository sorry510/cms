<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$arr = array();
$strcard_id = api_value_get('card_id');
$intcard_id = api_value_int0($strcard_id);

$strsql = "SELECT card_id,card_code, card_name,card_phone,card_sex,card_birthday_date,card_password_state,card_password,card_identity,card_edate,card_memo,s_card_ymoney,card_type_id,c_card_type_name,c_card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
$arr['card_birthday_date'] = date("Y-m-d",$arr['card_birthday_date']);
$arr['card_edate'] = date("Y-m-d",$arr['card_edate']);
echo json_encode($arr);
