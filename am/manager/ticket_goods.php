<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['act_module'] != 1) {
	return;
}

$strchannel = 'act';

$strname = api_value_get('name');
$sqlname = $gdb->fun_escape($strname);
$strfrom = api_value_get('from');
$strto = api_value_get('to');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('mgoods_catalog', get_mgoods_catalog());
$gtemplate->fun_assign('mgoods', get_mgoods());
$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('ticket_goods_list', get_ticket_goods_list());
$gtemplate->fun_show('ticket_goods');

function get_request() {
	$arr = array();
	$arr['name'] = $GLOBALS['strname'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

function get_mgoods_catalog() {
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id, mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . " ORDER BY mgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods() {
	$arr = array();
	$strsql = "SELECT mgoods_id, mgoods_name, mgoods_catalog_id FROM " . $GLOBALS['gdb']->fun_table2('mgoods') . " ORDER BY mgoods_catalog_id DESC, mgoods_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_ticket_goods_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	
	$intfrom = 0;
	$intto = 0;
	if($GLOBALS['strfrom'] != '') {
		$int = strtotime($GLOBALS['strfrom']);
		if($int > 0) {
			$intfrom = $int;
		}
	}
	if($GLOBALS['strto'] != '') {
		$int = strtotime($GLOBALS['strto'] . ' 23:59:59');
		if($int > 0) {
			$intto = $int;
		}
	}

	$strwhere = '';
	if ($GLOBALS['strname'] != '') {
		$strwhere = $strwhere . " AND ticket_goods_name LIKE '%" . $GLOBALS['sqlname'] . "%'";
	}
	if($intfrom > 0) {
		$strwhere = $strwhere . " AND ticket_goods_atime >= " . $intfrom;
	}
	if($intto > 0) {
		$strwhere = $strwhere . " AND ticket_goods_atime <= " . $intto;
	}

	$arr = array();
	$strsql = 'SELECT COUNT(ticket_goods_id) AS mycount FROM ' . $GLOBALS['gdb']->fun_table2('ticket_goods') . ' WHERE 1 = 1' . $strwhere;
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

	$strsql = "SELECT a.*, b.mgoods_name FROM (SELECT ticket_goods_id, mgoods_id, ticket_goods_name, ticket_goods_value, ticket_goods_days, ticket_goods_begin, ticket_goods_memo, "
	. "ticket_goods_atime FROM " . $GLOBALS['gdb']->fun_table2('ticket_goods') . " WHERE 1 = 1" . $strwhere
	. " ORDER BY ticket_goods_id DESC LIMIT " . $intoffset . ", " . $intpagesize . ") AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table2('mgoods')
	. " AS b ON a.mgoods_id = b.mgoods_id ORDER BY a.ticket_goods_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row) {
		$row['ticket_goods_value'] = $row['ticket_goods_value'] + 0;
		$row['mybegin'] = '';
		if($row['ticket_goods_begin'] == 1) {
			$row['mybegin'] = '当天开始';
		} else if($row['ticket_goods_begin'] == 2) {
			$row['mybegin'] = '第二天开始';
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