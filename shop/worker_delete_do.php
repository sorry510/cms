<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strworker_id = api_value_post('id');
$intworker_id = api_value_int0($strworker_id);

$intreturn = 0;

/*// 查询员工提成下有员工
$strsql = "SELECT worker_id FROM " . $gdb->fun_table2('worker_reward') . " where worker_id=".$intworker_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
if(!empty($arr)){
	$intreturn = 1;
}*/
$strsql = "SELECT worker_id FROM " . $gdb->fun_table2('worker') . " where worker_id=".$intworker_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
if(empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('worker') . " WHERE worker_id = " . $intworker_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}
// if($intreturn == 0) {
// 	$strsql = "DELETE FROM " . $gdb->fun_table2('worker_goods') . " WHERE worker_id = " . $intworker_id;
// 	$hresult = $gdb->fun_do($strsql);
// 	if($hresult == FALSE) {
// 		$intreturn = 2;
// 	}
// }
// 删除员工提成表
echo $intreturn;