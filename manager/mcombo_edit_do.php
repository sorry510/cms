<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';

$strmcombo_id = api_value_post('txtmcombo_id');
$intmcombo_id  = api_value_int0($strmcombo_id);
$strmcombo_name = api_value_post('txtmcombo_name');
$sqlmcombo_name = $gdb->fun_escape($strmcombo_name);
$strmcombo_jianpin = api_value_post('txtmcombo_jianpin');
$sqlmcombo_jianpin = $gdb->fun_escape($strmcombo_jianpin);
$strmcombo_code = api_value_post('txtmcombo_code');
$sqlmcombo_code = $gdb->fun_escape($strmcombo_code);
$strmcombo_code_old = api_value_post('txtmcombo_code_old');
$sqlmcombo_code_old = $gdb->fun_escape($strmcombo_code_old);
$strmcombo_price = api_value_post('txtmcombo_price');
$decmcombo_price = api_value_decimal($strmcombo_price,2);
$strmcombo_cprice = api_value_post('txtmcombo_cprice');
$decmcombo_cprice = api_value_decimal($strmcombo_cprice,2);
$strmcombo_limit_cont = api_value_post('txtmcombo_limit_days');//有效期
$intmcombo_limit_cont  = api_value_int0($strmcombo_limit_cont);
$strmcombo_act = api_value_post('txtmcombo_act');
$intmcombo_act  = api_value_int0($strmcombo_act);
$strmcombo_reserve = api_value_post('txtmcombo_reserve');
$intmcombo_reserve  = api_value_int0($strmcombo_reserve);
$strmcombo_type = api_value_post('txtmcombo_type');
$intmcombo_type  = api_value_int0($strmcombo_type );
$arrmgoods = api_value_post('arr');

$intreturn = 0;
$ctime = time();
$arr = array();

//编码不能相同
if($intreturn == 0){
	if($sqlmcombo_code != $sqlmcombo_code_old && !empty($sqlmcombo_code)){
		$strsql = "SELECT mcombo_id FROM ".$gdb->fun_table2('mcombo')." WHERE mcombo_code='".$sqlmcombo_code."'";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 1;
		}
	}
}

if($intreturn == 0) {
	$intmcombo_limit = "";
	if ($intmcombo_limit_cont == 0) {
		$intmcombo_limit_type = 1;
	}else{
		$intmcombo_limit_type = 2;
	}
	if($intmcombo_limit_type == 1){
		$intmcombo_limit = "mcombo_limit_months = 0 ,mcombo_limit_days = 0 ,mcombo_limit_type = 1," ;
	}else if($intmcombo_limit_type == 2){
		$intmcombo_limit = "mcombo_limit_months = 0 ,mcombo_limit_days = ".$intmcombo_limit_cont.", mcombo_limit_type = 2," ;
	}

	$strsql = "UPDATE " . $gdb->fun_table2('mcombo') . "SET mcombo_type = '$intmcombo_type', mcombo_code = '$strmcombo_code', mcombo_name = '$strmcombo_name', mcombo_jianpin = '$strmcombo_jianpin', mcombo_price = $decmcombo_price, mcombo_cprice =  $decmcombo_cprice, ".$intmcombo_limit." mcombo_act = $intmcombo_act, mcombo_reserve = $intmcombo_reserve, mcombo_ctime = $ctime WHERE mcombo_id = $intmcombo_id";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}	
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('mcombo_goods') . " WHERE mcombo_id = $intmcombo_id";
	$hresult = $GLOBALS['gdb']->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

if($intreturn == 0) {
	foreach($arrmgoods as $v){
		$strsql = "INSERT INTO " . $gdb->fun_table2('mcombo_goods') . " (mgoods_id, mcombo_goods_count, mcombo_id, mcombo_goods_atime ) VALUES ( ".$v['mgoods_id']." , ". $v['number'] .", ".$intmcombo_id.", $ctime)";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 4;
		}
	}
}

echo $intreturn;
?>