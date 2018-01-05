<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['worker_module'] != 1) {
	return 1;
}

$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);

$intreturn = 0;
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('worker_group') . "(shop_id, worker_group_name, worker_group_atime, worker_group_ctime) VALUES (0, '" . $sqlname . "', "
	. time() . ", 0)";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>