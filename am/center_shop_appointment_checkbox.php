<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strcard_name = api_value_get('card_name');
$sqlcard_name = $gdb->fun_escape($strcard_name);
$strcard_phone = api_value_get('card_phone');
$sqlcard_phone = $gdb->fun_escape($strcard_phone);
$strdtime = api_value_get('dtime');
$sqldtime = $gdb->fun_escape($strdtime);
$strcount = api_value_get('count');
$intcount = api_value_int0($strcount);
$strmemo = api_value_get('memo');
$sqlmemo = $gdb->fun_escape($strmemo);
$strgoods_id = api_value_get('goods_id');
$sqlgoods_id = $gdb->fun_escape($strgoods_id);

$arrgoods_id = json_encode(explode(',' , $sqlgoods_id)) ;

$gtemplate->fun_assign('mgoods', get_mgoods());
$gtemplate->fun_assign('mgoods_catalog', get_mgoods_catalog());
$gtemplate->fun_assign('assign', assign());
$gtemplate->fun_show('center_shop_appointment_checkbox');

function assign(){
	$arr = array();
	$arr['shop_id'] = $GLOBALS['intshop_id'];
	$arr['card_name'] = $GLOBALS['sqlcard_name'];
	$arr['card_phone'] = $GLOBALS['sqlcard_phone'];
	$arr['dtime'] = $GLOBALS['sqldtime'];
	$arr['count'] = $GLOBALS['intcount'];
	$arr['memo'] = $GLOBALS['sqlmemo'];
	$arr['goods_id'] = $GLOBALS['arrgoods_id'];
	return $arr;
}

function get_mgoods(){
	$arr = array();
	$strsql = ' SELECT mgoods_id, mgoods_name,mgoods_price, mgoods_catalog_id,mgoods_code FROM ' . $GLOBALS['gdb']->fun_table2('mgoods') . 'WHERE mgoods_state = 1 AND mgoods_reserve = 1 order by mgoods_id ';
	//echo $strsql;exit();
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods_catalog(){
	$arr = array();
	$strsql = ' SELECT mgoods_catalog_id, mgoods_catalog_name FROM ' . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . ' order by mgoods_catalog_id ';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

?>