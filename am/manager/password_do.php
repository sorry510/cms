<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$stropassword = api_value_post('txtopassword');
$sqlopassword = $gdb->fun_escape($stropassword);
$strnpassword = api_value_post('txtnpassword');
$sqlnpassword = $gdb->fun_escape($strnpassword);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT user_id FROM " . $gdb->fun_table2('user')
	. " WHERE user_id = " . api_value_int0($GLOBALS['_SESSION']['login_id']) . " AND user_password = '" . $sqlopassword . "' LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('user') . " SET user_password = '" . $sqlnpassword . "' WHERE user_id = " . api_value_int0($GLOBALS['_SESSION']['login_id']) . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>