<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'workbench';
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('sgoods_list', get_sgoods_list());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_assign('mcombo_list', get_mcombo_list());
$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_assign('card_type_list', get_card_type_list());
$gtemplate->fun_show('workbench');

function get_mgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_sgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." where shop_id=".$GLOBALS['_SESSION']['login_sid']." order by sgoods_catalog_id desc";
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
	foreach($arr as &$v){
		$strsql = "SELECT a.*,b.store_info_count FROM (SELECT mgoods_id, mgoods_name, mgoods_price,mgoods_cprice,mgoods_act,mgoods_code,mgoods_jianpin,mgoods_type FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_state=1 and mgoods_catalog_id = ".$v['mgoods_catalog_id'].") AS a LEFT JOIN (SELECT mgoods_id,store_info_count FROM ".$GLOBALS['gdb']->fun_table2('store_info')." WHERE shop_id=".$GLOBALS['intshop'].") as b on a.mgoods_id=b.mgoods_id order by a.mgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$v['mgoods'] = $arrmgoods;
	}
	unset($v);
	return $arr;
}
function get_sgoods_list(){
	$arr = array();
	$arrsgoods = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." where shop_id=".$GLOBALS['_SESSION']['login_sid']." order by sgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$v){
		$strsql = "SELECT a.*,b.store_info_count FROM (SELECT sgoods_id, sgoods_name, sgoods_price,sgoods_cprice,sgoods_code,sgoods_jianpin,sgoods_type FROM " . $GLOBALS['gdb']->fun_table2('sgoods')." WHERE sgoods_state=1 and sgoods_catalog_id = ".$v['sgoods_catalog_id']." and shop_id=".$GLOBALS['intshop'].") AS a LEFT JOIN (SELECT sgoods_id,store_info_count FROM ".$GLOBALS['gdb']->fun_table2('store_info')." WHERE shop_id=".$GLOBALS['intshop'].") as b on a.sgoods_id=b.sgoods_id order by a.sgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrsgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$v['sgoods'] = $arrsgoods;
	}
	unset($v);
	return $arr;
}
function get_mcombo_list(){
	$arr = array();
	$arrgoods = array();
	$strsql = "SELECT mcombo_id,mcombo_name,mcombo_type,mcombo_price,mcombo_cprice,mcombo_act,mcombo_limit_type,mcombo_limit_days,mcombo_limit_months FROM ".$GLOBALS['gdb']->fun_table2('mcombo'). " where mcombo_state =1 order by mcombo_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		if($row['mcombo_limit_type'] == 1){
			$row['days'] = '无限期';
		}else if($row['mcombo_limit_type'] == 2){
			$row['days'] = $row['mcombo_limit_days'].'天';
		}
		$strsql = "SELECT a.*,b.mgoods_name FROM (SELECT mgoods_id,mcombo_goods_count FROM ".$GLOBALS['gdb']->fun_table2('mcombo_goods'). " where mcombo_id =".$row['mcombo_id'].") as a left join ".$GLOBALS['gdb']->fun_table2('mgoods')." as b on a.mgoods_id = b.mgoods_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$row['goods'] = $arrgoods;
	}
	return $arr;
}
function get_worker_list(){
	$arr = array();
	$strsql = "SELECT worker_id,worker_name FROM " . $GLOBALS['gdb']->fun_table2('worker')." where shop_id = ".$GLOBALS['_SESSION']['login_sid']." order by worker_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_card_type_list(){
	$arr = array();
	$strsql = "SELECT card_type_id,card_type_name,card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card_type')." WHERE card_type_id > 10 order by card_type_discount asc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}