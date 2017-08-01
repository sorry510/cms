<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strshop_id = api_value_post('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strsgoods_catalog_id = api_value_post('sgoods_catalog_id');
$intsgoods_catalog_id = api_value_int0($strsgoods_catalog_id);
$strsgoods_name = api_value_post('sgoods_name');
$strsgoods_jianpin = api_value_post('sgoods_jianpin');
$strsgoods_code = api_value_post('sgoods_code');
$strsgoods_price = api_value_post('sgoods_price');
$decsgoods_price = api_value_decimal($strsgoods_price);
$strsgoods_cprice = api_value_post('sgoods_cprice');
$decsgoods_cprice = api_value_decimal($strsgoods_cprice);
$strsgoods_type = api_value_post('sgoods_type');
$intsgoods_type = api_value_int0($strsgoods_type);
$strsgoods_id = api_value_post('sgoods_id');
$intsgoods_id = api_value_int0($strsgoods_id);

$intreturn = 0;
$ctime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('sgoods') . " SET shop_id = ".$intshop_id.", sgoods_catalog_id = " . $intsgoods_catalog_id . ", sgoods_name = '".$strsgoods_name."',  sgoods_jianpin = '".$strsgoods_jianpin."', sgoods_code = '".$strsgoods_code."', sgoods_price = ".$decsgoods_price.", sgoods_cprice = ".$decsgoods_cprice.", sgoods_type = ".$intsgoods_type.", sgoods_ctime = ".$ctime." WHERE sgoods_id = " . $intsgoods_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	echo 'y';
}else{
	echo 'n';
}


?>