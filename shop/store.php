<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'store';

$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$strfrom = api_value_get('from');
$intfrom = strtotime($strfrom) ? strtotime($strfrom) : 0;
$strto = api_value_get('to');
$intto = strtotime($strto) ? strtotime($strto) : 0;
$strsearch = api_value_get('search');
$sqlsearch = $gdb->fun_escape($strsearch);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

if($intfrom == 0){
	//默认是3个月之前
	$strfrom = date('Y-m-d',strtotime('-3 month'));
	$intfrom = strtotime($strfrom);
}else{
	//最早日期为一年前
	$intfrom = $intfrom < date('Y-m-d',strtotime('-1 year')) ? date('Y-m-d', strtotime('-1 year')) : $intfrom;
}

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('store_list', get_store_list());
$gtemplate->fun_show('store');

function get_request() {
	$arr = array();
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}
function get_store_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if($GLOBALS['intfrom'] != 0) {
	  $strwhere .=" and store_time>=".$GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] != 0) {
	  $strwhere .=" and store_time<=".$GLOBALS['intto'];
	}
	$strwhere .= " and shop_id=".$GLOBALS['intshop'];

	$arr = array();
	$strsql = "SELECT count(store_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('store')  . " WHERE 1 = 1 " . $strwhere;
	// echo $strsql;exit;
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
	
	$strsql = "SELECT store_id, shop_id, store_type, store_money, store_operator, store_memo, store_time, store_state FROM " . $GLOBALS['gdb']->fun_table2('store') . " where 1=1 ".$strwhere." ORDER BY store_id DESC LIMIT ". $intoffset . ", " . $intpagesize;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row){
		$row['type'] = $row['store_type'] == '1' ? '入库' : ($row['store_type'] == '2' ? '出库' : '其它');
		$row['state'] = $row['store_state'] == '1' ? '未确认' : ($row['store_state'] == '2' ? '确认' : '其它');
		$row['time'] = $row['store_time'] != '0' ? date('Y-m-d H:i', $row['store_time']) : '--';
	}

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	return $arrpackage;
}