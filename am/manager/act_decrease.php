<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['act_module'] != 1) {
	return;
}

$strchannel = 'act';

$strexpire = api_value_get('expire');
$intexpire = api_value_int0($strexpire);
$strname = api_value_get('name');
$sqlname = $gdb->fun_escape($strname);
$strfrom = api_value_get('from');
$strto = api_value_get('to');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('act_decrease_list', get_act_decrease_list());
$gtemplate->fun_show('act_decrease');

function get_request(){
	$arr = array();
	$arr['expire'] = $GLOBALS['strexpire'];
	$arr['name'] = $GLOBALS['strname'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

function get_act_decrease_list() {
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

	$inttime = time();
	$strwhere = '';
	if ($GLOBALS['intexpire'] == 1) {
		$strwhere = $strwhere . " AND act_decrease_end <= " . $inttime;
	} else {
		$strwhere = $strwhere . " AND act_decrease_end > " . $inttime;
	}
	if ($GLOBALS['strname'] != '') {
		$strwhere = $strwhere . " AND act_decrease_name LIKE '%" . $GLOBALS['sqlname'] . "%'";
	}
	if($intfrom > 0) {
		$strwhere = $strwhere . ' AND act_decrease_atime >= ' . $intfrom;
	}
	if($intto > 0) {
		$strwhere = $strwhere . ' AND act_decrease_atime < ' . $intto;
	}

	$arr = array();
	$strsql = "SELECT count(act_decrease_id) AS mycount FROM " . $GLOBALS['gdb']->fun_table2('act_decrease') . " WHERE 1 = 1" . $strwhere;
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
	
	$strsql = "SELECT act_decrease_id, act_decrease_name, act_decrease_client, act_decrease_man, act_decrease_jian, act_decrease_start, act_decrease_end, act_decrease_memo, "
	. "act_decrease_state, act_decrease_atime FROM " . $GLOBALS['gdb']->fun_table2('act_decrease')
	. " WHERE 1 = 1" . $strwhere . " ORDER BY act_decrease_id DESC LIMIT " . $intoffset . ", " . $intpagesize;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row) {
		$row['myclient'] = '';
		if($row['act_decrease_client'] == 1) {
			$row['myclient'] = '不限制';
		} else if($row['act_decrease_client'] == 2) {
			$row['myclient'] = '会员';
		} else if($row['act_decrease_client'] == 3) {
			$row['myclient'] = '非会员';
		}
		
		$row['mystate'] = '';
		if($row['act_decrease_end'] <= $inttime) {
			$row['mystate'] = '已结束';
		} else if($row['act_decrease_state'] != 1) {
			$row['mystate'] = '停用';
		} else if($row['act_decrease_start'] > $inttime) {
			$row['mystate'] = '未开始';
		} else {
			$row['mystate'] = '活动中';
		}
		$row['mystate2'] = '';
		if($row['act_decrease_start'] > $inttime) {
			$row['mystate2'] = 'a';
		} else if($row['act_decrease_end'] <= $inttime) {
			$row['mystate2'] = 'c';
		} else {
			$row['mystate2'] = 'b';
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