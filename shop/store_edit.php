<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'store';

$strid = api_value_get('id');
$intid = api_value_int0($strid);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('sgoods_list', get_sgoods_list());
$gtemplate->fun_assign('store', get_store());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_show('store_edit');


function get_mgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_sgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." order by sgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_store(){
	$arr = array();
	$strsql = "SELECT store_type,store_money,store_operator,store_memo,store_time FROM " . $GLOBALS['gdb']->fun_table2('store')." WHERE store_id = ".$GLOBALS['intid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	return $arr;
}
function get_mgoods_list(){
	$arr = array();
	$strsql = "SELECT a.*,b.mgoods_catalog_name,c.store_goods_count FROM (SELECT mgoods_id,mgoods_name, mgoods_price,mgoods_code,mgoods_jianpin,mgoods_catalog_id FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_type=2) AS a LEFT JOIN ".$GLOBALS['gdb']->fun_table2('mgoods_catalog')." AS b on a.mgoods_catalog_id = b.mgoods_catalog_id LEFT JOIN (SELECT store_goods_count,mgoods_id FROM ".$GLOBALS['gdb']->fun_table2('store_goods')." WHERE store_id=".$GLOBALS['intid'].") AS c on a.mgoods_id = c.mgoods_id ORDER BY a.mgoods_catalog_id desc ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_sgoods_list(){
	$arr = array();
	$strsql = "SELECT a.*,b.sgoods_catalog_name,c.store_goods_count FROM (SELECT sgoods_id,sgoods_name, sgoods_price,sgoods_code,sgoods_jianpin,sgoods_catalog_id FROM " . $GLOBALS['gdb']->fun_table2('sgoods')." WHERE sgoods_type=2 and shop_id=".$GLOBALS['intshop'].") AS a LEFT JOIN ".$GLOBALS['gdb']->fun_table2('sgoods_catalog')." AS b on a.sgoods_catalog_id = b.sgoods_catalog_id LEFT JOIN (SELECT store_goods_count,sgoods_id FROM ".$GLOBALS['gdb']->fun_table2('store_goods')." WHERE store_id=".$GLOBALS['intid'].") AS c on a.sgoods_id = c.sgoods_id ORDER BY a.sgoods_catalog_id desc ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}