<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$gtemplate->fun_assign('wgoods_catalog', get_wgoods_catalog());
$gtemplate->fun_show('class');

function get_wgoods_catalog(){
	$arr = array();
	$strsql = " SELECT wgoods_catalog_id,wgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('wgoods_catalog');

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	return $arr;
}

?>