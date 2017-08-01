<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_type_id = api_value_get('card_type_id');
$intcard_type_id = api_value_int0($strcard_type_id);

$intreturn = 0;
if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('card_type') . " WHERE card_type_id = " . $intcard_type_id . " LIMIT 1";
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