<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';
$stcatalog = api_value_get('catalog');
$intcatalog = api_value_int0($stcatalog);
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_assign('sgoods_list', get_sgoods_list());
$gtemplate->fun_show('sgoods');

function get_request() {
	$arr = array();
	$arr['catalog'] = $GLOBALS['intcatalog'];
	$arr['key'] = $GLOBALS['strkey'];
	return $arr;
}
function get_sgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT sgoods_catalog_id, sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')
	. " WHERE shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " ORDER BY sgoods_catalog_id DESC";
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
	$strwhere .= " AND shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']);
	if($GLOBALS['intcatalog'] != 0) {
		$strwhere .= " AND sgoods_catalog_id = " . $GLOBALS['intcatalog'];
	}
	if($GLOBALS['strkey'] != '') {
	  $strwhere = $strwhere . " AND (sgoods_name LIKE '%" . $GLOBALS['sqlkey'] . "%'";
	  $strwhere = $strwhere . " OR sgoods_jianpin LIKE '%" . $GLOBALS['sqlkey'] . "%'";
	  $strwhere = $strwhere . " OR sgoods_code LIKE '%" . $GLOBALS['sqlkey'] . "%')";
	}

	$arr = array();
	$strsql = "SELECT COUNT(sgoods_id) AS mycount FROM " . $GLOBALS['gdb']->fun_table2('sgoods')  . " WHERE 1 = 1" . $strwhere;
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
	
	$strsql = "SELECT a.*, b.sgoods_catalog_id, b.sgoods_catalog_name FROM "
	. "(SELECT sgoods_id, sgoods_catalog_id, sgoods_type, sgoods_code, sgoods_name, sgoods_jianpin, sgoods_price, sgoods_cprice, sgoods_state FROM "
	. $GLOBALS['gdb']->fun_table2('sgoods') . " WHERE 1 = 1" . $strwhere . " ORDER BY sgoods_id DESC LIMIT " . $intoffset . ", " . $intpagesize
	. ") AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table2('sgoods_catalog') . " AS b ON a.sgoods_catalog_id = b.sgoods_catalog_id ORDER BY a.sgoods_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row) {
		$row['mycprice'] = '';
		if($row['sgoods_cprice'] > 0) {
			$row['mycprice'] = '￥' . ($row['sgoods_cprice'] + 0);
		} else {
			$row['mycprice'] = '--';
		}
		$row['mytype'] = '';
		if($row['sgoods_type'] == 1) {
			$row['mytype'] = '服务';
		} else if($row['sgoods_type'] == 2) {
			$row['mytype'] = '商品';
		}
		$row['mystate'] = '';
		if($row['sgoods_state'] == 1) {
			$row['mystate'] = '正常';
		} else {
			$row['mystate'] = '<span class="laimi-color-hong">停用</span>';
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