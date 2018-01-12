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
$strfrom = api_value_get('from');
$strfrom2 = $gdb->fun_escape($strfrom);
$intfrom = strtotime($strfrom2);
$strto = api_value_get('to');
$strto2 = $gdb->fun_escape($strto);
$intto = strtotime($strto2);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('wmoney_list', get_wmoney_list());
$gtemplate->fun_show('wechat_shop_agent_take');

function get_request(){
	$arr = array();
	$arr['name'] = $GLOBALS['strname'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

function get_wmoney_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere1 = '';
	$strwhere2 = '';
	if ($GLOBALS['sqlname'] != '') {
		$strwhere1 = $strwhere1 . " AND (card_name = '" . $GLOBALS['sqlname'] . "' OR card_phone = '".$GLOBALS['sqlname']."')";
	}
	if($GLOBALS['intfrom'] > 0) {
		$strwhere2 = $strwhere2 . ' AND wmoney_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere2 = $strwhere2 . ' AND wmoney_atime < ' . ($GLOBALS['intto']+86400);
	}

	$arr = array();
	$strsql = 'SELECT count(a.wmoney_id) as datcount,b.card_name,b.card_phone FROM (SELECT wmoney_id,card_id FROM ' . $GLOBALS['gdb']->fun_table2('wmoney') . ' WHERE 1 = 1' . $strwhere2 .') as a LEFT JOIN (SELECT card_id,card_phone,card_name FROM '.$GLOBALS['gdb']->fun_table2('card').' WHERE 1=1 '.$strwhere1.') as b on a.card_id = b.card_id WHERE 1=1 '.$strwhere1;
	//echo $strsql;exit();
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

	$strsql = 'SELECT a.card_id,a.wmoney_atime,a.wmoney_value,b.card_name,b.card_phone FROM (SELECT card_id,wmoney_atime,wmoney_value FROM ' . $GLOBALS['gdb']->fun_table2('wmoney') . ' WHERE 1=1 ' . $strwhere2 . ') as a LEFT JOIN (SELECT card_id,card_name,card_phone FROM '. $GLOBALS['gdb']->fun_table2('card').' WHERE 1=1 '.$strwhere1.') as b on a.card_id = b.card_id WHERE 1=1 '.$strwhere1.' ORDER BY a.wmoney_atime DESC'.' LIMIT ' . $intoffset . ', ' . $intpagesize;

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