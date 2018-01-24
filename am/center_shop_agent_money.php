<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$gtemplate->fun_assign('wmoney', get_wmoney());
$gtemplate->fun_show('center_shop_agent_money');

function get_wmoney(){
	$arr = array();
	$strsql = "SELECT wmoney_id ,wmoney_atime,wmoney_value FROM " . $GLOBALS['gdb']->fun_table2('wmoney') . " WHERE card_id = ". $GLOBALS['_SESSION']['login_id'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	
	return $arr;
}

?>