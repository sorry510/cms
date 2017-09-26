<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$strcard_name = api_value_post('card_name');
$sqlcard_name = $gdb->fun_escape($strcard_name);
$strcard_sex = api_value_post('card_sex');
$intcard_sex = api_value_int0($strcard_sex);
$strcard_phone = api_value_post('card_phone');
$sqlcard_phone = $gdb->fun_escape($strcard_phone);
$strcard_birthday = api_value_post('card_birthday');
$intcard_birthday_date = strtotime($strcard_birthday)?strtotime($strcard_birthday):0;
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
$sqlcard_password = $gdb->fun_escape($strcard_password);
$strcard_code = api_value_post('card_code');
$sqlcard_code = $gdb->fun_escape($strcard_code);
$strcard_ikey = api_value_post('card_ikey');
$sqlcard_ikey = $gdb->fun_escape($strcard_ikey);
$strcard_edate = api_value_post('card_edate');
$intcard_edate = strtotime($strcard_edate)?strtotime($strcard_edate):0;;

$strcard_identity = api_value_post('card_identity');
$sqlcard_identity = $gdb->fun_escape($strcard_identity);
$strcard_memo = api_value_post('card_memo');
$sqlcard_memo = $gdb->fun_escape($strcard_memo);
$strcard_carcode = api_value_post('card_carcode');
$sqlcard_carcode = $gdb->fun_escape($strcard_carcode);

$intnow = time();
$intreturn = 0;

if($strcard_name == '' || $strcard_phone == ''){
	$intreturn = 1;
}
if($intreturn == 0) {
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET card_code='".$sqlcard_code."', card_name = '".$sqlcard_name."',card_phone='".$sqlcard_phone."',card_sex=".$intcard_sex.",card_birthday_date=".$intcard_birthday_date.",card_birthday_month=".$intcard_birthday_month.",card_birthday_day=".$intcard_birthday_day.",card_password_state=".$intcard_passsword_state.",card_password='".$sqlcard_password."',card_ikey='".$sqlcard_ikey."',card_identity='".$sqlcard_identity."',card_memo='".$sqlcard_memo."',card_edate=".$intcard_edate.",card_ctime=".$intnow.",card_carcode='".$sqlcard_carcode."' where card_id=".$intcard_id." limit 1";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}
if($intreturn == 0){
	$strphoto_name = $GLOBALS['_SESSION']['login_sid'].'-'.$intcard_id;
	$strext = strtolower(strrchr($_FILES['card_photo']['name'], '.'));
	$intlength = $_FILES['card_photo']['size'];
	if(!empty($strext)){
		if($strext == '.jpg' || $strext == '.gif' || $strext == '.png') {
			if($intlength < 1024000) {
				$hresult = move_uploaded_file($_FILES['card_photo']['tmp_name'], $gconfig['path']['card_photo'] . '/'. $strphoto_name . $strext);
				if($hresult) {
					$strsql = "UPDATE " . $gdb->fun_table2('card') . " SET card_photo_file = '".$strphoto_name.$strext."' WHERE card_id = " . $intcard_id . " LIMIT 1";
					$hresult = $gdb->fun_do($strsql);
					if(!$hresult) {
						$intreturn = 3;
					}
				}else{
					$intreturn = 4;//移动文件失败
				}
			}else{
				$intreturn = 5;//文件过大
			}
		}else{
			$intreturn = 6;//文件后缀不对
		}
	}
}
echo $intreturn;
?>