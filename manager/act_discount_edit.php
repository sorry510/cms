<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

if(laimi_config_trade()['act_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strchannel = 'marketing';

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('edit', get_edit());
$gtemplate->fun_assign('goods', get_goods());
$gtemplate->fun_assign('mgoods', get_mgoods());
$gtemplate->fun_assign('mcombo', get_mcombo());
$gtemplate->fun_assign('mgoods_catalog', get_mgoods_catalog());
$gtemplate->fun_show('act_discount_edit');

function get_mgoods(){
	$arr = array();
	$strsql = ' SELECT mgoods_id, mgoods_name,mgoods_price, mgoods_catalog_id FROM ' . $GLOBALS['gdb']->fun_table2('mgoods') . 'WHERE mgoods_act = 1 AND mgoods_state = 1 order by mgoods_id ';
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

function get_mcombo(){
	$arr = array();
	$strsql = 'SELECT mcombo_id,mcombo_price, mcombo_name FROM ' . $GLOBALS['gdb']->fun_table2('mcombo') . ' WHERE mcombo_act = 1 AND mcombo_state = 1 order by mcombo_id';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_edit(){
	$arr = array();
	$strsql = "SELECT act_discount_id, act_discount_name, act_discount_client, act_discount_start, act_discount_end, act_discount_memo FROM" . $GLOBALS['gdb']->fun_table2('act_discount') . " WHERE act_discount_id = ".$GLOBALS['intid'];

		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

		$arr['act_discount_start'] = date('Y-m-d',$arr['act_discount_start'] );
		$arr['act_discount_end'] = date('Y-m-d',$arr['act_discount_end'] );

	return $arr;
}

function get_goods(){
	$arr = array();
	$strsql = "SELECT mgoods_id,mcombo_id,act_discount_goods_value,act_discount_goods_price FROM " . $GLOBALS['gdb']->fun_table2('act_discount_goods') . " WHERE act_discount_id = " . $GLOBALS['intid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	$json = json_encode($arr);
	return $json;
}

?>