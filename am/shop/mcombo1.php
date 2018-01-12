<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('mcombo_list', get_mcombo_list());
$gtemplate->fun_show('mcombo1');

function get_request() {
	$arr = array();
	$arr['key'] = $GLOBALS['strkey'];
	return $arr;
}

function get_mcombo_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	
	$strwhere = '';
	$strwhere = $strwhere . " AND mcombo_type = 1";
	if($GLOBALS['strkey'] != "") {
		$strwhere = $strwhere . " AND (mcombo_name LIKE '%" . $GLOBALS['sqlkey'] . "%'";
		$strwhere = $strwhere . " OR mcombo_jianpin LIKE '%" . $GLOBALS['sqlkey'] . "%'";
		$strwhere = $strwhere . " OR mcombo_code LIKE '%" . $GLOBALS['sqlkey'] . "%')";
	}
	
	$arr = array();
	$strsql = "SELECT COUNT(mcombo_id) AS mycount FROM " . $GLOBALS['gdb']->fun_table2('mcombo')  . " WHERE 1 = 1" . $strwhere;
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
	
	$strsql = "SELECT mcombo_id, mcombo_code, mcombo_name, mcombo_jianpin, mcombo_price, mcombo_cprice, mcombo_limit_type, mcombo_limit_days, mcombo_act, mcombo_state, "
	. "mcombo_atime FROM " . $GLOBALS['gdb']->fun_table2('mcombo') . " WHERE 1 = 1" . $strwhere . " ORDER BY mcombo_id DESC LIMIT " . $intoffset . ", " . $intpagesize;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row) {
		$row['mycprice'] = '';
		if($row['mcombo_cprice'] > 0) {
			$row['mycprice'] = '￥' . ($row['mcombo_cprice'] + 0);
		} else {
			$row['mycprice'] = '--';
		}
		$row['mylimit'] = '';
		if($row['mcombo_limit_type'] == 1) {
			$row['mylimit'] = '不限制';
		} else if($row['mcombo_limit_type'] == 2) {
			$row['mylimit'] = $row['mcombo_limit_days'] . '天';
		}
		$row['myact'] = '';
		if($row['mcombo_act'] == 1) {
			$row['myact'] = '<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-dui1"></use></svg>';
		} else {
			$row['myact'] = '<svg class="laimi-qicon" aria-hidden="true"><use xlink:href="#icon-iconfontcuo"></use></svg>';
		}
		$row['mystate'] = '';
		if($row['mcombo_state'] == 1) {
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