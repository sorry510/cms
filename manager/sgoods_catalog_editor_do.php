<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strshop_id = api_value_post('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strsgoods_catalog_name = api_value_post('sgoods_catalog_name');
$strsgoods_catalog_id = api_value_post('sgoods_catalog_id');
$intsgoods_catalog_id = api_value_int0($strsgoods_catalog_id );


$intreturn = 0;
$ctime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('sgoods_catalog') . " SET sgoods_catalog_name = '" . $strsgoods_catalog_name . " ', shop_id = ".$intshop_id.", sgoods_catalog_ctime = ".$ctime." WHERE sgoods_catalog_id = " . $intsgoods_catalog_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
	//echo $strsql;
}
if($intreturn == 0) {
	echo 'y';
}else{
	echo 'n';
}


?>