<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strmgoods_id = api_value_post('mgoods_id');
$intmgoods_id = api_value_int0($strmgoods_id);

$intreturn = 0;

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('mgoods') . " SET mgoods_state = (case mgoods_state when 1 then 2 when 2 then 1 else 0 end) WHERE mgoods_id = " . $intmgoods_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>