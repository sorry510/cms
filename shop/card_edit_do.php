<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');


$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$strcard_code = api_value_post('card_code');
$strcard_name = api_value_post('card_name');
$strcard_phone = api_value_post('card_phone');
$strcard_sex = api_value_post('card_sex');
$intcard_sex = api_value_int0($strcard_sex);
$strcard_birthday = api_value_post('card_birthday_date');
$strcard_passsword_state = api_value_post('pwd_state');
$intcard_passsword_state = api_value_int0($strcard_passsword_state);
$strcard_password = api_value_post('card_password');
// $card_photo_file = api_value_post('card_photo_file');
$strcard_code = api_value_post('card_code');
$strcard_ikey = api_value_post('card_ikey');
$strcard_edate = api_value_post('card_edate');
$strcard_identity = api_value_post('card_identity');
$strcard_memo = api_value_post('card_memo');
$strcard_carcode= api_value_post('card_carcode');


$intreturn = 0;

if($strcard_name=='' || $strcard_phone== ''){
	$intreturn = 1;
}

$intcard_birthday_date = strtotime($strcard_birthday)==false?0:strtotime($strcard_birthday);
// var_dump($intcard_birthday_date)
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

$intcard_edate = 0;
if($intreturn == 0) {
	if(!empty($strcard_edate)) {
		$int = strtotime($strcard_edate);
		if($int > 0) {
			$intcard_edate = $int;
		}
	}
}
if($intreturn == 0) {
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET card_code='".$gdb->fun_escape($strcard_code)."', card_name = '".$gdb->fun_escape($strcard_name)."',card_phone='".$gdb->fun_escape($strcard_phone)."',card_sex=".$intcard_sex.",card_birthday_date=".$intcard_birthday_date.",card_birthday_month=".$intcard_birthday_month.",card_birthday_day=".$intcard_birthday_day.",card_password_state=".$intcard_passsword_state.",card_password='".$gdb->fun_escape($strcard_password)."',card_ikey='".$gdb->fun_escape($strcard_ikey)."',card_identity='".$gdb->fun_escape($strcard_identity)."',card_memo='".$gdb->fun_escape($strcard_memo)."',card_edate=".$intcard_edate.",card_ctime=".time().",card_carcode='".$strcard_carcode."' where card_id=".$intcard_id." limit 1";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;
?>