<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'card';

$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_show('sapa1');

function get_worker_list(){
	$arr = array();
	$strsql = "SELECT worker_id,worker_name FROM ".$GLOBALS['gdb']->fun_table2('worker'). " where shop_id =".$GLOBALS['_SESSION']['login_sid']." order by worker_name asc";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>