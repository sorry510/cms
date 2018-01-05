<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['worker_module'] != 1) {
	return;
}

$strchannel = 'worker';

$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strfrom = api_value_get('from');
$strto = api_value_get('to');
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('worker_reward_list', get_worker_reward_list());
$gtemplate->fun_show('worker_reward_detail');

function get_request() {
	$arr = array();
	$arr['shop'] = $GLOBALS['intshop'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	$arr['key'] = $GLOBALS['strkey'];
	return $arr;
}

function get_worker_reward_list() {
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
	if($GLOBALS['strfrom'] != '') {
		$strwhere .= " AND worker_reward_atime >= " . $intfrom;
	}
	if($GLOBALS['strto'] != ''){
		$strwhere .= " AND worker_reward_atime <= " . $intto;
	}
	if($GLOBALS['strkey'] != '') {
	  $strwhere = $strwhere . " AND (c_worker_code = '" . $GLOBALS['sqlkey'] . "'";
	  $strwhere = $strwhere . " or c_worker_name = '" . $GLOBALS['sqlkey'] . "')";
	}

	$arr = array();
	$strsql = "SELECT COUNT(worker_reward_id) AS mycount FROM " . $GLOBALS['gdb']->fun_table2('worker_reward') . " WHERE 1 = 1 " . $strwhere;
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

	$strsql = "SELECT a.*, b.shop_name FROM (SELECT worker_reward_id, shop_id, worker_reward_type, worker_reward_money, worker_reward_atime, c_worker_name, "
	. "c_card_code, c_card_name, c_goods_name, c_goods_count, c_card_record_id, c_card_record_code FROM " . $GLOBALS['gdb']->fun_table2('worker_reward')
	. " WHERE 1 = 1" . $strwhere . " ORDER BY worker_reward_id DESC LIMIT ". $intoffset . ", " . $intpagesize
	. ") AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS b ON a.shop_id = b.shop_id ORDER BY a.worker_reward_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row) {
		$row['mytype'] = '';
		if($row['worker_reward_type'] == 1) {
			$row['mytype'] = '开卡';
		} else if($row['worker_reward_type'] == 2) {
			$row['mytype'] = '充值';
		} else if($row['worker_reward_type'] == 3) {
			$row['mytype'] = '商品';
		} else if($row['worker_reward_type'] == 4) {
			$row['mytype'] = '导购';
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