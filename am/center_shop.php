<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$gtemplate->fun_assign('laimi_shop_list', laimi_shop_list());
$gtemplate->fun_show('center_shop');

?>