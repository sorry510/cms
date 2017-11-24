<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';

$gtemplate->fun_assign('shop_config', get_shop_config());
$gtemplate->fun_show('system_trade');

function get_shop_config(){
	$arr = array();
	$strsql = "SELECT shop_config FROM " . $GLOBALS['gdb']->fun_table('shop')." where shop_id=".$GLOBALS['_SESSION']['login_sid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if($arr['shop_config'] != ''){
		$arrjson = json_decode($arr['shop_config'],true);
	}else{
		$arrjson = array(
			'print_flag' => 0,
			'print_title' => '',
			'print_width' => 0,
			'print_memo' => '',
			'print_device' => '',
		);
	}

	return $arrjson;
}
?>