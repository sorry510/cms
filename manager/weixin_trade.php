<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'weixin';

$arrweixin = laimi_config_weixin();

$gtemplate->fun_assign('system_config_weixin', $arrweixin);
$gtemplate->fun_show('weixin_trade');
?>