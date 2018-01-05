<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$intreturn = 0;
if($intreturn == 0) {
	if($GLOBALS['_SESSION']['login_type'] != 1) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$GLOBALS['_SESSION']['login_sid'] = 0;
	echo '<script>window.location = "../manager/main.php";</script>';
} else {
	echo '<script>window.history.back();</script>';
}
?>