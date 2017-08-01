<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'store';

$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strsgoods_catalog_id = api_value_get('sgoods_catalog_id');
$intsgoods_catalog_id = api_value_int0($strsgoods_catalog_id);
$strsearch = api_value_get('strsearch');


$gtemplate->fun_assign('shop_id', $intshop_id);
$gtemplate->fun_assign('sgoods_catalog_id', $intsgoods_catalog_id);
$gtemplate->fun_assign('strsearch', $strsearch);
$gtemplate->fun_assign('shop_list', get_shop_list());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_assign('store_info_sgoods_list', get_store_info_sgoods_list());
$gtemplate->fun_show('store_info_sgoods');

function get_sgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." order by sgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_shop_list() {
	$arr = array();
	$strsql = "SELECT shop_id, shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')." WHERE company_id = ".$GLOBALS['_SESSION']['login_cid']." ORDER BY shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_store_info_sgoods_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwherea = '';
	$strwhereb = '';
	$strwherec = '';
	$strwhered = '';

	if($GLOBALS['intshop_id'] != 0){
		$strwhereb .= " AND shop_id=".$GLOBALS['intshop_id'];
	}
	if($GLOBALS['intsgoods_catalog_id'] != 0){
		$strwhered .= " AND sgoods_catalog_id=".$GLOBALS['intsgoods_catalog_id'];
	}
	if($GLOBALS['strsearch'] != '') {
	  $strwherec = $strwherec . " AND (sgoods_name LIKE '%" . $GLOBALS['strsearch'] . "%'";
	  $strwherec = $strwherec . " OR sgoods_jianpin LIKE '%" . $GLOBALS['strsearch'] . "%'";
	  $strwherec = $strwherec . " OR sgoods_code LIKE '%" . $GLOBALS['strsearch'] . "%')";
	}

	$arr = array();
	$strsql = "SELECT count(c.sgoods_id) as mycount FROM 
(SELECT store_info_id, sgoods_id, shop_id, store_info_count FROM " . $GLOBALS['gdb']->fun_table2('store_info') . " where 1=1 ".$strwherea." ORDER BY store_info_id DESC ) AS a, 

(SELECT shop_name ,shop_id FROM " . $GLOBALS['gdb']->fun_table('shop') . " where 1=1 ".$strwhereb.") AS b,

(SELECT sgoods_id, sgoods_name, sgoods_catalog_id, sgoods_code, sgoods_price, sgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('sgoods') . " where 1=1 ".$strwherec.") AS c,

(SELECT sgoods_catalog_id, sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog') . " where 1=1 ".$strwhered.") AS d 
WHERE a.shop_id = b.shop_id AND a.sgoods_id = c.sgoods_id AND c.sgoods_catalog_id = d.sgoods_catalog_id ";
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
	
	$strsql = "SELECT  a.store_info_id, a. sgoods_id, a.shop_id, a.store_info_count, b.shop_name, c.sgoods_name, c.sgoods_catalog_id, c.sgoods_code, c.sgoods_price, c.sgoods_cprice, d.sgoods_catalog_name FROM 
(SELECT store_info_id, sgoods_id, shop_id, store_info_count FROM " . $GLOBALS['gdb']->fun_table2('store_info') . " where 1=1 ".$strwherea." ORDER BY store_info_id DESC ) AS a, 

(SELECT shop_name ,shop_id FROM " . $GLOBALS['gdb']->fun_table('shop') . " where 1=1 ".$strwhereb.") AS b,

(SELECT sgoods_id, sgoods_name, sgoods_catalog_id, sgoods_code, sgoods_price, sgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('sgoods') . " where 1=1 ".$strwherec.") AS c,

(SELECT sgoods_catalog_id, sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog') . " where 1=1 ".$strwhered.") AS d 
WHERE a.shop_id = b.shop_id AND a.sgoods_id = c.sgoods_id AND c.sgoods_catalog_id = d.sgoods_catalog_id 
LIMIT ". $intoffset . ", " . $intpagesize ;

	//echo $strsql;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	//var_dump($arrlist);exit;

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	//var_dump($arrlist);exit;
	return $arrpackage;
}



?>