<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'marketing';

$strexpire = api_value_get('expire');
$intexpire = api_value_int0($strexpire);
$stract_name = api_value_get('act_name');
$sqlact_name = $gdb->fun_escape($stract_name);
$strfrom = api_value_get('from');
$strfrom2 = $gdb->fun_escape($strfrom);
$intfrom = strtotime($strfrom2);
$strto = api_value_get('to');
$strto2 = $gdb->fun_escape($strto);
$intto = strtotime($strto2);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$inttime = time();

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('act_discount_list', get_act_discount_list());
$gtemplate->fun_show('act_discount');

function get_request(){
	$arr = array();
	$arr['act_name'] = $GLOBALS['stract_name'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	$arr['expire'] = $GLOBALS['intexpire'];
	return $arr;
}

function get_act_discount_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND act_discount_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND act_discount_atime < ' . ($GLOBALS['intto']+86400);
	}
	if ($GLOBALS['sqlact_name'] != '') {
		$strwhere = $strwhere . " AND act_discount_name LIKE '%" . $GLOBALS['sqlact_name'] . "%' ";
	}
	if ($GLOBALS['intexpire'] == 1) {
		$strwhere = $strwhere . " AND " .$GLOBALS['inttime']." > act_discount_end ";
	}else{
		$strwhere = $strwhere . " AND " .$GLOBALS['inttime']." <= act_discount_end ";
	}

	$arr = array();
	$strsql = 'SELECT count(act_discount_id) as datcount FROM ' . $GLOBALS['gdb']->fun_table2('act_discount') . ' WHERE 1 = 1' . $strwhere;
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

	$strsql = 'SELECT act_discount_id,act_discount_name,act_discount_client,act_discount_start,act_discount_end,act_discount_state,act_discount_memo,act_discount_atime FROM' . $GLOBALS['gdb']->fun_table2('act_discount') . ' WHERE 1 = 1' . $strwhere .' ORDER BY act_discount_id DESC'.' LIMIT ' . $intoffset . ', ' . $intpagesize;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$arr[$key]['clienttype'] = '';
		if($row['act_discount_client'] == 1) {
			$arr[$key]['clienttype'] = '不限制';
		} else if($row['act_discount_client'] == 2) {
			$arr[$key]['clienttype'] = '会员';
		}else if ($row['act_discount_client'] == 3) {
			$arr[$key]['clienttype'] = '非会员';
		}
	}

	foreach($arr as $key => $row) {
		$arr[$key]['datstate'] = '';
		if($row['act_discount_end'] < $GLOBALS['inttime']) {
			$arr[$key]['datstate'] = '已结束';
		}elseif($row['act_discount_start'] < $GLOBALS['inttime'] && $GLOBALS['inttime'] < $row['act_discount_end']) {
			$arr[$key]['datstate'] = '活动中';
		}elseif ($GLOBALS['inttime'] < $row['act_discount_start']) {
			$arr[$key]['datstate'] = '未开始';
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