<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['worker_module'] != 1) {
	return 1;
}

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);

$intreturn = 0;
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('worker_group') . " SET worker_group_name = '" . $sqlname . "', worker_group_ctime = " . time()
	. " WHERE worker_group_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>