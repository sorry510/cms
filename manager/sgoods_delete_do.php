<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strsgoods_id = api_value_post('sgoods_id');
$intsgoods_id = api_value_int0($strsgoods_id);

$intreturn = 0;
if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('sgoods') . " WHERE sgoods_id = " . $intsgoods_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	echo 'y';
} else if($intreturn == 1) {
	echo 'n';
}

?>