<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'store';

$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('store_info_list', get_store_info_list());
$gtemplate->fun_show('store_info_mgoods');

function get_request(){
	$arr = array();
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
	$strwhere .= " AND a.mgoods_id <> 0 AND a.shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']);
	if($GLOBALS['strkey'] != '') {
	  $strwhere = $strwhere . " AND a.mgoods_id IN (SELECT mgoods_id FROM " . $GLOBALS['gdb']->fun_table2('mgoods');
	  $strwhere = $strwhere . " WHERE mgoods_name LIKE '%" . $GLOBALS['sqlkey'] . "%'";
	  $strwhere = $strwhere . " OR mgoods_jianpin LIKE '%" . $GLOBALS['sqlkey'] . "%'";
	  $strwhere = $strwhere . " OR mgoods_code LIKE '%" . $GLOBALS['sqlkey'] . "%')";
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
	
	$strsql = "SELECT a.store_info_id, a.store_info_count, b.mgoods_code, b.mgoods_name, b.mgoods_price, b.mgoods_cprice, c.mgoods_catalog_name FROM "
	. $GLOBALS['gdb']->fun_table2('store_info') . " AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table2('mgoods') . " AS b ON a.mgoods_id = b.mgoods_id LEFT JOIN "
	. $GLOBALS['gdb']->fun_table2('mgoods_catalog') . " AS c ON b.mgoods_catalog_id = c.mgoods_catalog_id WHERE 1 = 1" . $strwhere
	. " ORDER BY c.mgoods_catalog_id DESC, b.mgoods_id DESC LIMIT " . $intoffset . ", " . $intpagesize;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row) {
		$row['mycprice'] = '';
		if($row['mgoods_cprice'] > 0) {
			$row['mycprice'] = '￥' . ($row['mgoods_cprice'] + 0);
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