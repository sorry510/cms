<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strmgoods_id = api_value_get('mgoods_id');
$intmgoods_id = api_value_int0($strmgoods_id);
$strmgoods_state = api_value_get('mgoods_state');
$intmgoods_state = api_value_int0($strmgoods_state);

$intreturn = 0;
$intmgoods_state_update = 0;

if($intmgoods_state == 1){
	$intmgoods_state_update = 2;
}else{
	$intmgoods_state_update = 1;
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('mgoods') . " SET mgoods_state = ". $intmgoods_state_update ." WHERE mgoods_id = " . $intmgoods_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>