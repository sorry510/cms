<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'store';

$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$strfrom = api_value_get('from');
$intfrom = strtotime($strfrom) ? strtotime($strfrom) : 0;
$strto = api_value_get('to');
$intto = strtotime($strto) ? strtotime($strto) : 0;
$strsearch = api_value_get('search');
$sqlsearch = $gdb->fun_escape($strsearch);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('sgoods_list', get_sgoods_list());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_show('store_add');

function get_request() {
	$arr = array();
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

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
function get_mgoods_list(){
	$arr = array();
	$arrmgoods = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$strsql = "SELECT mgoods_id,mgoods_name, mgoods_price,mgoods_code,mgoods_jianpin FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_catalog_id = ".$row['mgoods_catalog_id']." and mgoods_type=2 and mgoods_state=1 ORDER BY mgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$row['mgoods'] = $arrmgoods;
	}
	unset($row);
	return $arr;
}
function get_sgoods_list(){
	$arr = array();
	$arrsgoods = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." order by sgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$strsql = "SELECT sgoods_id,sgoods_name, sgoods_price,sgoods_code,sgoods_jianpin FROM " . $GLOBALS['gdb']->fun_table2('sgoods')." WHERE sgoods_catalog_id = ".$row['sgoods_catalog_id']." and shop_id=".$GLOBALS['_SESSION']['login_sid']." and sgoods_type=2 ORDER BY sgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrsgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$row['sgoods'] = $arrsgoods;
	}
	unset($row);
	return $arr;
}
/*function get_shop_list(){
	$arr = array();
	$strsql = "SELECT shop_id,shop_name FROM  ".$GLOBALS['gdb']->fun_table('shop')." where company_id=".$GLOBALS['_SESSION']['login_cid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}*/