<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strtxtid = api_value_post('txtid');
$inttxtid = api_value_int0($strtxtid);
$strtxtname = api_value_post('txtname');
$sqltxtname = $gdb->fun_escape($strtxtname);

$intreturn = 0;
$intctime = time();

$strsql = "SELECT worker_group_id FROM " . $gdb->fun_table2('worker_group') . " WHERE worker_group_id = ". $inttxtid ." limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('worker_group') . " SET worker_group_name = '".$sqltxtname."', worker_group_ctime = " . $intctime . " WHERE worker_group_id = " . $inttxtid;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;