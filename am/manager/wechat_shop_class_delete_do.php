<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strwgoods_catalog_id = api_value_post('id');
$intwgoods_catalog_id = api_value_int0($strwgoods_catalog_id);

$intreturn = 0;

$strsql = "SELECT wgoods_id FROM " . $gdb->fun_table2('wgoods') . " where wgoods_catalog_id=".$intwgoods_catalog_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
if(!empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('wgoods_catalog') . " WHERE wgoods_catalog_id = " . $intwgoods_catalog_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;
?>