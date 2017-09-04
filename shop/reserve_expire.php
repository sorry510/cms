<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strchannel = 'appoint';

$strsearch = api_value_get('search');
$sqlsearch = $gdb->fun_escape($strsearch);
$strfrom = api_value_get('from');
$strfrom2 = $gdb->fun_escape($strfrom);
$intfrom = strtotime($strfrom2);
$strto = api_value_get('to');
$strto2 = $gdb->fun_escape($strto);
$intto = strtotime($strto2);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$time = time();
$strtoday = date('Y-m-d',$time);
$inttoday = strtotime($strtoday);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('reserve_list', get_reserve_list());
$gtemplate->fun_show('reserve_expire');

function get_request(){
	$arr = array();
	$arr['search'] = $GLOBALS['strsearch'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}
function get_mgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_mgoods_list(){
	$arr = array();
	$arrmgoods = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$v){
		$strsql = "SELECT mgoods_id, mgoods_name, mgoods_price,mgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_catalog_id = ".$v['mgoods_catalog_id']."  and mgoods_state = 1 ORDER BY mgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$v['mgoods'] = $arrmgoods;
	}
	return $arr;
}

function get_reserve_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	$mgoods = array();

	$strwhere = '';
	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND reserve_dtime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND reserve_dtime < ' . ($GLOBALS['intto']+86400);
	}
	$strwhere2 = '';
	if($GLOBALS['sqlsearch'] != '') {
	$strwhere2 =  " AND (card_code LIKE '%" . $GLOBALS['sqlsearch'] . "%' OR reserve_phone LIKE '%" . $GLOBALS['sqlsearch'] . "%' OR reserve_name LIKE '%" . $GLOBALS['sqlsearch'] . "%')";
	}
	$strwhere3 = '';
	if (empty($GLOBALS['intfrom']) && empty($GLOBALS['intto']) && empty($GLOBALS['sqlsearch'])) {
		$strwhere3 =" AND reserve_dtime <".$GLOBALS['inttoday'];
	}

	$arr = array();
	$strsql = 'SELECT count(reserve_id) as datcount FROM ' . $GLOBALS['gdb']->fun_table2('reserve') . ' as a LEFT JOIN '. $GLOBALS['gdb']->fun_table2('card') .' as b ON a.card_id = b.card_id WHERE 1 = 1 ' . $strwhere . $strwhere2 . $strwhere3;

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


	$strsql = 'SELECT a.reserve_id,a.card_id,a.reserve_name,a.reserve_phone,a.reserve_count,a.reserve_state,a.reserve_atime,a.reserve_dtime,a.reserve_here,a.reserve_type,a.reserve_memo,b.card_code FROM (SELECT reserve_id,card_id,reserve_name,reserve_here,reserve_phone,reserve_count,reserve_state,reserve_atime,reserve_dtime,reserve_type,reserve_memo FROM ' . $GLOBALS['gdb']->fun_table2('reserve') . ' WHERE 1 = 1 ' . $strwhere . $strwhere3 .' ORDER BY reserve_dtime LIMIT ' . $intoffset . ', ' . $intpagesize . ') as a LEFT JOIN (SELECT card_code,card_id FROM ' . $GLOBALS['gdb']->fun_table2('card') .' WHERE card_state =1 AND card_edate >'. time() .' ) as b on a.card_id = b.card_id WHERE 1=1 ' . $strwhere2;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$arr[$key]['state'] = '';
		if($row['reserve_state'] == 1) {
			$arr[$key]['state'] = '正常';
		} else if($row['reserve_state'] == 2) {
			$arr[$key]['state'] = '取消';
		}
	}

	foreach($arr as $key => $row) {
		$arr[$key]['here'] = '';
		if($row['reserve_here'] == 1) {
			$arr[$key]['here'] = '到店';
		} else if($row['reserve_here'] == 2) {
			$arr[$key]['here'] = '未到店';
		}
	}

	foreach($arr as $key => $row) {
		$arr[$key]['type'] = '';
		if($row['reserve_type'] == 1) {
			$arr[$key]['type'] = '收银员预约';
		} else if($row['reserve_type'] == 2) {
			$arr[$key]['type'] = '微信预约';
		}
	}

	foreach($arr as $key => $row) {
		if($row['card_code'] == null) {
			$arr[$key]['code'] = '';
		}else {
			$arr[$key]['code'] = $row['card_code'];
		}
	}

	foreach($arr as $key => $row) {
		$strsql = 'SELECT mgoods_id,c_mgoods_name  FROM ' . $GLOBALS['gdb']->fun_table2('reserve_mgoods') . ' WHERE reserve_id = ' . $row['reserve_id'];

		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr2 = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$mgoods = array();
		foreach ($arr2 as $key2 => $row2) {
			array_push($mgoods, $row2['c_mgoods_name']);
		}
		$arr[$key]['mgoods'] = implode('，', $mgoods);
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