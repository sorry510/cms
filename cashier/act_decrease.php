<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strchannel = 'marketing';

$stract_name = api_value_get('act_name');
$sqlact_name = $gdb->fun_escape($stract_name);
/*$strclient = api_value_get('client');
$intclient = api_value_int0($strclient);*/
$strfrom = api_value_get('from');
$strfrom2 = $gdb->fun_escape($strfrom);
$intfrom = strtotime($strfrom2);
$strto = api_value_get('to');
$strto2 = $gdb->fun_escape($strto);
$intto = strtotime($strto2);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$time = time();

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop', get_shop());
$gtemplate->fun_assign('act_decrease_list', get_act_decrease_list());
$gtemplate->fun_show('act_decrease');

function get_request(){
	$arr = array();
/*	$arr['client'] = $GLOBALS['strclient'];*/
	$arr['act_name'] = $GLOBALS['stract_name'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

function get_shop(){
	$arr = array();
	$intcompany_id = $GLOBALS['_SESSION']['login_cid'];
	$strsql = 'SELECT shop_id, shop_name FROM ' . $GLOBALS['gdb']->fun_table('shop') . ' WHERE company_id = ' . $intcompany_id ." AND shop_state = 1 AND ".$GLOBALS['time']." < shop_edate order by shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
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

	$strwhere = '';
	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND act_decrease_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND act_decrease_atime < ' . ($GLOBALS['intto']+86400);
	}
	/*if($GLOBALS['intclient'] !='') {
		if ($GLOBALS['intclient'] != 0) {
			$strwhere = $strwhere . ' AND act_decrease_client = ' . $GLOBALS['intclient'];
		}
	}*/
	if ($GLOBALS['sqlact_name'] != '') {
		$strwhere = $strwhere . " AND act_decrease_name LIKE '%" . $GLOBALS['sqlact_name'] . "%' ";
	}

	$arr = array();
	$strsql = 'SELECT count(act_decrease_id) as datcount FROM ' . $GLOBALS['gdb']->fun_table2('act_decrease') . ' WHERE 1 = 1' . $strwhere;
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


	$strsql = 'SELECT act_decrease_id,act_decrease_name,act_decrease_client,act_decrease_man,act_decrease_jian,act_decrease_start,act_decrease_end,act_decrease_shop,act_decrease_state,act_decrease_memo,act_decrease_atime FROM' . $GLOBALS['gdb']->fun_table2('act_decrease') . ' WHERE 1 = 1' . $strwhere .' ORDER BY act_decrease_id DESC'.' LIMIT ' . $intoffset . ', ' . $intpagesize;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$arr[$key]['clienttype'] = '';
		if($row['act_decrease_client'] == 1) {
			$arr[$key]['clienttype'] = '不限制';
		} else if($row['act_decrease_client'] == 2) {
			$arr[$key]['clienttype'] = '会员';
		}else if ($row['act_decrease_client'] == 3) {
			$arr[$key]['clienttype'] = '非会员';
		}
	}
	foreach($arr as $key => $row) {
		$arr[$key]['shoptype'] = '';
		if($row['act_decrease_shop'] == 1) {
			$arr[$key]['shoptype'] = '全部店铺';
		} else if($row['act_decrease_shop'] == 2) {
			$arr[$key]['shoptype'] = '部分店铺';
		}
	}
	foreach($arr as $key => $row) {
		$arr[$key]['datstate'] = '';
		if($row['act_decrease_end'] < $GLOBALS['time']) {
			$arr[$key]['datstate'] = '已结束';
		}elseif($row['act_decrease_start'] < $GLOBALS['time'] && $GLOBALS['time'] < $row['act_decrease_end']) {
			$arr[$key]['datstate'] = '进行中';
		}elseif ($GLOBALS['time'] < $row['act_decrease_start']) {
			$arr[$key]['datstate'] = '未开始';
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