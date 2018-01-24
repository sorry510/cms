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
$arrmgoods = api_value_get('mgoods');
//var_dump($arrmgoods);exit();

$strgoods = '';
$arrgoods_name = array();
$arrgoods_id = array();
$strgoods_id ='';
$strgoods_name = '';
$jsonarrmgoods = json_encode($arrmgoods);

if (!empty($arrmgoods)) {
	$jsonarrmgoods = json_encode($arrmgoods);
	foreach ($arrmgoods as $row) {
		$arrgoods_id[] = explode(',',$row)[0]; 
		$arrgoods_name[] = explode(',',$row)[1];
	}

	$strgoods_id = implode(',', $arrgoods_id);
	$strgoods_name = implode('、', $arrgoods_name);
}

$gtemplate->fun_assign('shop', get_shop());
$gtemplate->fun_assign('assign', assign());
$gtemplate->fun_show('center_shop_appointment');

function assign(){
	$arr = array();
	$arr['card_name'] = $GLOBALS['sqlcard_name'];
	$arr['card_phone'] = $GLOBALS['sqlcard_phone'];
	$arr['dtime'] = $GLOBALS['sqldtime'];
	$arr['count'] = $GLOBALS['intcount'];
	$arr['memo'] = $GLOBALS['sqlmemo'];
	$arr['goods_name'] = $GLOBALS['strgoods_name'];
	$arr['goods_id'] = $GLOBALS['strgoods_id'];
	return $arr;
}

function get_shop(){
	$arr = array();
	$strsql = "SELECT shop_id , shop_name , shop_area_address , shop_phone  FROM " . $GLOBALS['gdb']->fun_table('shop') . " WHERE shop_id = ". $GLOBALS['intshop_id'] ." AND shop_etime > " . time() . " AND company_id = ". api_value_int0($GLOBALS['_SESSION']['login_cid']);

	$hresult = $GLOBALS['gdb']->fun_query($strsql);

	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	return $arr;
}

?>