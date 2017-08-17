<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

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
$time = time();

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop', get_shop());
$gtemplate->fun_assign('money', get_money());
$gtemplate->fun_assign('goods', get_goods());
$gtemplate->fun_assign('act_give_list', get_act_give_list());
$gtemplate->fun_show('act_give');

function get_request(){
	$arr = array();
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

function get_goods(){
	$arr = array();
	$strsql = 'SELECT ticket_goods_id,ticket_goods_name FROM' . $GLOBALS['gdb']->fun_table2('ticket_goods') .' ORDER BY ticket_goods_id';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_money(){
	$arr = array();
	$strsql = 'SELECT ticket_money_id,ticket_money_name FROM' . $GLOBALS['gdb']->fun_table2('ticket_money') .' ORDER BY ticket_money_id';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
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
		$strwhere = $strwhere . ' AND act_give_atime < ' . ($GLOBALS['intto']+86400);
	}
	if ($GLOBALS['sqlact_name'] != '') {
		$strwhere = $strwhere . " AND act_give_name LIKE '%" . $GLOBALS['sqlact_name'] . "%' ";
	}

	$arr = array();
	$strsql = 'SELECT count(act_give_id) as datcount FROM ' . $GLOBALS['gdb']->fun_table2('act_give') . ' WHERE 1 = 1' . $strwhere;
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

	$strsql = 'SELECT act_give_id,act_give_name,act_give_man,act_give_ttype,ticket_goods_id,ticket_money_id,act_give_start,act_give_end,act_give_shop,act_give_state,act_give_memo,act_give_atime,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_mgoods_id,c_mgoods_name,c_ticket_begin FROM' . $GLOBALS['gdb']->fun_table2('act_give') . ' WHERE 1 = 1' . $strwhere .' ORDER BY act_give_id DESC'.' LIMIT ' . $intoffset . ', ' . $intpagesize;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	/*foreach($arr as $key => $row) {
		$arr[$key]['tname'] = '';
		$arr[$key]['ttype'] = '';
		if ($row['act_give_ttype'] == 1) {
			$arr[$key]['ttype'] = '代金券';
			$strsql = 'SELECT ticket_money_id,ticket_money_name FROM' . $GLOBALS['gdb']->fun_table2('ticket_money') . ' WHERE ticket_money_id =' . $row['ticket_money_id'];
			$hresult2 = $GLOBALS['gdb']->fun_query($strsql);
			$arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult2);
			$arr[$key]['tname'] = $arr2['ticket_money_name'];
		}elseif ($row['act_give_ttype'] == 2) {
			$arr[$key]['ttype'] = '体验券';
			$strsql = 'SELECT ticket_goods_id,ticket_goods_name FROM' . $GLOBALS['gdb']->fun_table2('ticket_goods') . ' WHERE ticket_goods_id =' . $row['ticket_goods_id'];
			$hresult2 = $GLOBALS['gdb']->fun_query($strsql);
			$arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult2);
			$arr[$key]['tname'] = $arr2['ticket_goods_name'];
		}
	}*/
	foreach($arr as $key => $row) {
		$arr[$key]['shoptype'] = '';
		if($row['act_give_shop'] == 1) {
			$arr[$key]['shoptype'] = '全部店铺';
		} else if($row['act_give_shop'] == 2) {
			$arr[$key]['shoptype'] = '部分店铺';
		}
	}
	foreach($arr as $key => $row) {
		$arr[$key]['datstate'] = '';
		if($row['act_give_end'] < $GLOBALS['time']) {
			$arr[$key]['datstate'] = '已结束';
		}elseif($row['act_give_start'] < $GLOBALS['time'] && $GLOBALS['time'] < $row['act_give_end']) {
			$arr[$key]['datstate'] = '进行中';
		}elseif ($GLOBALS['time'] < $row['act_give_start']) {
			$arr[$key]['datstate'] = '未开始';
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
		$arr[$key]['ttype'] = '';
		if($row['act_give_ttype'] == 1) {
			$arr[$key]['ttype'] = '代金券';
		} else if($row['act_give_ttype'] == 2) {
			$arr[$key]['ttype'] = '体验券';
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