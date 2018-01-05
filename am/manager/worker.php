<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['worker_module'] != 1) {
	return;
}

$strchannel = 'worker';

$strstate = api_value_get('state');
$intstate = api_value_int0($strstate);
$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strgroup = api_value_get('group');
$intgroup = api_value_int0($strgroup);
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('worker_group_list', get_worker_group_list());
$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_show('worker');

function get_request(){
	$arr = array();
	$arr['state'] = $GLOBALS['intstate'];
	$arr['shop'] = $GLOBALS['intshop'];
	$arr['group'] = $GLOBALS['intgroup'];
	$arr['key'] = $GLOBALS['strkey'];
	return $arr;
}

function get_worker_group_list() {
	$arr = array();
	$strsql = "SELECT worker_group_id, worker_group_name FROM " . $GLOBALS['gdb']->fun_table2('worker_group') . " ORDER BY worker_group_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_worker_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	$strwhere = $strwhere . " AND a.worker_state = " . $GLOBALS['intstate'] . " AND a.shop_id IN (SELECT shop_id FROM " . $GLOBALS['gdb']->fun_table('shop') . " WHERE company_id = "
	. api_value_int0($GLOBALS['_SESSION']['login_id']) . " AND shop_etime > " . time() . ")";
	if($GLOBALS['intshop'] != 0) {
		$strwhere .= " AND a.shop_id = " . $GLOBALS['intshop'];
	}
	if($GLOBALS['intgroup'] != 0) {
		$strwhere .= " AND a.worker_group_id = " . $GLOBALS['intgroup'];
	}
	if($GLOBALS['strkey'] != '') {
	  $strwhere .= " AND (a.worker_name = '" . $GLOBALS['strkey'] . "'";
	  $strwhere .= " OR a.worker_code = '" . $GLOBALS['strkey'] . "')";
	}

	$arr = array();
	$strsql = "SELECT COUNT(worker_id) AS mycount FROM " . $GLOBALS['gdb']->fun_table2('worker')  . " AS a WHERE 1 = 1" . $strwhere;
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

	$strsql = "SELECT a.worker_id, a.worker_code, a.worker_name, a.worker_sex, a.worker_birthday_date, a.worker_phone, a.worker_education, a.worker_join, a.worker_wage, "
	. "a.worker_state, b.worker_group_name, c.shop_name FROM " . $GLOBALS['gdb']->fun_table2('worker')
	. " AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table2('worker_group') . " AS b ON a.worker_group_id = b.worker_group_id"
	. " LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS c ON a.shop_id = c.shop_id WHERE 1 = 1" . $strwhere
	. " ORDER BY a.worker_id DESC LIMIT " . $intoffset . ", " . $intpagesize;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row) {
		$row['mysex'] = '';
		if($row['worker_sex'] == 1) {
			$row['mysex'] = '男';
		} else if($row['worker_sex'] == 2) {
			$row['mysex'] = '女';
		}
		$row['mybirthday'] = '';
		if($row['worker_birthday_date'] == 0) {
			$row['mybirthday'] = '--';
		} else {
			$row['mybirthday'] = date('Y-m-d', $row['worker_birthday_date']);
		}
		$row['myjoin'] = '';
		if($row['worker_join'] == 0) {
			$row['myjoin'] = '--';
		} else {
			$row['myjoin'] = date('Y-m-d', $row['worker_join']);
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