<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$GLOBALS['_SESSION']['login_cid'] = 1;

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$gtemplate->fun_assign('waddress', get_waddress());
$gtemplate->fun_show('center_shop_address');

function get_waddress(){
	$arr = array();
	$strsql = "SELECT waddress_id , waddress_name, waddress_phone,waddress_detail FROM " . $GLOBALS['gdb']->fun_table2('waddress') . " WHERE card_id = ". $GLOBALS['_SESSION']['login_id'];

	//echo $strsql;exit();
	$hresult = $GLOBALS['gdb']->fun_query($strsql);

	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

?>