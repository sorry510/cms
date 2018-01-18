<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'card';
$strstate = api_value_get('state');
$intstate = api_value_int0($strstate);
$strtype = api_value_get('type');
$inttype = api_value_int0($strtype);
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('card_type_list', get_card_type_list());
$gtemplate->fun_assign('card_list', get_card_list());
$gtemplate->fun_show('card');

function get_request() {
	$arr = array();
	$arr['state'] = $GLOBALS['intstate'];
	$arr['type'] = $GLOBALS['strtype'];
	$arr['key'] = $GLOBALS['strkey'];
	return $arr;
}

function get_card_type_list() {
	$arr = array();
	$strsql = "SELECT card_type_id, card_type_name, card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card_type') . " ORDER BY card_type_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_card_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	
	$strwhere = '';
	if($GLOBALS['intstate'] == 3) {
		$strwhere .= " AND card_state = 3";
	} else {
		$strwhere .= " AND (card_state = 1 OR card_state = 2)";
	}
	if($GLOBALS['inttype'] != 0) {
		$strwhere .= " AND card_type_id = " . $GLOBALS['inttype'];
	}
	if($GLOBALS['strkey'] != '') {
		$strwhere = $strwhere . " AND (card_code = '" . $GLOBALS['sqlkey'] . "'";
		$strwhere = $strwhere . " OR card_name = '" . $GLOBALS['sqlkey'] . "'";
		$strwhere = $strwhere . " OR card_phone = '" . $GLOBALS['sqlkey'] . "')";
	} else {
		$strwhere .= " AND shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']);
	}
	
	$arr = array();
	$strsql = "SELECT COUNT(card_id) AS mycount FROM " . $GLOBALS['gdb']->fun_table2('card')  . " WHERE 1 = 1" . $strwhere;
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
	
	$strsql = "SELECT a.*, b.shop_name FROM (SELECT card_id, shop_id, card_okey, card_code, card_name, card_phone, card_sex, card_birthday_date, card_state, card_atime, "
	. "c_card_type_name, c_card_type_discount, s_card_smoney, s_card_ymoney, s_card_sscore, s_card_yscore FROM " . $GLOBALS['gdb']->fun_table2('card')
	. " WHERE 1 = 1" . $strwhere . " ORDER BY card_id DESC LIMIT ". $intoffset . ", " . $intpagesize
	. ") AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS b ON a.shop_id = b.shop_id ORDER BY a.card_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	
	$inttime = time();
	foreach($arrlist as &$row) {
		$row['mysex'] = '';
		if($row['card_sex'] == 1) {
			$row['mysex'] = '男';
		} else if($row['card_sex'] == 2) {
			$row['mysex'] = '女';
		} else if($row['card_sex'] == 3) {
			$row['mysex'] = '保密';
		}
		$row['mybirthday'] = '';
		if($row['card_birthday_date'] > 0) {
			$row['mybirthday'] = date('Y-m-d', $row['card_birthday_date']);
		}
		$row['mydiscount'] = $row['c_card_type_discount'] == 0 ? 10 : $row['c_card_type_discount'];
		$row['mystate'] = '';
		if($row['card_state'] == 1) {
			$row['mystate'] = '正常';
		} else if($row['card_state'] == 2) {
			$row['mystate'] = '停用';
		} else if($row['card_state'] == 3) {
			$row['mystate'] = '已删除';
		}
		$strsql = "SELECT card_mcombo_id, card_mcombo_gcount, card_mcombo_cedate, c_mgoods_name, c_mcombo_type FROM " . $GLOBALS['gdb']->fun_table2('card_mcombo')
		. " WHERE card_id = " . $row['card_id'] . " AND card_mcombo_type = 2 AND (card_mcombo_cedate = 0 OR card_mcombo_cedate > " . $inttime . ") AND ((c_mcombo_type = 1 AND card_mcombo_gcount != 0) OR c_mcombo_type = 2) ORDER BY card_mcombo_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$row['mymcombo'] = $GLOBALS['gdb']->fun_fetch_all($hresult);
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