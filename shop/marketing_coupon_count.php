<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strchannel = 'marketing';

$strfrom = api_value_get('from');
$strfrom2 = $gdb->fun_escape($strfrom);
$intfrom = strtotime($strfrom2);
$strto = api_value_get('to');
$strto2 = $gdb->fun_escape($strto);
$intto = strtotime($strto2);
$stract_type = api_value_get('act_type');
$intact_type = api_value_int0($stract_type);
$strttype = api_value_get('ttype');
$intttype = api_value_int0($strttype);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('act_give_list', get_act_give_list());
$gtemplate->fun_show('marketing_coupon_count');

function array_remove(&$arr, $offset) 
{ 
array_splice($arr, $offset, 1); 
}

function get_request(){
	$arr = array();
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

function get_act_give_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND act_give_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND act_give_atime <= ' . ($GLOBALS['intto']+86400);
	}
	if ($GLOBALS['intact_type'] != '') {
		$strwhere = $strwhere . " AND act_type = " . $GLOBALS['intact_type'];
	}
/*	if ($GLOBALS['ttype'] != '') {
		$strwhere2 = " AND act_give_ttype = " . $GLOBALS['ttype'];
	}
	if ($GLOBALS['ttype'] != '') {
		$strwhere3 = " AND act_ticket_ttype = " . $GLOBALS['ttype'];
	}*/

	$arr = array();
	$strsql = 'SELECT count(act_id) as datcount FROM ' . $GLOBALS['gdb']->fun_table2('act') . ' WHERE act_type = 3 OR act_type = 4 ' . $strwhere;
	/*$strsql = 'SELECT count(act_give_id) as datcount FROM (SELECT act_give_id FROM '.$GLOBALS['gdb']->fun_table2('act_give') . ')'  */
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

	$strsql = 'SELECT act_atime,act_give_id,act_ticket_id,act_type,act_relate_aticket,act_relate_uticket,act_relate_smoney FROM ' . $GLOBALS['gdb']->fun_table2('act') . ' WHERE act_type = 3 OR act_type = 4 ' . $strwhere .' ORDER BY act_give_id DESC LIMIT ' . $intoffset . ', ' . $intpagesize;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach ($arr as $key => $row) {
		if ($row['act_give_id'] == 0) {
			$strsql = 'SELECT 	act_ticket_name,act_ticket_ttype,c_ticket_name,c_ticket_days,c_ticket_begin FROM ' . $GLOBALS['gdb']->fun_table2('act_ticket') . ' WHERE  act_ticket_id = '. $row['act_ticket_id'];

			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			$arr[$key]['c_ticket_name'] = $arr2['c_ticket_name'];
			$arr[$key]['act_name'] = $arr2['act_ticket_name'];
			$arr[$key]['c_ticket_days'] = $arr2['c_ticket_days'];
			$arr[$key]['c_ticket_begin'] = $arr2['c_ticket_begin'];
			$arr[$key]['ttype'] = $arr2['act_ticket_ttype'];
		}elseif ($row['act_ticket_id'] == 0) {
			$strsql = 'SELECT 	act_give_name,act_give_ttype,c_ticket_name,c_ticket_days,c_ticket_begin FROM ' . $GLOBALS['gdb']->fun_table2('act_give') . ' WHERE  act_give_id = '. $row['act_give_id'];

			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			$arr[$key]['act_name'] = $arr2['act_give_name'];
			$arr[$key]['c_ticket_name'] = $arr2['c_ticket_name'];
			$arr[$key]['c_ticket_days'] = $arr2['c_ticket_days'];
			$arr[$key]['c_ticket_begin'] = $arr2['c_ticket_begin'];
			$arr[$key]['ttype'] = $arr2['act_give_ttype'];
		}
	}

	foreach($arr as $key => $row) {
		$arr[$key]['ttype'] = '';
		if($row['ttype'] == 1) {
			$arr[$key]['ttype'] = '代金券';
		} else if($row['ttype'] == 2) {
			$arr[$key]['ttype'] = '体验券';
		}
	}

	foreach($arr as $key => $row) {
		$arr[$key]['begin'] = '';
		if($row['c_ticket_begin'] == 1) {
			$arr[$key]['begin'] = '当天开始';
		} else if($row['c_ticket_begin'] == 2) {
			$arr[$key]['begin'] = '第二天开始';
		}
	}

	foreach ($arr as $key => $row) {
		if ($GLOBALS['intttype'] == 1) {
			if ($arr[$key]['ttype'] == '体验券') {
				array_remove($arr, $key); 
			}
		}elseif ($GLOBALS['intttype'] == 2) {
			if ($arr[$key]['ttype'] == '代金券') {
				array_remove($arr, $key); 
			}
		}
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