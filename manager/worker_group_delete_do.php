<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strworker_group_id = api_value_get('worker_group_id');
$intworker_group_id = api_value_int0($strworker_group_id);

$intreturn = 0;
if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('worker_group') . " WHERE worker_group_id = " . $intworker_group_id . " LIMIT 1";
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