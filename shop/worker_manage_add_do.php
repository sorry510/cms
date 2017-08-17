<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strworker_group_id = api_value_post('worker_group_id');
$intworker_group_id = api_value_int0($strworker_group_id);
$strworker_name = api_value_post('worker_name');
$sqlworker_name = $gdb->fun_escape($strworker_name);
$strworker_code = api_value_post('worker_code');
$sqlworker_code = $gdb->fun_escape($strworker_code);
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

$arrinfo = api_value_post('arr');//[{"id":"2","num":"1"},{"id":"3","num":"1"},{"id":"5","num":"4"}]


$arr = array();
$intreturn = 0;
$intnow = time();
$intworker_id = 0;


if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('worker')." (worker_group_id,shop_id,worker_code,worker_name,worker_sex,worker_birthday_date,worker_birthday_month,worker_birthday_day,worker_phone,worker_identity,worker_education,worker_join,worker_address,worker_wage,worker_config_guide,worker_config_reserve,worker_atime) VALUES (".$intworker_group_id.",".$intshop_id.",'".$sqlworker_code."','".$sqlworker_name."',".$intworker_sex.",".$intworker_birthday_date.",".$intworker_birthday_date_month.",".$intworker_birthday_date_day.",'".$sqlworker_phone."','".$sqlworker_identity."',".$intworker_education.",".$intworker_join.",'".$sqlworker_address."',".$decworker_wage.",".$intworker_guide.",".$intworker_reserve.",".$intnow.")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}else{
		$intworker_id = mysql_insert_id();
	}
}

if($intreturn == 0){
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
					$intreturn = 2;
				}
			}
		}
	}
}

// echo $intreturn;
if($intreturn==0){
	echo $intworker_id;
}else{
	echo 'error';
}
?>