<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsgoods_id = api_value_get('sgoods_id');
$intsgoods_id = api_value_int0($strsgoods_id);

$intreturn = 0;

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('sgoods') . " SET sgoods_state = (case sgoods_state when 1 then 2 when 2 then 1 else 0 end) WHERE sgoods_id = " . $intsgoods_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>