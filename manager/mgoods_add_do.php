<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'goods';

$strmgoods_catalog_id = api_value_post('mgoods_catalog_id');
$intmgoods_catalog_id = api_value_int0($strmgoods_catalog_id);
$strmgoods_name = api_value_post('mgoods_name');
$sqlmgoods_name = $gdb->fun_escape($strmgoods_name);
$strmgoods_jianpin = api_value_post('mgoods_jianpin');
$sqlmgoods_jianpin = $gdb->fun_escape($strmgoods_jianpin);
$strmgoods_code = api_value_post('mgoods_code');
$sqlmgoods_code = $gdb->fun_escape($strmgoods_code);
$strmgoods_price = api_value_post('mgoods_price');
$decmgoods_price = api_value_decimal($strmgoods_price,2);
$strmgoods_cprice = api_value_post('mgoods_cprice');
$decmgoods_cprice = api_value_decimal($strmgoods_cprice,2);
$strmgoods_type = api_value_post('mgoods_type');
$intmgoods_type = api_value_int0($strmgoods_type);
$strmgoods_act = api_value_post('mgoods_act');
$intmgoods_act = api_value_int0($strmgoods_act);
$strmgoods_reserve = api_value_post('mgoods_reserve');
$intmgoods_reserve = api_value_int0($strmgoods_reserve);

$intreturn = 0;
$atime = time();

if($decmgoods_price == 0 || $sqlmgoods_name=='' || $intmgoods_catalog_id == 0){
	$intreturn = 1;
}

if($intreturn == 0){
	if($sqlmgoods_code != ''){
		$strsql = "SELECT mgoods_id FROM ".$gdb->fun_table2('mgoods'). " where mgoods_code='".$sqlmgoods_code."'";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
	}
}

if($intreturn == 0){
	if($sqlmgoods_code != ''){
		$strsql = "SELECT sgoods_id FROM ".$gdb->fun_table2('sgoods'). " where sgoods_code='".$sqlmgoods_code."'";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('mgoods') . "( mgoods_catalog_id, mgoods_name, mgoods_jianpin, mgoods_code, mgoods_price, mgoods_cprice, mgoods_type, mgoods_act,mgoods_reserve,mgoods_state) VALUES ( $intmgoods_catalog_id  , '$sqlmgoods_name', '$sqlmgoods_jianpin', '$sqlmgoods_code', $decmgoods_price, $decmgoods_cprice, $intmgoods_type, $intmgoods_act,$intmgoods_reserve,1)";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

echo $intreturn;
?>