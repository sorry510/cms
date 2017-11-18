<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strmcombo_id = api_value_post('id');
$intmcombo_id = api_value_int0($strmcombo_id);

$intreturn = 0;
if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('mcombo') . " WHERE mcombo_id = " . $intmcombo_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}

	$strsql = "DELETE FROM " . $gdb->fun_table2('mcombo_goods') . " WHERE mcombo_id = " . $intmcombo_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;
?>