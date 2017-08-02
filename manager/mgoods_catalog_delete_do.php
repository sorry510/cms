<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strmgoods_catalog_id = api_value_post('mgoods_catalog_id');
$intmgoods_catalog_id = api_value_int0($strmgoods_catalog_id);

$intreturn = 0;

$strsql = "SELECT mgoods_id FROM " . $gdb->fun_table2('mgoods') . " where mgoods_catalog_id=".$intmgoods_catalog_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
if(!empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('mgoods_catalog') . " WHERE mgoods_catalog_id = " . $intmgoods_catalog_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;
?>