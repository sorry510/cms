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
$gtemplate->fun_assign('act_list', get_act_list());
$gtemplate->fun_show('marketing_coupon_count');

function get_request(){
	$arr = array();
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['act_type'] = $GLOBALS['stract_type'];
	$arr['ttype'] = $GLOBALS['strttype'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

function get_act_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	$strwhere2 = '';
	$strwhere3 = '';
	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND act_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND act_atime <= ' . ($GLOBALS['intto']+86399);
	}
	if ($GLOBALS['intact_type'] != '') {
		$strwhere = $strwhere . " AND act_type = " . $GLOBALS['intact_type'];
	}else{
		$strwhere = $strwhere . " AND act_type = 3 OR act_type = 4 ";
	}
	if ($GLOBALS['intttype'] != '') {
		$strwhere2 = " AND act_give_ttype = " . $GLOBALS['intttype'];
	}
	if ($GLOBALS['intttype'] != '') {
		$strwhere3 = " AND act_ticket_ttype = " . $GLOBALS['intttype'];
	}

	$arr = array();
	$strsql = 'SELECT count(act_id) as datcount FROM (SELECT act_id, act_atime,act_give_id,act_ticket_id,act_type,act_relate_aticket,act_relate_uticket,act_relate_smoney FROM ' . $GLOBALS['gdb']->fun_table2('act') . ' WHERE 1=1 ' . $strwhere .' ORDER BY act_id DESC) as a LEFT JOIN (SELECT act_ticket_id,act_ticket_name,act_ticket_ttype,c_ticket_name,c_ticket_days,c_ticket_begin FROM '.$GLOBALS['gdb']->fun_table2('act_ticket').' WHERE 1=1 ' . $strwhere3 .') as b on a.act_ticket_id = b.act_ticket_id LEFT JOIN (SELECT act_give_id,act_give_name,act_give_ttype,c_ticket_name,c_ticket_days,c_ticket_begin FROM '.$GLOBALS['gdb']->fun_table2('act_give').' WHERE 1=1 ' . $strwhere2 .') as c on a.act_give_id = c.act_give_id';

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

	$strsql = 'SELECT a.act_id,a.act_atime,a.act_give_id,a.act_ticket_id,a.act_type,a.act_relate_aticket,a.act_relate_uticket,a.act_relate_smoney,b.act_ticket_name,b.act_ticket_ttype,b.c_ticket_name as c_ticket_name1,b.c_ticket_days as c_ticket_days1,b.c_ticket_begin as c_ticket_begin1,c.act_give_name,c.act_give_ttype,c.c_ticket_name as c_ticket_name2,c.c_ticket_days as c_ticket_days2,c.c_ticket_begin as c_ticket_begin2 FROM (SELECT act_id, act_atime,act_give_id,act_ticket_id,act_type,act_relate_aticket,act_relate_uticket,act_relate_smoney FROM ' . $GLOBALS['gdb']->fun_table2('act') . ' WHERE 1=1 ' . $strwhere .' ORDER BY act_id DESC) as a LEFT JOIN (SELECT act_ticket_id,act_ticket_name,act_ticket_ttype,c_ticket_name,c_ticket_days,c_ticket_begin FROM '.$GLOBALS['gdb']->fun_table2('act_ticket').' WHERE 1=1 ' . $strwhere3 .') as b on a.act_ticket_id = b.act_ticket_id LEFT JOIN (SELECT act_give_id,act_give_name,act_give_ttype,c_ticket_name,c_ticket_days,c_ticket_begin FROM '.$GLOBALS['gdb']->fun_table2('act_give').' WHERE 1=1 ' . $strwhere2 .') as c on a.act_give_id = c.act_give_id LIMIT ' . $intoffset . ', ' . $intpagesize;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach ($arr as $key => $row) {
		if ($row['act_type'] == 3) {
			$arr[$key]['act_name'] = $row['act_give_name'];
			$arr[$key]['c_ticket_name'] = $row['c_ticket_name2'];
			$arr[$key]['c_ticket_days'] = $row['c_ticket_days2'];
			$arr[$key]['c_ticket_begin'] = $row['c_ticket_begin2'];
			$arr[$key]['ttype'] = $row['act_give_ttype'];
		}elseif ($row['act_type'] == 4) {
			$arr[$key]['act_name'] = $row['act_ticket_name'];
			$arr[$key]['c_ticket_name'] = $row['c_ticket_name1'];
			$arr[$key]['c_ticket_days'] = $row['c_ticket_days1'];
			$arr[$key]['c_ticket_begin'] = $row['c_ticket_begin1'];
			$arr[$key]['ttype'] = $row['act_ticket_ttype'];
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

	foreach($arr as $key => $row) {
		$arr[$key]['act_type'] = '';
		if($row['act_type'] == 3) {
			$arr[$key]['act_type'] = '满送活动';
		} else if($row['act_type'] == 4) {
			$arr[$key]['act_type'] = '赠送优惠券';
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