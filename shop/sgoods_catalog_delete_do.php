<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsgoods_catalog_id = api_value_post('sgoods_catalog_id');
$intsgoods_catalog_id = api_value_int0($strsgoods_catalog_id);

$intreturn = 0;

$strsql = "SELECT sgoods_id FROM " . $gdb->fun_table2('sgoods') . " where sgoods_catalog_id=".$intsgoods_catalog_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
if(!empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('sgoods_catalog') . " WHERE sgoods_catalog_id = " . $intsgoods_catalog_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;
?>