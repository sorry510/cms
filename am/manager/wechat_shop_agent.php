<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wshop_module'] != 1) {
	return;
}

$strchannel = 'wshop';

$strexpire = api_value_get('expire');
$intexpire = api_value_int0($strexpire);
$strsearch = api_value_get('search');
$sqlsearch = $gdb->fun_escape($strsearch);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$inttime = time();

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop_agent_list', get_shop_agent_list());
$gtemplate->fun_show('wechat_shop_agent');

function get_request(){
	$arr = array();
	$arr['search'] = $GLOBALS['strsearch'];
	$arr['expire'] = $GLOBALS['intexpire'];
	return $arr;
}

function get_shop_agent_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if ($GLOBALS['sqlsearch'] != '') {
		$strwhere = $strwhere . " AND ( card_name ='" . $GLOBALS['sqlsearch'] . "' OR card_phone = '" . $GLOBALS['sqlsearch'] . "')";
	}
	if ($GLOBALS['intexpire'] == 1) {
		$strwhere = $strwhere . " AND card_fenxiao = 1 ";
	}
	if ($GLOBALS['intexpire'] == 2) {
		$strwhere = $strwhere . " AND card_fenxiao2 = 4 ";
	}
	if ($GLOBALS['intexpire'] == 0) {
		$strwhere = $strwhere . " AND card_fenxiao2 = 1 ";
	}
	$arr = array();
	$strsql = 'SELECT count(card_id) as datcount FROM ' . $GLOBALS['gdb']->fun_table2('card') . ' WHERE card_state != 3 ' . $strwhere;

	//echo $GLOBALS['intexpire'];exit();
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

	$strsql = 'SELECT card_name , card_phone , card_sex , card_birthday_date , card_ftime,s_card_reward,card_id,card_fenxiao2 FROM' . $GLOBALS['gdb']->fun_table2('card') . ' WHERE card_state != 3 ' . $strwhere .' ORDER BY card_ftime DESC LIMIT ' . $intoffset . ' , ' . $intpagesize;



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