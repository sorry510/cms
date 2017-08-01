<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strworker_group_id = api_value_post('worker_group_id');
$intworker_group_id = api_value_int0($strworker_group_id);
$strworker_group_name = api_value_post('worker_group_name');


$intreturn = 0;
$ctime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('worker_group') . " SET worker_group_name = '".$strworker_group_name."', worker_group_ctime = ".$ctime." WHERE worker_group_id = " . $intworker_group_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	echo 'y';
}else{
	echo 'n';
}


?>