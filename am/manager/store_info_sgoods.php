<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';

$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('store_info_list', get_store_info_list());
$gtemplate->fun_show('store_info_sgoods');

function get_request(){
	$arr = array();
	$arr['shop'] = $GLOBALS['intshop'];
	$arr['key'] = $GLOBALS['strkey'];
	return $arr;
}

function get_store_info_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	
	$strwhere = '';
	$strwhere .= " AND a.sgoods_id <> 0 AND a.shop_id IN (SELECT shop_id FROM " . $GLOBALS['gdb']->fun_table('shop') . " WHERE company_id = "
	. api_value_int0($GLOBALS['_SESSION']['login_cid']) . " AND shop_etime > " . time() . ")";
	if($GLOBALS['intshop'] != 0) {
		$strwhere .= " AND a.shop_id = " . $GLOBALS['intshop'];
	}
	if($GLOBALS['strkey'] != '') {
	  $strwhere = $strwhere . " AND a.sgoods_id IN (SELECT sgoods_id FROM " . $GLOBALS['gdb']->fun_table2('sgoods');
	  $strwhere = $strwhere . " WHERE sgoods_name LIKE '%" . $GLOBALS['sqlkey'] . "%'";
	  $strwhere = $strwhere . " OR sgoods_jianpin LIKE '%" . $GLOBALS['sqlkey'] . "%'";
	  $strwhere = $strwhere . " OR sgoods_code LIKE '%" . $GLOBALS['sqlkey'] . "%')";
	}

	$arr = array();
	$strsql = "SELECT COUNT(store_info_id) AS mycount FROM " . $GLOBALS['gdb']->fun_table2('store_info') . " AS a WHERE 1 = 1" . $strwhere;
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
	
	$strsql = "SELECT a.store_info_id, a.store_info_count, b.sgoods_code, b.sgoods_name, b.sgoods_price, b.sgoods_cprice, c.sgoods_catalog_name, d.shop_name FROM "
	. $GLOBALS['gdb']->fun_table2('store_info') . " AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table2('sgoods') . " AS b ON a.sgoods_id = b.sgoods_id LEFT JOIN "
	. $GLOBALS['gdb']->fun_table2('sgoods_catalog') . " AS c ON b.sgoods_catalog_id = c.sgoods_catalog_id LEFT JOIN "
	. $GLOBALS['gdb']->fun_table('shop') . " AS d ON a.shop_id = d.shop_id WHERE 1 = 1" . $strwhere
	. " ORDER BY c.sgoods_catalog_id DESC, b.sgoods_id DESC LIMIT " . $intoffset . ", " . $intpagesize;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row) {
		$row['mycprice'] = '';
		if($row['sgoods_cprice'] > 0) {
			$row['mycprice'] = $row['sgoods_cprice'] + 0;
		} else {
			$row['mycprice'] = '--';
		}
	}

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	return $arrpackage;
}
?>