<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());//exit;
$gtemplate->fun_show('sgoods_catalog');


function get_request(){
	$arr = array();
	return $arr;
}

function get_sgoods_catalog_list(){
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arr = array();
	$arrlist = array();
	$arrpackage = array();
 	$strwhere = "";

 	$strwhere .= " AND shop_id = ". $GLOBALS['_SESSION']['login_sid'];
 	
	$strsql = "SELECT count(sgoods_catalog_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')  . " WHERE 1 = 1 " . $strwhere;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
//  echo $strsql;exit;
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


	$strsql = "SELECT sgoods_catalog_id, sgoods_catalog_name, shop_id FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')."  WHERE 1=1 ".$strwhere." ORDER BY sgoods_catalog_id desc LIMIT ". $intoffset . ", " . $intpagesize;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	
	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;

	return $arrpackage;
}
?>













