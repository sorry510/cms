<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strmcombo_id = api_value_get('mcombo_id');
$intmcombo_id = api_value_int0($strmcombo_id);
$strmcombo_state = api_value_get('mcombo_state');
$intmcombo_state = api_value_int0($strmcombo_state);

$intreturn = 0;
$intmcombo_state_update = 0;

if($intmcombo_state == 1){
	$intmcombo_state_update = 2;
}else if($intmcombo_state == 2){
	$intmcombo_state_update = 1;
}else{
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('mcombo') . " SET mcombo_state = ". $intmcombo_state_update ." WHERE mcombo_id = " . $intmcombo_id . " LIMIT 1" ;
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