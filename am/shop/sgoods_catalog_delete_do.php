<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT sgoods_id FROM " . $gdb->fun_table2('sgoods') . " WHERE sgoods_catalog_id = " . $intid . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$intreturn = 2;
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('sgoods_catalog') . " WHERE sgoods_catalog_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>