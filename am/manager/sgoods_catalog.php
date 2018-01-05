<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';

$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_show('sgoods_catalog');

function get_sgoods_catalog_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	
 	$strwhere = "";
 	if($GLOBALS['intshop'] != 0) {
 		$strwhere .= " AND shop_id = " . $GLOBALS['intshop'];
 	}

	$strsql = "SELECT COUNT(sgoods_catalog_id) AS mycount FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')  . " WHERE 1 = 1" . $strwhere;
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

	$strsql = "SELECT a.sgoods_catalog_id, a.sgoods_catalog_name, b.shop_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')
	. " AS a LEFT JOIN (SELECT shop_id, shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')
	. " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid'])
	. ") AS b ON a.shop_id = b.shop_id ORDER BY a.sgoods_catalog_id DESC LIMIT " . $intoffset . ", " . $intpagesize;
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