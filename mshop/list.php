<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strname = api_value_post('search');
$sqlname = $gdb->fun_escape($strname);
$strcatalog_id = api_value_get('catalog_id');
$intcatalog_id = $gdb->fun_escape($strcatalog_id);

$gtemplate->fun_show('list');

?>