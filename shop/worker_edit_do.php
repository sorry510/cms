<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('fileClass.php');
require('inc_limit.php');

$strworker_id = api_value_post('txtid');
$intworker_id = api_value_int0($strworker_id);
$strworker_group_id = api_value_post('txtgroup');
$intworker_group_id = api_value_int0($strworker_group_id);
$strworker_name = api_value_post('txtname');
$sqlworker_name = $gdb->fun_escape($strworker_name);
$strworker_code = api_value_post('txtcode');
$sqlworker_code = $gdb->fun_escape($strworker_code);
$strworker_code_old = api_value_post('txtcodeold');
$sqlworker_code_old = $gdb->fun_escape($strworker_code_old);
$strworker_sex = api_value_post('txtsex');
$intworker_sex = api_value_int0($strworker_sex);
$strworker_birthday_date = api_value_post('txtbirthday');
$sqlworker_birthday_date = $gdb->fun_escape($strworker_birthday_date);
$strworker_phone = api_value_post('txtaccount');
$sqlworker_phone = $gdb->fun_escape($strworker_phone);
$strworker_identity = api_value_post('txtidentity');
$sqlworker_identity = $gdb->fun_escape($strworker_identity);
$strworker_education = api_value_post('txteducation');
$intworker_education = api_value_int0($strworker_education);
$strworker_join = api_value_post('txtjoin');
$sqlworker_join = $gdb->fun_escape($strworker_join);
$strworker_address = api_value_post('txtaddress');
$sqlworker_address = $gdb->fun_escape($strworker_address);
$strworker_wage = api_value_post('txtwage');
$decworker_wage = api_value_decimal($strworker_wage, 2);
$strphoto1 = api_value_post('photo1');
$sqlphoto1 = $gdb->fun_escape($strphoto1);
$strphoto2 = api_value_post('photo2');
$sqlphoto2 = $gdb->fun_escape($strphoto2);
$intshop_id = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$arr = array();
$intreturn = 0;
$intnow = time();

$intworker_join = strtotime($sqlworker_join) ? strtotime($sqlworker_join) : 0;
$intworker_birthday_date = strtotime($sqlworker_birthday_date) ? strtotime($sqlworker_birthday_date) : 0;
$arrworker_birthday_date = explode("-", $sqlworker_birthday_date);
$intworker_birthday_date_month = 0;
if(isset($arrworker_birthday_date[1])){
	$intworker_birthday_date_month = api_value_int0($arrworker_birthday_date[1]);
}
$intworker_birthday_date_day = 0;
if(isset($arrworker_birthday_date[2])){
	$intworker_birthday_date_day = api_value_int0($arrworker_birthday_date[2]);
}

// 检测员工是否存在
$strsql = "SELECT worker_id FROM ".$gdb->fun_table2('worker')." WHERE worker_id=".$intworker_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}

//姓名手机必填
if($intshop_id == 0 || $intworker_group_id == 0 || empty($sqlworker_name) || empty($sqlworker_phone) || empty($sqlworker_birthday_date) || empty($sqlworker_identity)){
	$intreturn = 2;
}
// 员工编码唯一
if(!empty($sqlworker_code) && $sqlworker_code != $sqlworker_code_old){
	$strsql = "SELECT worker_id FROM ".$gdb->fun_table2('worker')." WHERE worker_code='".$sqlworker_code."' and shop_id=".$intshop_id;
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$intreturn = 3;
	}
}

if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table2('worker')." SET shop_id=".$intshop_id.",worker_group_id=".$intworker_group_id.",worker_name='".$sqlworker_name."',worker_code='".$sqlworker_code."',worker_sex=".$intworker_sex.",worker_birthday_date=".$intworker_birthday_date.",worker_birthday_day=".$intworker_birthday_date_day.",worker_birthday_month=".$intworker_birthday_date_month.",worker_phone='".$sqlworker_phone."',worker_identity='".$sqlworker_identity."',worker_education=".$intworker_education.",worker_join=".$intworker_join.",worker_address='".$sqlworker_address."',worker_wage=".$decworker_wage." where worker_id=".$intworker_id;
	// echo $strsql;exit;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 4;
	}
}

if($intreturn == 0){
	$objfile = new FileClass();
	if(!empty($sqlphoto1)){
		update_photo($objfile, $sqlphoto1, 'worker_photo_file', 'photo_');
	}
	if(!empty($sqlphoto2)){
		update_photo($objfile, $sqlphoto2, 'worker_identity_file', 'ID_');
	}
}
function update_photo($objfile, $photo, $place, $fix = ''){
	$strtmpfile = $GLOBALS['gconfig']['photo'][0].$photo;
	$strext = strtolower(strrchr($photo, '.'));
	//photo目录对应cid文件夹下sid_wid
	$strnewurl = $GLOBALS['gconfig']['image']['base'].$GLOBALS['_SESSION']['login_cid'].DIRECTORY_SEPARATOR."worker".DIRECTORY_SEPARATOR;
	$strnewfile = $fix.$GLOBALS['intshop_id']."_".$GLOBALS['intworker_id'].$strext;
	$hresult = $objfile -> moveFile($strtmpfile, $strnewurl.$strnewfile, true);
	if($hresult){
		$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('worker')." SET ".$place." = '".$strnewfile."' where worker_id=".$GLOBALS['intworker_id'];
		$GLOBALS['gdb']->fun_do($strsql);
		$objfile -> unlinkFile($strtmpfile);
	}
}
echo $intreturn;
?>