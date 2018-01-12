<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strwgoods_id = api_value_post('id');
$intwgoods_id = api_value_int0($strwgoods_id);

$intreturn = 0;

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('wgoods') . " WHERE wgoods_id = " . $intwgoods_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}

echo $intreturn;
?>