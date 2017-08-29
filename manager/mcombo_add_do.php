<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strmcombo_name = api_value_post('mcombo_name');
$sqlmcombo_name = $gdb->fun_escape($strmcombo_name);
$strmcombo_jianpin = api_value_post('mcombo_jianpin');
$sqlmcombo_jianpin = $gdb->fun_escape($strmcombo_jianpin);
$strmcombo_code = api_value_post('mcombo_code');
$sqlmcombo_code = $gdb->fun_escape($strmcombo_code);
$strmcombo_price = api_value_post('mcombo_price');
$decmcombo_price = api_value_decimal($strmcombo_price,2);
$strmcombo_cprice = api_value_post('mcombo_cprice');
$decmcombo_cprice = api_value_decimal($strmcombo_cprice,2);
$strmcombo_limit_cont = api_value_post('mcombo_limit_cont');//有效期
$intmcombo_limit_cont  = api_value_int0($strmcombo_limit_cont);
$strmcombo_limit_type = api_value_post('mcombo_limit_type');//1不限制，2：天，3：月
$intmcombo_limit_type  = api_value_int0($strmcombo_limit_type);
$strmcombo_act = api_value_post('mcombo_act');
$intmcombo_act  = api_value_int0($strmcombo_act);
$strmcombo_type = api_value_post('mcombo_type');
$intmcombo_type  = api_value_int0($strmcombo_type );
$arrmgoods = api_value_post('arr');

$intreturn = 0;
$atime = time();
$arr = array();

if($sqlmcombo_name == '' || $decmcombo_price == 0){
	$intreturn = 1;
}
// 编码不能相同
if($intreturn == 0){
	if(!empty($sqlmcombo_code)){
		$strsql = "SELECT mcombo_id FROM ".$gdb->fun_table2('mcombo')." WHERE mcombo_code='".$sqlmcombo_code."'";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
	}
}

//写入mcombo
if($intreturn == 0) {
	$mcombo_limit = "";
	if($intmcombo_limit_type == 2){
		$mcombo_limit = "mcombo_limit_days" ;
	}else if($intmcombo_limit_type == 3){
		$mcombo_limit = "mcombo_limit_months" ;
	}else{
		$mcombo_limit = "mcombo_limit_months" ;
		$intmcombo_limit_cont = 0;
	}

	$strsql = "INSERT INTO " . $gdb->fun_table2('mcombo') . "(mcombo_type, mcombo_code, mcombo_name, mcombo_jianpin, mcombo_price, mcombo_cprice,mcombo_limit_type, ".$mcombo_limit.", mcombo_act, mcombo_state, mcombo_atime ) VALUES ( $intmcombo_type, '$strmcombo_code', '$strmcombo_name','$strmcombo_jianpin', $decmcombo_price, $decmcombo_cprice,  $intmcombo_limit_type, $intmcombo_limit_cont , $intmcombo_act, 1, $atime)";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}else{
		$mcmobo_id = mysql_insert_id();
	}
}

//写入mcombo_goods
if($intreturn == 0) {
	foreach($arrmgoods as $v){
		$strsql = "INSERT INTO " . $gdb->fun_table2('mcombo_goods') . " (mgoods_id, mcombo_goods_count, mcombo_id, mcombo_goods_atime ) VALUES ( ".$v['mgoods_id']." , ". $v['number'] .", ".$mcmobo_id.", $atime)";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 4;
		}
	}
}
echo $intreturn;
?>