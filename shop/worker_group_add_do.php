<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'worker';

$strworker_group_name = api_value_post('worker_group_name');
$sqlworker_group_name = $gdb->fun_escape($strworker_group_name);

$intreturn = 0;
$atime = time();

$strsql = "SELECT worker_group_id FROM ".$gdb->fun_table2('worker_group')." WHERE worker_group_name = '" . $sqlworker_group_name ."' and shop_id=0 limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('worker_group') . "( worker_group_name ,worker_group_atime) VALUES ('".$strworker_group_name."',".$atime.")";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;