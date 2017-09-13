<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';

$strsgoods_catalog_id = api_value_get('sgoods_catalog_id');
$intsgoods_catalog_id = api_value_int0($strsgoods_catalog_id);
$strsearch = api_value_get('search');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_assign('sgoods_list', get_sgoods_list());
$gtemplate->fun_show('sgoods');


function get_request() {
	$arr = array();
	$arr['sgoods_catalog_id'] = $GLOBALS['intsgoods_catalog_id'];
	$arr['search'] = $GLOBALS['strsearch'];
	return $arr;
}
function get_sgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." where shop_id=".$GLOBALS['_SESSION']['login_sid']." order by sgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_sgoods_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if($GLOBALS['strsearch'] != '') {
	  $strwhere = $strwhere . " AND (sgoods_name LIKE '%" . $GLOBALS['strsearch'] . "%'";
	  $strwhere = $strwhere . " or sgoods_jianpin LIKE '%" . $GLOBALS['strsearch'] . "%'";
	  $strwhere = $strwhere . " or sgoods_code LIKE '%" . $GLOBALS['strsearch'] . "%')";
	}
	if($GLOBALS['intsgoods_catalog_id'] != 0){
		$strwhere .= " and sgoods_catalog_id=".$GLOBALS['intsgoods_catalog_id'];
	}
	$strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];

	$arr = array();
	$strsql = "SELECT count(sgoods_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('sgoods')  . " WHERE 1 = 1 " . $strwhere;
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
	
	$strsql = "SELECT a.*, b.sgoods_catalog_id, b.sgoods_catalog_name,c.shop_name FROM ( SELECT shop_id, sgoods_id, sgoods_catalog_id, sgoods_type, sgoods_code, sgoods_name, sgoods_jianpin, sgoods_price, sgoods_cprice, sgoods_state FROM " . $GLOBALS['gdb']->fun_table2('sgoods') . " where 1=1 ".$strwhere." ORDER BY sgoods_id DESC LIMIT ". $intoffset . ", " . $intpagesize . ") AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table2('sgoods_catalog') . " AS b on a.sgoods_catalog_id=b.sgoods_catalog_id LEFT JOIN ".$GLOBALS['gdb']->fun_table('shop')." as c on a.shop_id=c.shop_id"; 
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	// var_dump($arrlist);exit;

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	return $arrpackage;
}
?>