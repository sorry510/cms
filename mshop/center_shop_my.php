<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
// require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('card_info', card_info());
$gtemplate->fun_show('center_shop_my');

function card_info(){
	$arr = array();
	$strsql = "SELECT card_code,card_name,card_phone,card_birthday_date FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$GLOBALS['intid']." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$arr['date'] = $arr['card_birthday_date'] == 0 ? '' : date("Y-m-d",$arr['card_birthday_date']);
	}
	return $arr;
}