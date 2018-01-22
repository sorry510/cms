<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$intreturn = 0;
$intmoney = 0;
$arr = array();
$arr_json = array(
	'msg' => 0,
	'money' => 0
	);

if($GLOBALS['_SESSION']['login_type'] != 11) {
	$intreturn = 1;
	$arr_json['msg'] = 1;
}

if($intreturn == 0) {
	$strsql = "SELECT card_id, card_phone FROM " . $gdb->fun_table2('card') . " WHERE card_id = "
	. api_value_int0($GLOBALS['_SESSION']['login_id']) . " LIMIT 1 ";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 2;
		$arr_json['msg'] = 2;
	}else{
		if($arr['card_phone'] == '') {
			$intreturn = 3;
			$arr_json['msg'] = 3;
		}
	}
}

if($intreturn == 0) {
	$arr_json['msg'] = 200;
	$arr_json['money'] = laimi_wgoods_allprice();
}

echo json_encode($arr_json);
?>