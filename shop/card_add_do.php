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
	$intcard_birthday = strtotime($strcard_birthday);
}else{
	$intcard_birthday = 0;
}
$arrcard_birthday = explode("-", $strcard_birthday);
if(isset($arrcard_birthday[1])&&isset($arrcard_birthday[2])){
	$intcard_birthday2 = mktime(0, 0, 0, $arrcard_birthday[1], $arrcard_birthday[2]); 
}else{
	$intcard_birthday2 = 0;
}
$strcard_passsword_state = api_value_post('pwd_state');
$intcard_passsword_state = api_value_int0($strcard_passsword_state);
$strcard_password = api_value_post('card_password');
// $card_photo_file = api_value_post('card_photo_file');
$strcard_code = api_value_post('card_code');
$strcard_ikey = api_value_post('card_ikey');
$strcard_edate = api_value_post('card_edate');
if($strcard_edate!=''){
	$intcard_edate = strtotime($strcard_edate);
}else{
	$intcard_edate = 0;
}
$strcard_identity = api_value_post('card_identity');
$strcard_memo = api_value_post('card_memo');


$intreturn = 0;


if($strcard_name=='' || $strcard_phone== ''){
	$intreturn = 1;
}
if($intreturn == 0){
	$strsql = "INSERT INTO " . $gdb->fun_table2('card') . " (shop_id,card_name, card_sex, card_phone, card_birthday, card_birthday2, card_password_state, card_password, card_code, card_ikey, card_atime,card_edate,card_identity,card_memo,card_state) VALUES (".$GLOBALS['_SESSION']['login_sid'].",'" . $gdb->fun_escape($strcard_name) . "'," .$intcard_sex. ", '" . $gdb->fun_escape($strcard_phone) . "', " . $intcard_birthday . ", " . $intcard_birthday2 . ", ".$intcard_passsword_state.", '".$gdb->fun_escape($strcard_password)."','".$gdb->fun_escape($strcard_code)."','".$gdb->fun_escape($strcard_ikey)."', ".strtotime('now').",".$intcard_edate.", '".$gdb->fun_escape($strcard_identity)."','".$gdb->fun_escape($strcard_memo)."',1)";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}
echo $intreturn;
?>