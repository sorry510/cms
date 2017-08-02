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

$intreturn = 0;
$atime = time();
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('sgoods') . "(shop_id, sgoods_catalog_id, sgoods_name, sgoods_jianpin, sgoods_code, sgoods_price, sgoods_cprice, sgoods_type, sgoods_state) VALUES ($intshop_id, $intsgoods_catalog_id  , '$strsgoods_name', '$strsgoods_jianpin', '$strsgoods_code', $decsgoods_price, $decsgoods_cprice, $intsgoods_type, 1)";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	echo '<script type="text/javascript">window.location="sgoods.php";</script>';
} else if($intreturn == 1) {
	echo '<script type="text/javascript">alert("添加失败！"); history.back();</script>';
}



?>