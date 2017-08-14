<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'goods';

$strmgoods_catalog_id = api_value_get('mgoods_catalog_id');
$intmgoods_catalog_id = api_value_int0($strmgoods_catalog_id);
$strsearch = api_value_get('search');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_show('mgoods');


function get_request() {
	$arr = array();
	$arr['mgoods_catalog_id'] = $GLOBALS['intmgoods_catalog_id'];
	$arr['search'] = $GLOBALS['strsearch'];
	return $arr;
}
function get_mgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if($GLOBALS['strsearch'] != '') {
	  $strwhere = $strwhere . " AND (mgoods_name LIKE '%" . $GLOBALS['strsearch'] . "%'";
	  $strwhere = $strwhere . " or mgoods_jianpin LIKE '%" . $GLOBALS['strsearch'] . "%'";
	  $strwhere = $strwhere . " or mgoods_code LIKE '%" . $GLOBALS['strsearch'] . "%')";
	}
	if($GLOBALS['intmgoods_catalog_id'] != 0){
		$strwhere .= " and mgoods_catalog_id=".$GLOBALS['intmgoods_catalog_id'];
	}
	// $strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];

	$arr = array();
	$strsql = "SELECT count(mgoods_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('mgoods')  . " WHERE 1 = 1 " . $strwhere;
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
	
	$intpagesize = 5;
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
	
	$strsql = "SELECT a.*, b.mgoods_catalog_id, b.mgoods_catalog_name FROM ( SELECT mgoods_id, mgoods_catalog_id, mgoods_type, mgoods_code, mgoods_name, mgoods_jianpin, mgoods_price, mgoods_cprice, mgoods_act, mgoods_reserve, mgoods_state FROM " . $GLOBALS['gdb']->fun_table2('mgoods') . " where 1=1 ".$strwhere." ORDER BY mgoods_id DESC LIMIT ". $intoffset . ", " . $intpagesize . ") AS a left join " . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . " AS b on a.mgoods_catalog_id = b.mgoods_catalog_id"; 
	//echo $strsql;exit;
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