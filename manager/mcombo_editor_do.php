<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'goods';

$strmcombo_name = api_value_post('mcombo_name');
$strmcombo_jianpin = api_value_post('mcombo_jianpin');
$strmcombo_code = api_value_post('mcombo_code');
$strmcombo_price = api_value_post('mcombo_price');
$decmcombo_price = api_value_decimal($strmcombo_price);
$strmcombo_cprice = api_value_post('mcombo_cprice');
$decmcombo_cprice = api_value_decimal($strmcombo_cprice);
$strmcombo_limit_cont = api_value_post('mcombo_limit_cont');
$intmcombo_limit_cont  = api_value_int0($strmcombo_limit_cont );
$strmcombo_limit_type = api_value_post('mcombo_limit_type');
$intmcombo_limit_type  = api_value_int0($strmcombo_limit_type);
$strmcombo_act = api_value_post('mcombo_act');
$intmcombo_act  = api_value_int0($strmcombo_act);
$arrmgoods = api_value_post('arr');
$strmcombo_type = api_value_post('mcombo_type');
$intmcombo_type  = api_value_int0($strmcombo_type );
$strmcombo_id = api_value_post('mcombo_id');
$intmcombo_id  = api_value_int0($strmcombo_id );

$intreturn = 0;
$ctime = time();
$atime = time();
$arr = array();
if($intreturn == 0) {
	$intmcombo_limit = "";

	if($intmcombo_limit_type == 1){
		$intmcombo_limit = "mcombo_limit_months = 0 ,mcombo_limit_days = 0 ,mcombo_limit_type = 1," ;
	}else if($intmcombo_limit_type == 2){
		$intmcombo_limit = "mcombo_limit_months = 0 ,mcombo_limit_days = ".$intmcombo_limit_cont.", mcombo_limit_type = 3," ;
	}else if($intmcombo_limit_type == 3){
		$intmcombo_limit = "mcombo_limit_months = ".$intmcombo_limit_cont." ,mcombo_limit_days = 0, mcombo_limit_type = 3," ;
	}

	$strsql = "UPDATE " . $gdb->fun_table2('mcombo') . "SET mcombo_type = '$intmcombo_type', mcombo_code = '$strmcombo_code', mcombo_name = '$strmcombo_name', mcombo_jianpin = '$strmcombo_jianpin', mcombo_price = $decmcombo_price, mcombo_cprice =  $decmcombo_cprice, ".$intmcombo_limit." mcombo_act = $intmcombo_act, mcombo_ctime = $ctime WHERE mcombo_id = $intmcombo_id";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}	
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('mcombo_goods') . " WHERE mcombo_id = $intmcombo_id";
	$hresult = $GLOBALS['gdb']->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

if($intreturn == 0) {
	foreach($arrmgoods as $v){
		$strsql = "INSERT INTO " . $gdb->fun_table2('mcombo_goods') . " (mgoods_id, mcombo_goods_count, mcombo_id, mcombo_goods_atime ) VALUES ( ".$v['mgoods_id']." , ". $v['number'] .", ".$intmcombo_id.", $atime)";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 3;
		}	
	}
}

if($intreturn == 0){
	echo 'y';
}else{
	echo 'n';
}
?>