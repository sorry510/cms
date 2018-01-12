<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wshop_module'] != 1) {
	return;
}

$strchannel = 'wshop';

$strname = api_value_get('txtname');
$sqlname = $gdb->fun_escape($strname);
/*$strfrom = api_value_get('from');
$strfrom2 = $gdb->fun_escape($strfrom);
$intfrom = strtotime($strfrom2);
$strto = api_value_get('to');
$strto2 = $gdb->fun_escape($strto);
$intto = strtotime($strto2);*/
/*$inttime = time();
$intmonth = strtotime('Y-m',$inttime);*/
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('worder_list', get_worder_list());
$gtemplate->fun_show('wechat_shop_agent_all');

function get_request(){
	$arr = array();
	$arr['name'] = $GLOBALS['strname'];
	/*$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];*/
	return $arr;
}

function get_worder_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	/*$strwhere1 = '';
	if($GLOBALS['intfrom'] > 0) {
		$strwhere1 = $strwhere1 . ' AND worder_atime >= ' . $GLOBALS['intfrom'];
		$strwhere = $strwhere . ' AND worder_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere1 = $strwhere1 . ' AND worder_atime < ' . ($GLOBALS['intto']+86400);
		$strwhere = $strwhere . ' AND worder_atime < ' . ($GLOBALS['intto']+86400);
	}*/
	if ($GLOBALS['sqlname'] != '') {
		$strwhere = $strwhere . " AND (c_parent_card_name = '" . $GLOBALS['sqlname'] . "' OR c_parent_card_phone = '".$GLOBALS['sqlname']."')";
	}

	$arr = array();
	$strsql = 'SELECT count(card_parent_id) as datcount FROM ' . $GLOBALS['gdb']->fun_table2('worder') . ' WHERE (worder_state = 2 OR worder_state = 3) AND s_worder_reward != 0 ' . $strwhere . " GROUP BY card_parent_id ";
	
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

	$strsql = "SELECT a.card_parent_id,a.c_parent_card_name,a.c_parent_card_phone,a.sum_reward,(a.sum_reward - b.sum_value) as real_reward FROM (SELECT card_parent_id,c_parent_card_name,c_parent_card_phone,sum(s_worder_reward) as sum_reward FROM " . $GLOBALS['gdb']->fun_table2('worder') . " WHERE (worder_state = 2 OR worder_state = 3) AND s_worder_reward != 0 " . $strwhere ." GROUP BY card_parent_id) as a LEFT JOIN (SELECT card_id,sum(wmoney_value) as sum_value FROM ". $GLOBALS['gdb']->fun_table2('wmoney') ." GROUP BY card_id) as b on a.card_parent_id = b.card_id "." LIMIT " . $intoffset . ", " . $intpagesize;
	
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arr;
	return $arrpackage;

}
?>