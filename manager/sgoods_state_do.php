<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strsgoods_id = api_value_post('sgoods_id');
$intsgoods_id = api_value_int0($strsgoods_id);
$strsgoods_state = api_value_post('sgoods_state');
$intsgoods_state = api_value_int0($strsgoods_state);

$intreturn = 0;
$intsgoods_state_update = 0;

if($intsgoods_state == 1){
	$intsgoods_state_update = 2;
}else if($intsgoods_state == 2){
	$intsgoods_state_update = 1;
}else{
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('sgoods') . " SET sgoods_state = ". $intsgoods_state_update ." WHERE sgoods_id = " . $intsgoods_id . " LIMIT 1" ;
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