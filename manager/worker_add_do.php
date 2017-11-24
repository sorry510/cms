<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('fileClass.php');
require('inc_limit.php');

$strshop = api_value_post('txtshop');
$intshop = api_value_int0($strshop);
$strworker_group_id = api_value_post('txtgroup');
$intworker_group_id = api_value_int0($strworker_group_id);
$strworker_name = api_value_post('txtname');
$sqlworker_name = $gdb->fun_escape($strworker_name);
$strworker_code = api_value_post('txtcode');
$sqlworker_code = $gdb->fun_escape($strworker_code);
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
//$arrinfo = api_value_post('arr');//[{"id":"2","num":"1"},{"id":"3","num":"1"},{"id":"5","num":"4"}]

$arr = array();
$intreturn = 0;
$intnow = time();
$intworker_id = 0;

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

//姓名手机必填
if($intshop == 0 || $intworker_group_id == 0 || empty($sqlworker_name) || empty($sqlworker_phone) || empty($sqlworker_birthday_date) || empty($sqlworker_identity)){
	$intreturn = 1;
}
// 员工编码唯一
if(!empty($sqlworker_code)){
	$strsql = "SELECT worker_id FROM ".$gdb->fun_table2('worker')." WHERE worker_code='".$sqlworker_code."' and shop_id=".$GLOBALS['_SESSION']['login_sid'];
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$intreturn = 2;
	}
}

if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('worker')." (worker_group_id,shop_id,worker_code,worker_name,worker_sex,worker_birthday_date,worker_birthday_month,worker_birthday_day,worker_phone,worker_identity,worker_education,worker_join,worker_address,worker_wage,worker_atime) VALUES (".$intworker_group_id.",".$intshop.",'".$sqlworker_code."','".$sqlworker_name."',".$intworker_sex.",".$intworker_birthday_date.",".$intworker_birthday_date_month.",".$intworker_birthday_date_day.",'".$sqlworker_phone."','".$sqlworker_identity."',".$intworker_education.",".$intworker_join.",'".$sqlworker_address."',".$decworker_wage.",".$intnow.")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}else{
		$intworker_id = mysql_insert_id();
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
	$strnewfile = $fix.$GLOBALS['intshop']."_".$GLOBALS['intworker_id'].$strext;
	$hresult = $objfile -> moveFile($strtmpfile, $strnewurl.$strnewfile, true);
	if($hresult){
		$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('worker')." SET ".$place." = '".$strnewfile."' where worker_id=".$GLOBALS['intworker_id'];
		$GLOBALS['gdb']->fun_do($strsql);
		$objfile -> unlinkFile($strtmpfile);
	}
}
/*if($intreturn == 0){
	if(!empty($arrinfo)){
		foreach($arrinfo as $v){
			$intmgoods_id = $v['mgoods_id'];
			$strmgoods_name = $v['mgoods_name'];
			$intnum = api_value_int0($v['num']);
			if($intnum==0){
				continue;
			}
			if($intmgoods_id != 0){
				$strsql = "INSERT INTO " .$GLOBALS['gdb']->fun_table2('worker_goods'). "(worker_id,shop_id,mgoods_id) VALUES (".$intworker_id.",".$intshop_id.",".$intmgoods_id.")";
				$hresult = $gdb->fun_do($strsql);
				if($hresult==false){
					$intreturn = 3;
				}
			}
		}
	}
}*/

echo $intreturn;
