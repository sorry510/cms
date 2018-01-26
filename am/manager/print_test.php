<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);
$strtype = api_value_get('type');

if(laimi_config_shop_trade()['sprint_flag'] != 1){
	echo "<script>alert('打印模块没有开启');history.back();</script>";
	return false;
}

$gtemplate->fun_assign('print_info', laimi_config_shop_trade());
$gtemplate->fun_show('record_print');

