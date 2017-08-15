<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strsgoods_catalog_id = api_value_post('sgoods_catalog_id');
$intsgoods_catalog_id = api_value_int0($strsgoods_catalog_id);
$strsgoods_name = api_value_post('sgoods_name');
$sqlsgoods_name = $gdb->fun_escape($strsgoods_name);
$strsgoods_jianpin = api_value_post('sgoods_jianpin');
$sqlsgoods_jianpin = $gdb->fun_escape($strsgoods_jianpin);
$strsgoods_code = api_value_post('sgoods_code');
$sqlsgoods_code = $gdb->fun_escape($strsgoods_code);
$strsgoods_price = api_value_post('sgoods_price');
$decsgoods_price = api_value_decimal($strsgoods_price,2);
$strsgoods_cprice = api_value_post('sgoods_cprice');
$decsgoods_cprice = api_value_decimal($strsgoods_cprice,2);
$strsgoods_type = api_value_post('sgoods_type');
$intsgoods_type = api_value_int0($strsgoods_type);


$intreturn = 0;
$atime = time();

if($decsgoods_price == 0 || $sqlsgoods_name=='' || $intsgoods_catalog_id == 0){
	$intreturn = 1;
}

if($intreturn == 0){
	if($sqlsgoods_code != ''){
		$strsql = "SELECT mgoods_id FROM ".$gdb->fun_table2('mgoods'). " where mgoods_code='".$sqlsgoods_code."'";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
	}
}

if($intreturn == 0){
	if($sqlsgoods_code != ''){
		$strsql = "SELECT sgoods_id FROM ".$gdb->fun_table2('sgoods'). " where sgoods_code='".$sqlsgoods_code."' and shop_id=".$GLOBALS['_SESSION']['login_sid'];
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('sgoods') . "( shop_id,sgoods_catalog_id, sgoods_name, sgoods_jianpin, sgoods_code, sgoods_price, sgoods_cprice, sgoods_type,sgoods_state) VALUES ( ".$GLOBALS['_SESSION']['login_sid'].",".$intsgoods_catalog_id.",'".$sqlsgoods_name."','".$sqlsgoods_jianpin."','".$sqlsgoods_code."',".$decsgoods_price.",".$decsgoods_cprice.",".$intsgoods_type.",1)";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

echo $intreturn;
?>