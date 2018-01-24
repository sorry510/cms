<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strtype = api_value_get('type');
$inttype = api_value_int0($strtype);
$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strcard_name = api_value_get('card_name');
$sqlcard_name = $gdb->fun_escape($strcard_name);

$gtemplate->fun_assign('assign', assign());
$gtemplate->fun_show('center_shop_address_add');

function assign(){
	$arr = array();
	$arr['type'] = $GLOBALS['inttype'];
	return $arr;
}

?>