<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'reserve';

$strid = api_value_get('id');
$GLOBALS['intid'] = api_value_int0($strid);

$gtemplate->fun_assign('edit', get_edit());
$gtemplate->fun_assign('mgoods', get_mgoods());
$gtemplate->fun_assign('mgoods_catalog', get_mgoods_catalog());
$gtemplate->fun_show('reserve_edit');

function get_mgoods(){
	$arr = array();
	$strsql = ' SELECT mgoods_id, mgoods_name,mgoods_price, mgoods_catalog_id,mgoods_code FROM ' . $GLOBALS['gdb']->fun_table2('mgoods') . 'WHERE mgoods_state = 1 AND mgoods_reserve = 1 order by mgoods_id ';
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

function get_edit() {
	$arr = array();

	$strsql = "SELECT a.reserve_id,a.card_id, a.reserve_name, a.reserve_phone, a.reserve_count , a.reserve_dtime,a.reserve_memo, b.card_code FROM  ( SELECT  reserve_id,card_id, reserve_name, reserve_phone, reserve_count , reserve_dtime,reserve_memo FROM " . $GLOBALS['gdb']->fun_table2('reserve') . " WHERE reserve_id = ". $GLOBALS['intid'] .") as a LEFT JOIN ".$GLOBALS['gdb']->fun_table2('card')." as b on a.card_id = b.card_id LIMIT 1";

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$strsql = "SELECT mgoods_id,c_mgoods_name FROM  " . $GLOBALS['gdb']->fun_table2('reserve_mgoods') . " WHERE reserve_id = ". $GLOBALS['intid'] ;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr2 = $GLOBALS['gdb']->fun_fetch_all($hresult);

	$arr['reserve_goods'] = json_encode($arr2);
	$arr['dtime'] = date('Y-m-d H:i',$arr['reserve_dtime']);

	return $arr;
}
?>