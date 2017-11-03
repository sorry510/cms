<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'marketing';

$strticket_name = api_value_get('name');
$sqlticket_name = $gdb->fun_escape($strticket_name);
$strfrom = api_value_get('from');
$strfrom2 = $gdb->fun_escape($strfrom);
$intfrom = strtotime($strfrom2);
$strto = api_value_get('to');
$strto2 = $gdb->fun_escape($strto);
$intto = strtotime($strto2);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('mgoods_catalog', get_mgoods_catalog());
$gtemplate->fun_assign('mgoods', get_mgoods());
$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('ticket_goods_list', get_ticket_goods_list());
$gtemplate->fun_show('ticket_goods');

function get_request(){
	$arr = array();
	$arr['ticket_name'] = $GLOBALS['strticket_name'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

function get_mgoods_catalog(){
	$arr = array();
	$strsql = 'SELECT mgoods_catalog_id,mgoods_catalog_name FROM ' . $GLOBALS['gdb']->fun_table2('mgoods_catalog');
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods(){
	$arr = array();
	$strsql = 'SELECT mgoods_id,mgoods_name,mgoods_catalog_id FROM ' . $GLOBALS['gdb']->fun_table2('mgoods');
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

	$strwhere = '';
	if ($GLOBALS['sqlticket_name'] != '') {
		$strwhere = $strwhere . " AND ticket_goods_name LIKE '%" . $GLOBALS['sqlticket_name'] . "%' ";
	}
	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND ticket_goods_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND ticket_goods_atime < ' . ($GLOBALS['intto']+86400);
	}

	$arr = array();
	$strsql = 'SELECT count(ticket_goods_id) as datcount FROM ' . $GLOBALS['gdb']->fun_table2('ticket_goods') . ' WHERE 1 = 1' . $strwhere;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);

	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$intallcount = $arr['datcount'];
	if($intallcount == 0) {
		$arrpackage['allcount'] = 0;
		$arrpackage['pagecount'] = 0;
		$arrpackage['pagenow'] = 0;
		$arrpackage['pagepre'] = 0;
		$arrpackage['pagenext'] = 0;
		$arrpackage['list'] = array();
		return $arrpackage;
	}
	
	$intpagesize = 25;
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

	$strsql = 'SELECT ticket_goods_id,ticket_goods_begin,ticket_goods_name,ticket_goods_value,ticket_goods_memo,ticket_goods_days,ticket_goods_atime,mgoods_name FROM (SELECT mgoods_id,ticket_goods_id,ticket_goods_begin,ticket_goods_name,ticket_goods_value,ticket_goods_memo,ticket_goods_days,ticket_goods_atime FROM ' . $GLOBALS['gdb']->fun_table2('ticket_goods') . ' WHERE 1=1 ' . $strwhere . ') as a LEFT JOIN (SELECT mgoods_id,mgoods_name FROM '. $GLOBALS['gdb']->fun_table2('mgoods').') as b on a.mgoods_id = b.mgoods_id ORDER BY ticket_goods_id DESC'.' LIMIT ' . $intoffset . ', ' . $intpagesize;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$arr[$key]['begin'] = '';
		if($row['ticket_goods_begin'] == 1) {
			$arr[$key]['begin'] = '当天开始';
		} else if($row['ticket_goods_begin'] == 2) {
			$arr[$key]['begin'] = '第二天开始';
		}
	}

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arr;
	return $arrpackage;
}
?>