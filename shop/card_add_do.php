<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');


$strcard_name = api_value_post('card_name');
$strcard_sex = api_value_post('card_sex');
$intcard_sex = api_value_int0($strcard_sex);
$strcard_phone = api_value_post('card_phone');
$strcard_birthday = api_value_post('card_birthday');
if($strcard_birthday!=''){
	$intcard_birthday_date = strtotime($strcard_birthday)!=false?strtotime($strcard_birthday):0;
}else{
	$intcard_birthday_date = 0;
}
$arrcard_birthday = explode("-", $strcard_birthday);

if(isset($arrcard_birthday[1])){
	$intcard_birthday_month = api_value_int0($arrcard_birthday[1]);
}else{
	$intcard_birthday_month = 0;
}
if(isset($arrcard_birthday[2])){
	$intcard_birthday_day = api_value_int0($arrcard_birthday[2]);
}else{
	$intcard_birthday_day = 0;
}
$strcard_passsword_state = api_value_post('pwd_state');
$intcard_passsword_state = api_value_int0($strcard_passsword_state);
$strcard_password = api_value_post('card_password');
$strcard_code = api_value_post('card_code');
$strcard_ikey = api_value_post('card_ikey');
$strcard_edate = api_value_post('card_edate');
if($strcard_edate!=''){
	$intcard_edate = strtotime($strcard_edate)!=false?strtotime($strcard_edate):0;;
}else{
	$intcard_edate = 0;
}
$strcard_identity = api_value_post('card_identity');
$strcard_memo = api_value_post('card_memo');
$strcard_carcode = api_value_post('card_carcode');
$strcard_worker_id = api_value_post('worker_id');
$intcard_worker_id = api_value_int0($strcard_worker_id);

$intnow = time();
$card_id = 0;
$intreturn = '';
if($strcard_name=='' || $strcard_phone== ''){
	$intreturn = 'error';
}
if($intreturn == 0){
	$strsql = "INSERT INTO " . $gdb->fun_table2('card') . " (shop_id,card_name, card_sex, card_phone,card_carcode,card_birthday_date, card_birthday_month,card_birthday_day, card_password_state, card_password, card_code, card_ikey, card_atime,card_edate,card_identity,card_memo, worker_id, card_state,card_ltime) VALUES (".$GLOBALS['_SESSION']['login_sid'].",'" . $gdb->fun_escape($strcard_name) . "'," .$intcard_sex. ", '" . $gdb->fun_escape($strcard_phone) . "','".$gdb->fun_escape($strcard_carcode)."'," . $intcard_birthday_date . ", " . $intcard_birthday_month . ", ".$intcard_birthday_day.", ".$intcard_passsword_state.", '".$gdb->fun_escape($strcard_password)."','".$gdb->fun_escape($strcard_code)."','".$gdb->fun_escape($strcard_ikey)."', ".$intnow.",".$intcard_edate.", '".$gdb->fun_escape($strcard_identity)."','".$gdb->fun_escape($strcard_memo)."',".$intcard_worker_id.",1,".$intnow.")";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult) {
		$card_id = mysql_insert_id();
	}
}
if($intreturn != ''){
	echo $intreturn;
}else{
	echo $card_id;
}
?>