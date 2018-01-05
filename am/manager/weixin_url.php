<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wmp_module'] != 1) {
	return;
}

$strchannel = 'weixin';
$gtemplate->fun_show('weixin_url');
?>