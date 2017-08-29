<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strworker_group_id = api_value_post('worker_group_id');
$intworker_group_id = api_value_int0($strworker_group_id);
$strworker_group_name = api_value_post('worker_group_name');
$sqlworker_group_name = $gdb->fun_escape($strworker_group_name);

$intreturn = 0;
$ctime = time();

$strsql = "SELECT worker_group_id FROM ".$gdb->fun_table2('worker_group')." WHERE worker_group_name = '" . $sqlworker_group_name ."' and shop_id=0 limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 1;
}


if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('worker_group') . " SET worker_group_name = '".$sqlworker_group_name."', worker_group_ctime = ".$ctime." WHERE worker_group_id = " . $intworker_group_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;