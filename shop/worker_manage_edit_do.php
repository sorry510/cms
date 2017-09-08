<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strworker_id = api_value_post('worker_id');
$intworker_id = api_value_int0($strworker_id);
$strworker_group_id = api_value_post('worker_group_id');
$intworker_group_id = api_value_int0($strworker_group_id);
$strworker_name = api_value_post('worker_name');
$sqlworker_name = $gdb->fun_escape($strworker_name);
$strworker_code = api_value_post('worker_code');
$sqlworker_code = $gdb->fun_escape($strworker_code);
$strworker_code_old = api_value_post('worker_code_old');
$sqlworker_code_old = $gdb->fun_escape($strworker_code_old);
$strworker_sex = api_value_post('worker_sex');
$intworker_sex = api_value_int0($strworker_sex);
$strworker_birthday_date = api_value_post('worker_birthday_date');
$intworker_birthday_date = strtotime($strworker_birthday_date)==false?'0':strtotime($strworker_birthday_date);

$arrworker_birthday_date = explode("-", $strworker_birthday_date);

if(isset($arrworker_birthday_date[1])){
	$intworker_birthday_date_month = api_value_int0($arrworker_birthday_date[1]);
}else{
	$intworker_birthday_date_month = 0;
}
if(isset($arrworker_birthday_date[2])){
	$intworker_birthday_date_day = api_value_int0($arrworker_birthday_date[2]);
}else{
	$intworker_birthday_date_day = 0;
}

$strworker_phone = api_value_post('worker_phone');
$sqlworker_phone = $gdb->fun_escape($strworker_phone);
$strworker_identity = api_value_post('worker_identity');
$sqlworker_identity = $gdb->fun_escape($strworker_identity);
$strworker_education = api_value_post('worker_education');
$intworker_education = api_value_int0($strworker_education);
$strworker_join = api_value_post('worker_join');
$intworker_join = strtotime($strworker_join)==false?'0':strtotime($strworker_join);
$strworker_address = api_value_post('worker_address');
$sqlworker_address = $gdb->fun_escape($strworker_address);
$strworker_wage = api_value_post('worker_wage');
$decworker_wage = api_value_decimal($strworker_wage, 2);
$strworker_reserve = api_value_post('worker_reserve');
$intworker_reserve = api_value_int0($strworker_reserve);
$strworker_guide = api_value_post('worker_guide');
$intworker_guide = api_value_int0($strworker_guide);
$intshop_id = $GLOBALS['_SESSION']['login_sid'];


$arr = array();
$intreturn = 0;
$intnow = time();

//姓名手机必填
if(empty($sqlworker_name) || empty($sqlworker_phone)){
	$intreturn = 5;
}
// 员工编码唯一
if(!empty($sqlworker_code) && $sqlworker_code != $sqlworker_code_old){
	$strsql = "SELECT worker_id FROM ".$gdb->fun_table2('worker')." WHERE worker_code='".$sqlworker_code."' and shop_id=".$GLOBALS['_SESSION']['login_sid'];
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$intreturn = 4;
	}
}
if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table2('worker')." SET shop_id=".$intshop_id.",worker_group_id=".$intworker_group_id.",worker_name='".$sqlworker_name."',worker_code='".$sqlworker_code."',worker_sex=".$intworker_sex.",worker_birthday_date=".$intworker_birthday_date.",worker_birthday_day=".$intworker_birthday_date_day.",worker_birthday_month=".$intworker_birthday_date_month.",worker_phone='".$sqlworker_phone."',worker_identity='".$sqlworker_identity."',worker_education=".$intworker_education.",worker_join=".$intworker_join.",worker_address='".$sqlworker_address."',worker_wage=".$decworker_wage.",worker_config_reserve=".$intworker_reserve.",worker_config_guide=".$intworker_guide." where worker_id=".$intworker_id;
	// echo $strsql;exit;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>