<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['act_module'] != 1) {
	return 1;
}

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strstate = api_value_post('state');
$intstate = api_value_int0($strstate);

$intreturn = 0;
if($intstate != 1 && $intstate != 2) {
	$intstate = 1;
}

$inttime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('act_decrease') . " SET act_decrease_state = " . $intstate
	. " WHERE act_decrease_id = " . $intid . " AND act_decrease_end > " . $inttime . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>