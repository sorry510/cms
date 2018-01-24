<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';
$gprint = laimi_config_shop_trade();

$gtemplate->fun_show('system_print');
?>