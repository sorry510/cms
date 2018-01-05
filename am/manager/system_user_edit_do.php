<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strpassword = api_value_post('password');
$sqlpassword = $gdb->fun_escape($strpassword);

$intreturn = 0;

$inttime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('user') . " SET user_password = '" . $sqlpassword . "', user_ctime = " . $inttime . " WHERE user_id = " . $intid . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>