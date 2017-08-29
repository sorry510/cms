<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'store';

$strfrom = api_value_get('from');
$strto = api_value_get('to');

$strsearch = api_value_get('search');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('store_list', get_store_list());
$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('sgoods_list', get_sgoods_list());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_show('store');



function get_request() {
	$arr = array();
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}
function get_store_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if($GLOBALS['strfrom'] != '') {
	  $intfrom = strtotime($GLOBALS['strfrom'])==false?0:strtotime($GLOBALS['strfrom']);
	  $strwhere .=" and store_time>=".$intfrom;
	}
	if($GLOBALS['strto'] != '') {
	  $intto = strtotime($GLOBALS['strto'])==false?time():strtotime($GLOBALS['strto']);
	  $strwhere .=" and store_time<=".$intto;
	}
	
	$strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];

	$arr = array();
	$strsql = "SELECT count(store_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('store')  . " WHERE 1 = 1 " . $strwhere;
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$intallcount = $arr['mycount'];
	if($intallcount == 0) {
		$arrpackage['allcount'] = 0;
		$arrpackage['pagecount'] = 0;
		$arrpackage['pagenow'] = 0;
		$arrpackage['pagepre'] = 0;
		$arrpackage['pagenext'] = 0;
		$arrpackage['list'] = array();
		return $arrpackage;
	}
	
	$intpagesize = 50;
	$intpagecount = intval($intallcount / $intpagesize);
	if($intallcount % $intpagesize > 0) {
		$intpagecount = $intpagecount + 1;
	}
	$intpagenow = $GLOBALS['intpage'];

	//echo $GLOBALS['intpage'];exit;
	if($intpagenow < 1) {
		$intpagenow = 1;
	}
	if($intpagenow > $intpagecount) {
		$intpagenow = $intpagecount;
	}
	$intpagepre = $intpagenow - 1;
	if($intpagepre < 1) {
		$intpagepre = 1;
	}
	$intpagenext = $intpagenow + 1;
	if($intpagenext > $intpagecount) {
		$intpagenext = $intpagecount;
	}
	$intoffset = ($intpagenow - 1) * $intpagesize;
	
	$strsql = "SELECT store_id, shop_id, store_type, store_money, store_operator, store_memo, store_time, store_state FROM " . $GLOBALS['gdb']->fun_table2('store') . " where 1=1 ".$strwhere." ORDER BY store_id DESC LIMIT ". $intoffset . ", " . $intpagesize;
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	//var_dump($arrlist);exit;

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	return $arrpackage;
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
	foreach($arr as &$v){
		$strsql = "SELECT mgoods_id, mgoods_name, mgoods_price,mgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_catalog_id = ".$v['mgoods_catalog_id']." and mgoods_type=2 and mgoods_state=1 ORDER BY mgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$v['mgoods'] = $arrmgoods;
	}
	return $arr;
}
function get_sgoods_list(){
	$arr = array();
	$arrsgoods = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." order by sgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$v){
		$strsql = "SELECT sgoods_id, sgoods_name, sgoods_price,sgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('sgoods')." WHERE sgoods_catalog_id = ".$v['sgoods_catalog_id']." and shop_id=".$GLOBALS['_SESSION']['login_sid']." and sgoods_type=2 ORDER BY sgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrsgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$v['sgoods'] = $arrsgoods;
	}
	return $arr;
}
/*function get_shop_list(){
	$arr = array();
	$strsql = "SELECT shop_id,shop_name FROM  ".$GLOBALS['gdb']->fun_table('shop')." where company_id=".$GLOBALS['_SESSION']['login_cid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}*/