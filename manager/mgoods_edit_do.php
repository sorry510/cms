<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strmgoods_catalog_id = api_value_post('mgoods_catalog_id');
$intmgoods_catalog_id = api_value_int0($strmgoods_catalog_id);
$strmgoods_name = api_value_post('mgoods_name');
$sqlmgoods_name = $gdb->fun_escape($strmgoods_name);
$strmgoods_name_old = api_value_post('mgoods_name_old');
$sqlmgoods_name_old = $gdb->fun_escape($strmgoods_name_old);
$strmgoods_jianpin = api_value_post('mgoods_jianpin');
$sqlmgoods_jianpin = $gdb->fun_escape($strmgoods_jianpin);
$strmgoods_code = api_value_post('mgoods_code');
$sqlmgoods_code = $gdb->fun_escape($strmgoods_code);
$strmgoods_code_old = api_value_post('mgoods_code_old');
$sqlmgoods_code_old = $gdb->fun_escape($strmgoods_code_old);
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
$strmgoods_id = api_value_post('mgoods_id');
$intmgoods_id = api_value_int0($strmgoods_id);

$intreturn = 0;
$ctime = time();

if($decmgoods_price == 0 || $sqlmgoods_name=='' || $intmgoods_catalog_id == 0){
	$intreturn = 1;
}

if($sqlmgoods_code != $sqlmgoods_code_old && !empty($sqlmgoods_code)){
	$strsql = "SELECT mgoods_id FROM ".$gdb->fun_table2('mgoods'). " where mgoods_code='".$sqlmgoods_code."'";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
}
if($sqlmgoods_code != $sqlmgoods_code_old && !empty($sqlmgoods_code)){
	$strsql = "SELECT sgoods_id FROM ".$gdb->fun_table2('sgoods'). " where sgoods_code='".$sqlmgoods_code."'";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('mgoods') . " SET mgoods_catalog_id = " . $intmgoods_catalog_id . ", mgoods_name = '".$sqlmgoods_name."',  mgoods_jianpin = '".$sqlmgoods_jianpin."', mgoods_code = '".$sqlmgoods_code."', mgoods_price = ".$decmgoods_price.", mgoods_cprice = ".$decmgoods_cprice.", mgoods_type = ".$intmgoods_type.", mgoods_act = ".$intmgoods_act.", mgoods_reserve = ".$intmgoods_reserve.", mgoods_ctime = ".$ctime." WHERE mgoods_id = " . $intmgoods_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

echo $intreturn;
?>