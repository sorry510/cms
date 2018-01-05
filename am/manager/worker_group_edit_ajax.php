<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['worker_module'] != 1) {
	return 1;
}

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$arr = array();
$strsql = "SELECT worker_group_id, worker_group_name FROM " . $GLOBALS['gdb']->fun_table2('worker_group') . " WHERE worker_group_id = " . $intid . " LIMIT 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

echo json_encode($arr);
?>