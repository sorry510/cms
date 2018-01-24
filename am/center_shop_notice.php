<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$gtemplate->fun_assign('notice', get_notice());
$gtemplate->fun_show('center_shop_notice');

function get_notice(){
	$arr = array();
	$strsql = "SELECT wnotice_id,wnotice_title,wnotice_content FROM " . $GLOBALS['gdb']->fun_table2('wnotice') ." ORDER BY wnotice_atime DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	return $arr;
}
?>