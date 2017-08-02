<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strsgoods_catalog_name = api_value_post('sgoods_catalog_name');
$strshop_id = api_value_post('shop_id');
$intshop_id = api_value_int0($strshop_id);

$intreturn = 0;
$atime = time();
if($intreturn == 0) {
	  $strsql = "INSERT INTO " . $gdb->fun_table2('sgoods_catalog') . "( sgoods_catalog_name,shop_id, sgoods_catalog_ctime ) VALUES ( '$strsgoods_catalog_name' ,$intshop_id, $atime)";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	echo '<script type="text/javascript">window.location="sgoods_catalog.php";</script>';
} else if($intreturn == 1) {
	echo '<script type="text/javascript">alert("操作异常！"); history.back();</script>';
}

?>