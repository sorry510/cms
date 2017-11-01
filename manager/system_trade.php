<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';

$arrtrade = laimi_config_trade();
// echo json_encode($arrtrade);exit;
$gtemplate->fun_assign('system_config_trade', $arrtrade);
$gtemplate->fun_show('system_trade');

?>