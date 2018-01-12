<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strstate = api_value_post('state');
$intstate = api_value_int0($strstate);

$intreturn = 0;
if($intreturn == 0) {
	if($intstate != 1 && $intstate != 2) {
		$intstate = 1;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('mcombo') . " SET mcombo_state = " . $intstate . " WHERE mcombo_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>