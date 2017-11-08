<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if(laimi_config_trade()['worker_module'] != 1){
	echo '<script> window.history.back();</script>';
	return false;
}
$strchannel = 'worker';

$gtemplate->fun_assign('group_reward_list', get_group_reward_list());
$gtemplate->fun_show('worker_group_reward');

function get_group_reward_list(){
	$arr = array();
	$strsql = "SELECT worker_group_id,worker_group_name FROM ". $GLOBALS['gdb']->fun_table2('worker_group')." order by worker_group_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>