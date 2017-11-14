<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('fileClass.php');
require('inc_limit.php');

$strcard_id = api_value_post('txtid');
$intcard_id = api_value_int0($strcard_id);
$strcard_name = api_value_post('txtname');
$sqlcard_name = $gdb->fun_escape($strcard_name);
$strcard_sex = api_value_post('txtsex');
$intcard_sex = api_value_int0($strcard_sex);
$strcard_phone = api_value_post('txtphone');
$sqlcard_phone = $gdb->fun_escape($strcard_phone);
$strcard_birthday = api_value_post('txtbirthday');
$intcard_birthday_date = strtotime($strcard_birthday)?strtotime($strcard_birthday):0;
$strcard_passsword_state = api_value_post('txtpwdstate');
$intcard_passsword_state = api_value_int0($strcard_passsword_state);
$strcard_password = api_value_post('txtpassword');
$sqlcard_password = $gdb->fun_escape($strcard_password);
$strcard_code = api_value_post('txtcode');
$sqlcard_code = $gdb->fun_escape($strcard_code);
$strcard_ikey = api_value_post('txtikey');
$sqlcard_ikey = $gdb->fun_escape($strcard_ikey);
$strcard_edate = api_value_post('txtedate');
$intcard_edate = strtotime($strcard_edate)?strtotime($strcard_edate):0;;
$strcard_identity = api_value_post('txtidentity');
$sqlcard_identity = $gdb->fun_escape($strcard_identity);
$strcard_memo = api_value_post('txtmemo');
$sqlcard_memo = $gdb->fun_escape($strcard_memo);
// $strcard_carcode = api_value_post('card_carcode');
// $sqlcard_carcode = $gdb->fun_escape($strcard_carcode);
$strcard_link = api_value_post('txtlink');
$sqlcard_link = $gdb->fun_escape($strcard_link);
$strphoto = api_value_post('txtphoto');
$sqlphoto = $gdb->fun_escape($strphoto);

$intreturn = 0;

$arrcard_birthday = explode("-", $strcard_birthday);
$intcard_birthday_month = 0;
if(isset($arrcard_birthday[1])){
	$intcard_birthday_month = api_value_int0($arrcard_birthday[1]);
}
$intcard_birthday_day = 0;
if(isset($arrcard_birthday[2])){
	$intcard_birthday_day = api_value_int0($arrcard_birthday[2]);
}

if($intcard_passsword_state != 1){
	$sqlcard_password = '';
}

$intnow = time();

if($strcard_name == '' || $strcard_phone == ''){
	$intreturn = 1;
}

if($intreturn == 0){
	$arr = array();
	$strsql = "SELECT card_id FROM ".$gdb->fun_table2('card')." WHERE card_id=".$intcard_id." limit 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)){
		$intreturn = 2;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET card_code='".$sqlcard_code."', card_name = '".$sqlcard_name."',card_phone='".$sqlcard_phone."',card_sex=".$intcard_sex.",card_birthday_date=".$intcard_birthday_date.",card_birthday_month=".$intcard_birthday_month.",card_birthday_day=".$intcard_birthday_day.",card_password_state=".$intcard_passsword_state.",card_password='".$sqlcard_password."',card_ikey='".$sqlcard_ikey."',card_identity='".$sqlcard_identity."',card_memo='".$sqlcard_memo."',card_edate=".$intcard_edate.",card_ctime=".$intnow.",card_link='".$sqlcard_link."' where card_id=".$intcard_id." limit 1";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

// 更新照片
if($intreturn == 0){
	$objfile = new FileClass();
	if(!empty($sqlphoto)){
		update_photo($objfile, $sqlphoto, 'card_photo_file');
	}
}

/**
 * $objfile 文件操作对象
 * $photo 源文件
 * $place 数据库对应字段名
 * $fix 目标文件名前缀
 */
function update_photo($objfile, $photo, $place, $fix = ''){
	$strtmpfile = $GLOBALS['gconfig']['photo'][0].$photo;
	$strext = strtolower(strrchr($photo, '.'));
	$strnewpath = $GLOBALS['gconfig']['image']['base'].$GLOBALS['_SESSION']['login_cid'].DIRECTORY_SEPARATOR."card".DIRECTORY_SEPARATOR;//目的文件夹
	$strnewfile = $fix.$GLOBALS['_SESSION']['login_sid']."_".$GLOBALS['intcard_id'].$strext;
	$hresult = $objfile -> moveFile($strtmpfile, $strnewpath.$strnewfile, true);
	if($hresult){
		$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card')." SET ".$place." = '".$strnewfile."' where card_id=".$GLOBALS['intcard_id'];
		$GLOBALS['gdb']->fun_do($strsql);
		$objfile -> unlinkFile($strtmpfile);
	}
}

echo $intreturn;
?>