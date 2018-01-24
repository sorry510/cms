<?php
if(!defined('C_CNFLY')) {
	exit();
}

if($GLOBALS['_SESSION']['login_type'] != 3) {
	echo '<script>alert("登录超时，请重新登录！"); window.location="../../login.php";</script>';
	exit();
}
?>