<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['history_module'] != 1) {
	return;
}

$strchannel = 'card';

$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strfrom = api_value_get('from');
$strto = api_value_get('to');
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request',get_request());
$gtemplate->fun_assign('card_history',get_card_history());
$gtemplate->fun_show('card_history');

function get_request() {
	$arr = array();
	$arr['shop'] = $GLOBALS['strshop'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	$arr['key'] = $GLOBALS['strkey'];
	return $arr;
}

function get_card_history() {
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
	if($GLOBALS['intshop'] != 0) {
		$strwhere .= " AND shop_id = " . $GLOBALS['intshop'];
	}
	if($intfrom > 0) {
		$strwhere = $strwhere . ' AND card_history_atime >= ' . $intfrom;
	}
	if($intto > 0) {
		$strwhere = $strwhere . ' AND card_history_atime < ' . $intto;
	}
	if($GLOBALS['strkey'] != '') {
		$strwhere = $strwhere . " AND (c_card_code = '" . $GLOBALS['sqlkey'] . "'";
		$strwhere = $strwhere . " OR c_card_name = '" . $GLOBALS['sqlkey'] . "'";
		$strwhere = $strwhere . " OR c_card_phone = '" . $GLOBALS['sqlkey'] . "')";
	}

	$arr = array();
	$strsql = "SELECT COUNT(card_history_id) AS mycount FROM " . $GLOBALS['gdb']->fun_table2('card_history')  . " WHERE 1 = 1" . $strwhere;
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
	
	$strsql = "SELECT a.*, b.shop_name FROM (SELECT card_history_id, card_id, card_record_id, shop_id, card_history_atime, c_card_type_name, "
	. "c_card_code, c_card_name, c_card_phone, c_card_sex, c_card_age, c_card_record_code, c_worker_name FROM " . $GLOBALS['gdb']->fun_table2('card_history')
	. " where 1 = 1" . $strwhere . " ORDER BY card_history_id DESC LIMIT " . $intoffset . ", " . $intpagesize . ") AS a LEFT JOIN "
	. $GLOBALS['gdb']->fun_table('shop') ." AS b ON a.shop_id = b.shop_id ORDER BY a.card_history_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row) {
		$row['mysex'] = '';
		if($row['c_card_sex'] == 1) {
			$row['mysex'] = '男';
		} else if($row['c_card_sex'] == 2) {
			$row['mysex'] = '女';
		} else if($row['c_card_sex'] == 3) {
			$row['mysex'] = '保密';
		}
		$row['myage'] = '';
		if($row['c_card_age'] == 0) {
			$row['myage'] = '保密';
		} else {
			$row['myage'] = $row['c_card_age'] . '岁';
		}
		//$row['atime'] = $row['card_history_atime'] == 0 ? '--' : date("Y-m-d H:i",$row['card_history_atime']);
		//$row['sex'] = $row['c_card_sex'] == '1' ? '男' : ($row['c_card_sex'] == '2' ? '女':'保密');
		//$row['age'] = $row['c_card_age'] != 0 ? $row['c_card_age'] : '保密';
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