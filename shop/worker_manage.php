<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'worker';

$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strworker_group_id = api_value_get('worker_group_id');
$intworker_group_id = api_value_int0($strworker_group_id);
$strsearch = api_value_get('strsearch');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('shop_id', $intshop_id);
$gtemplate->fun_assign('worker_group_id', $intworker_group_id);
$gtemplate->fun_assign('strsearch', $strsearch);
$gtemplate->fun_assign('worker_group_list', get_worker_group_list());
$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_show('worker_manage');

function get_worker_group_list() {
	$arr = array();
	$strsql = "SELECT worker_group_id,worker_group_name FROM " . $GLOBALS['gdb']->fun_table2('worker_group')." order by worker_group_id";
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

	if($GLOBALS['intshop_id'] != 0){
		$strwhere .= " AND shop_id=".$GLOBALS['intshop_id'];
	}
	if($GLOBALS['intworker_group_id'] != 0){
		$strwhere .= " AND worker_group_id=".$GLOBALS['intworker_group_id'];
	}
	if($GLOBALS['strsearch'] != '') {
	  $strwhere = $strwhere . " AND worker_name LIKE '%" . $GLOBALS['strsearch'] . "%'";
	}

	$arr = array();
	$strsql = "SELECT count(worker_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('worker')  . " WHERE 1 = 1 " . $strwhere;
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

	$strsql = "SELECT a.*, b.shop_name, c.worker_group_name FROM (SELECT shop_id, worker_id, worker_group_id, worker_name, worker_code, worker_sex, worker_birthday_date, worker_phone, worker_education, worker_join, worker_wage, worker_config_guide, worker_config_reserve FROM " . $GLOBALS['gdb']->fun_table2('worker') . " where 1=1 ".$strwhere." ORDER BY worker_id DESC LIMIT ". $intoffset . ", " . $intpagesize . ") AS a ," . $GLOBALS['gdb']->fun_table('shop') . " AS b," . $GLOBALS['gdb']->fun_table2('worker_group') . " AS c WHERE a.shop_id = b.shop_id AND a.worker_group_id = c.worker_group_id ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	return $arrpackage;
}
?>