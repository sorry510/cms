<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strtype1 = api_value_get('type');
$strtype2 = api_value_post('type');

if($strtype1=="show"){
	$strcard_id = api_value_get('card_id');
	$intcard_id = api_value_int0($strcard_id);

	$strsql = "SELECT card_id,card_code,card_state,card_name,card_phone,card_sex,card_birthday,card_password_state,card_password,card_identity,card_edate,card_memo,s_card_ymoney FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$arr['card_birthday'] = date("Y-m-d",$arr['card_birthday']);
	$arr['card_edate'] = date("Y-m-d",$arr['card_edate']);
	echo json_encode($arr);
}
if($strtype2 == "edit"){
	$strcard_id = api_value_post('card_id');
	$intcard_id = api_value_int0($strcard_id);
	$strcard_code = api_value_post('card_code');
	$strcard_name = api_value_post('card_name');
	$strcard_phone = api_value_post('card_phone');
	$strcard_sex = api_value_post('card_sex');
	$intcard_sex = api_value_int0($strcard_sex);
	$strcard_birthday = api_value_post('card_birthday');
	$strcard_passsword_state = api_value_post('pwd_state');
	$intcard_passsword_state = api_value_int0($strcard_passsword_state);
	$strcard_password = api_value_post('card_password');
	// $card_photo_file = api_value_post('card_photo_file');
	$strcard_code = api_value_post('card_code');
	$strcard_ikey = api_value_post('card_ikey');
	$strcard_edate = api_value_post('card_edate');
	$strcard_identity = api_value_post('card_identity');
	$strcard_memo = api_value_post('card_memo');


	$intreturn = 0;
	$intcard_birthday = 0;
	if($intreturn == 0) {
		if(!empty($strcard_birthday)) {
			$int = strtotime($strcard_birthday);
			if($int > 0) {
				$intcard_birthday = $int;
			}
		}
	}
	$intcard_birthday2 = 0;
	if($intreturn == 0) {
		if(!empty($strcard_birthday)) {
			$arrcard_birthday = explode("-", $strcard_birthday);
			if(isset($arrcard_birthday[1])&&isset($arrcard_birthday[2])){
				$intcard_birthday2 = mktime(0, 0, 0, $arrcard_birthday[1], $arrcard_birthday[2]); 
			}
		}
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
		$strsql = "UPDATE ".$gdb->fun_table2('card')." SET card_code='".$gdb->fun_escape($strcard_code)."', card_name = '".$gdb->fun_escape($strcard_name)."',card_phone='".$gdb->fun_escape($strcard_phone)."',card_sex=".$intcard_sex.",card_birthday=".$intcard_birthday.",card_birthday2=".$intcard_birthday2.",card_password_state=".$intcard_passsword_state.",card_password='".$gdb->fun_escape($strcard_password)."',card_ikey='".$gdb->fun_escape($strcard_ikey)."',card_identity='".$gdb->fun_escape($strcard_identity)."',card_memo='".$gdb->fun_escape($strcard_memo)."',card_edate=".$intcard_edate.",card_ctime=".time()." where card_id=".$intcard_id." limit 1";
		// echo $strsql;
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 1;
		}
	}
	echo $intreturn;
}
?>