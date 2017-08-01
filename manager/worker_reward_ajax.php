<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strworker_group_id = api_value_get('worker_group_id');
$intworker_group_id = api_value_int0($strworker_group_id);

$intreturn = 0;
if($intreturn == 0) {
	$arr = array();
	$strsql = "SELECT group_reward_id, group_reward_create, group_reward_fill, group_reward_pfill, group_reward_guide, 	group_reward_pguide FROM  " . $GLOBALS['gdb']->fun_table2('group_reward') . " WHERE worker_group_id = ". $intworker_group_id ." LIMIT 1 ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	
	echo json_encode($arr);
}













?>