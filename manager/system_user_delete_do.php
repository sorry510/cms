<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$struser_id = api_value_post('user_id');
$intuser_id = api_value_int0($struser_id);

$intreturn = 0;

if($intuser_id == $GLOBALS['_SESSION']['login_id']){
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('user') . " WHERE user_id = " . $intuser_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}
echo $intreturn;
?>