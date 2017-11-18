<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';

$strmcombo_id = api_value_get('id');
$intmcombo_id = api_value_int0($strmcombo_id);

$gtemplate->fun_assign('mgoods', get_mgoods());
$gtemplate->fun_assign('mgoods_catalog', get_mgoods_catalog());
$gtemplate->fun_assign('edit', get_edit());
$gtemplate->fun_show('mcombo1_edit');

function get_mgoods(){
	$arr = array();
	$strsql = ' SELECT mgoods_id, mgoods_name,mgoods_price, mgoods_catalog_id FROM ' . $GLOBALS['gdb']->fun_table2('mgoods') . 'WHERE mgoods_state = 1 order by mgoods_id ';
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

function get_edit(){
	$strsql = "SELECT mcombo_id, mcombo_type, mcombo_code, mcombo_name, mcombo_jianpin, mcombo_price, mcombo_cprice, mcombo_limit_type, mcombo_limit_days, mcombo_limit_months, mcombo_act , mcombo_reserve  FROM ". $GLOBALS['gdb']->fun_table2('mcombo')." WHERE mcombo_id = " . $GLOBALS['intmcombo_id'] ." LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	
	$strsql = "SELECT a.*, b.mgoods_name, b.mgoods_price FROM (SELECT mcombo_goods_id, mgoods_id , mcombo_goods_count FROM " . $GLOBALS['gdb']->fun_table2('mcombo_goods')." WHERE mcombo_id = " . $GLOBALS['intmcombo_id'] ." ORDER BY mcombo_goods_id asc) AS a ," . $GLOBALS['gdb']->fun_table2('mgoods')." AS b WHERE a.mgoods_id =b.mgoods_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
	$json = json_encode($arrmgoods);
	$arr['mgoods'] = $json;
	return $arr;
}


?>