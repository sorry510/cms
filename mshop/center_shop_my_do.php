<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strcard_name = api_value_post('cardname');
$sqlcard_name = $gdb->fun_escape($strcard_name);
$strcard_birthday = api_value_post('birthday');
$intcard_birthday_date = strtotime($strcard_birthday) ? strtotime($strcard_birthday) : 0;
$strcard_password = api_value_post('password');
$sqlcard_password = $gdb->fun_escape($strcard_password);

$intreturn = 0;
$intnow = time();
$intcard_id = 0;

$arrcard_birthday = explode("-", $strcard_birthday);
$intcard_birthday_month = 0;
if(isset($arrcard_birthday[1])){
	$intcard_birthday_month = api_value_int0($arrcard_birthday[1]);
}
$intcard_birthday_day = 0;
if(isset($arrcard_birthday[2])){
	$intcard_birthday_day = api_value_int0($arrcard_birthday[2]);
}

$arr = array();
$arrcard = array();
$strsql = "SELECT card_password,card_okey FROM ".$gdb->fun_table2('card')." WHERE card_id=".$intid;
$hresult = $gdb->fun_query($strsql);
$arrcard = $gdb->fun_fetch_assoc($hresult);
if(!empty($arrcard)){
	if($arrcard['card_okey'] != $gdb->fun_escape($GLOBALS['_SESSION']['login_openid'])){
		$intreturn = 1;
	}
	if(empty($sqlcard_password)){
		$sqlcard_password = $arrcard['card_password'];
	}
}else{
	$intreturn = 2;
}

if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET card_name = '".$sqlcard_name."',card_birthday_date=".$intcard_birthday_date.",card_birthday_month=".$intcard_birthday_month.",card_birthday_day=".$intcard_birthday_day.",card_password='".$sqlcard_password."',card_ctime=".$intnow." where card_id=".$intid." limit 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

if($intreturn == 0){
	echo "<script>window.location='./center_shop_my.php?id=".$intid."';</script>";
}else{
	echo "<script>alert('操作失败');window.location='./center_shop_my.php?id=".$intid."';</script>";
}
?>