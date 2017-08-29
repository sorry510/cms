<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'worker';

$gtemplate->fun_assign('worker_group_list', get_worker_group_list());
$gtemplate->fun_show('worker_group');

function get_worker_group_list(){
	$arr = array();
	$strsql = "SELECT worker_group_id, worker_group_name FROM " . $GLOBALS['gdb']->fun_table2('worker_group')." where shop_id=0 ORDER BY worker_group_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	
	return $arr;
}
?>