<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
if($GLOBALS['gtrade']['wshop_module'] != 1) {
	return;
}

$strchannel = 'wshop';

$strexpire = api_value_get('expire');
$intexpire = api_value_int0($strexpire);
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

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('no_send', get_no_send());
$gtemplate->fun_assign('wait_self', get_wait_self());
$gtemplate->fun_assign('unnormal', get_unnormal());
$gtemplate->fun_assign('worder_list', get_worder_list());
$gtemplate->fun_show('wechat_shop_order');

function get_request(){
	$arr = array();
	$arr['search'] = $GLOBALS['strsearch'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	$arr['expire'] = $GLOBALS['intexpire'];
	return $arr;
}

function get_no_send(){
	$strsql = "SELECT count(worder_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('worder')." where worder_state = 1 AND worder_get = 2";
	//echo $strsql;exit();
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	return $arr;
}

function get_wait_self(){
	$strsql = "SELECT count(worder_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('worder')." where worder_state = 1 AND worder_get = 3";
	//echo $strsql;exit();
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	return $arr;
}

function get_unnormal(){
	$strsql = "SELECT count(worder_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('worder')." where worder_state = 11";
	//echo $strsql;exit();
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	return $arr;
}

function get_worder_list(){
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arr = array();
	$arrpackage = array();

 	$strwhere = "";
 	if ($GLOBALS['intexpire'] == 1) {
		$strwhere = $strwhere . " AND worder_state = 1 AND worder_get = 2 ";
	}
	if ($GLOBALS['intexpire'] == 2) {
		$strwhere = $strwhere . " AND worder_state = 1 AND worder_get = 3 ";
	}
	if ($GLOBALS['intexpire'] == 3) {
		$strwhere = $strwhere . " AND worder_state != 1 AND  worder_state != 11 ";
	}
	if ($GLOBALS['intexpire'] == 4) {
		$strwhere = $strwhere . " AND worder_state = 4 ";
	}
	if ($GLOBALS['intexpire'] == 5) {
		$strwhere = $strwhere . " AND worder_state = 11 ";
	}
 	if ($GLOBALS['sqlsearch'] != '') {
 		$strwhere = $strwhere . ' AND (	c_card_name = "'.$GLOBALS['sqlsearch'].'" OR c_card_phone = "'.$GLOBALS['sqlsearch'].'" ) ';
 	}
 	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND worder_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND worder_atime < ' . ($GLOBALS['intto']+86400);
	}
	$strsql = "SELECT count(worder_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('worder')." where 1=1 ".$strwhere;
	//echo $strsql;exit();
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

	$strsql = "SELECT worder_id, worder_atime,card_id,worder_money,worder_pay,worder_state,c_card_type_id, c_card_name,c_card_phone,c_parent_card_name , c_parent_card_phone ,s_worder_reward,worder_get,c_card_type_name FROM " . $GLOBALS['gdb']->fun_table2('worder')." where 1=1 ".$strwhere." ORDER BY worder_id DESC LIMIT ". $intoffset . ", " . $intpagesize;
	//echo $strsql;exit();
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$arr[$key]['pay'] = '';
		if($row['worder_pay'] == 11) {
			$arr[$key]['pay'] = '支付宝';
		} else if($row['worder_pay'] == 21 || $row['worder_pay'] == 22) {
			$arr[$key]['pay'] = '微信';
		}else if($row['worder_pay'] == 31){
			$arr[$key]['pay'] = '卡扣';
		}
	}

	foreach($arr as $key => $row) {
		$arr[$key]['get'] = '';
		if($row['worder_get'] == 2) {
			$arr[$key]['get'] = '邮寄';
		} else if($row['worder_get'] == 3) {
			$arr[$key]['get'] = '用户自取';
		}
	}

	foreach($arr as $key => $row) {
		$arr[$key]['state'] = '';
		if($row['worder_state'] == 1 && $row['worder_get'] == 2) {
			$arr[$key]['state'] = '待处理';
		} else if($row['worder_state'] == 2) {
			$arr[$key]['state'] = '<span style="color:#666666;">已发货</span>';
		} else if($row['worder_state'] == 3) {
			$arr[$key]['state'] = '<span style="color:#666666;">已自取</span>';
		} else if($row['worder_state'] == 4) {
			$arr[$key]['state'] = '<span style="color:#666666;">已退款</span>';
		} else if($row['worder_state'] == 1 && $row['worder_get'] == 3) {
			$arr[$key]['state'] = '等待自取';
		} else if($row['worder_state'] == 11) {
			$arr[$key]['state'] = '订单异常';
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