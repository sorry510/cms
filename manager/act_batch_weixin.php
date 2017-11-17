<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

if(laimi_config_trade()['act_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strchannel = 'marketing';

$stract_name = api_value_get('act_name');
$sqlact_name = $gdb->fun_escape($stract_name);
$strfrom = api_value_get('from');
$strfrom2 = $gdb->fun_escape($strfrom);
$intfrom = strtotime($strfrom2);
$strto = api_value_get('to');
$strto2 = $gdb->fun_escape($strto);
$intto = strtotime($strto2);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('weixin_list', get_weixin_list());
$gtemplate->fun_show('act_batch_weixin');

function get_request(){
	$arr = array();
	$arr['act_name'] = $GLOBALS['stract_name'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

function get_weixin_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND act_ticket_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND act_ticket_atime < ' . ($GLOBALS['intto']+86400);
	}
	if ($GLOBALS['sqlact_name'] != '') {
		$strwhere = $strwhere . " AND act_ticket_name LIKE '%" . $GLOBALS['sqlact_name'] . "%' ";
	}

	$arr = array();
	$strsql = 'SELECT count(act_ticket_id) as datcount FROM ' . $GLOBALS['gdb']->fun_table2('act_ticket') . ' WHERE act_ticket_atype = 1' . $strwhere;
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

	$strsql = 'SELECT act_ticket_id,act_ticket_name,c_ticket_name,	s_act_ticket_count
	,act_ticket_atime,	act_ticket_sms,	act_ticket_weixin FROM' . $GLOBALS['gdb']->fun_table2('act_ticket') . ' WHERE act_ticket_atype = 1' . $strwhere .' ORDER BY act_ticket_id DESC'.' LIMIT ' . $intoffset . ', ' . $intpagesize;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$arr[$key]['way'] = '';
		if($row['act_ticket_weixin'] == 1 && $row['act_ticket_sms'] != 1) {
			$arr[$key]['way'] = '微信通知';
		} else if($row['act_ticket_sms'] == 1 && $row['act_ticket_weixin'] != 1) {
			$arr[$key]['way'] = '短信通知';
		} else if ($row['act_ticket_sms'] == 1 && $row['act_ticket_weixin'] == 1) {
			$arr[$key]['way'] = '微信、短信通知';
		}else if ($row['act_ticket_sms'] == 2 && $row['act_ticket_weixin'] == 2) {
			$arr[$key]['way'] = '未通知';
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