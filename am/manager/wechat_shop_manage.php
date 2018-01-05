<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wshop_module'] != 1) {
	return;
}

$strchannel = 'wshop';

$strwgoods_catalog_id = api_value_get('wgoods_catalog_id');
$intwgoods_catalog_id = api_value_int0($strwgoods_catalog_id);
$strsearch = api_value_get('search');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('wgoods_catalog_list', get_wgoods_catalog_list());
$gtemplate->fun_assign('wgoods_list', get_wgoods_list());
$gtemplate->fun_show('wechat_shop_manage');

function get_request() {
	$arr = array();
	$arr['wgoods_catalog_id'] = $GLOBALS['intwgoods_catalog_id'];
	$arr['search'] = $GLOBALS['strsearch'];
	return $arr;
}
function get_wgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT wgoods_catalog_id,wgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('wgoods_catalog')." order by wgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_wgoods_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if($GLOBALS['strsearch'] != '') {
	  $strwhere = $strwhere . " AND (wgoods_name LIKE '%" . $GLOBALS['strsearch'] . "%'";
	  $strwhere = $strwhere . " or wgoods_code LIKE '%" . $GLOBALS['strsearch'] . "%')";
	}
	if($GLOBALS['intwgoods_catalog_id'] != 0){
		$strwhere .= " and wgoods_catalog_id=".$GLOBALS['intwgoods_catalog_id'];
	}
	// $strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];

	$arr = array();
	$strsql = "SELECT count(wgoods_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('wgoods')  . " WHERE 1 = 1 " . $strwhere;
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
	
	$strsql = "SELECT a.*, b.wgoods_catalog_id, b.wgoods_catalog_name FROM ( SELECT wgoods_id, wgoods_catalog_id, wgoods_type, wgoods_code, wgoods_name, wgoods_price, wgoods_cprice, wgoods_act, wgoods_state , wgoods_reward,wgoods_store FROM " . $GLOBALS['gdb']->fun_table2('wgoods') . " where 1=1 ".$strwhere." ORDER BY wgoods_id DESC LIMIT ". $intoffset . ", " . $intpagesize . ") AS a left join " . $GLOBALS['gdb']->fun_table2('wgoods_catalog') . " AS b on a.wgoods_catalog_id = b.wgoods_catalog_id"; 

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
?>