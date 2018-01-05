<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['score_module'] != 1) {
	return;
}

$strchannel = 'system';
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);
$strfrom = api_value_get('from');
$strto = api_value_get('to');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('gift_list', get_gift_list());
$gtemplate->fun_assign('gift_record_list', get_gift_record_list());
$gtemplate->fun_show('system_score');

function get_request(){
	$arr = array();
	$arr['key'] = $GLOBALS['strkey'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

function get_gift_list() {
	$arr = array();
	$strsql = "SELECT gift_id, gift_name, gift_score FROM " . $GLOBALS['gdb']->fun_table2('gift') . " ORDER BY gift_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_gift_record_list() {
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
	$strwhere = $strwhere . " AND shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']);
	if($GLOBALS['strkey'] != '') {
		$strwhere .= " AND (c_card_code = '" . $GLOBALS['strkey'] . "'";
		$strwhere .= " OR c_card_phone = '" . $GLOBALS['strkey'] . "'";
		$strwhere .= " OR c_card_name = '" . $GLOBALS['strkey'] . "')";
	}
	if($intfrom > 0) {
		$strwhere .= " AND gift_record_atime >= " . $intfrom;
	}
	if($intto > 0) {
		$strwhere .= " AND gift_record_atime <= " . $intto;
	}
	
	$arr = array();
	$strsql = "SELECT COUNT(gift_record_id) AS mycount FROM " . $GLOBALS['gdb']->fun_table2('gift_record') . " WHERE 1 = 1" . $strwhere;
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
	
	$strsql = "SELECT gift_record_id, gift_record_score, gift_record_atime, c_card_code, c_card_name FROM " . $GLOBALS['gdb']->fun_table2('gift_record')
	. " WHERE 1 = 1" . $strwhere . " ORDER BY gift_record_id DESC LIMIT " . $intoffset . ", " . $intpagesize;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row1) {
		$row1['mycontent'] = '';
		$strsql = "SELECT gift_record_goods_id, gift_count, c_gift_name FROM " . $GLOBALS['gdb']->fun_table2('gift_record_goods')
		. " WHERE gift_record_id = " . $row1['gift_record_id'] . " ORDER BY gift_record_goods_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		foreach($arr as $row2) {
			$row1['mycontent'] .= $row2['c_gift_name'] . "*" . $row2['gift_count'] . ",";
		}
		if($row1['mycontent'] != '') {
			$row1['mycontent'] = substr($row1['mycontent'], 0, strlen($row1['mycontent']) - 1);
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