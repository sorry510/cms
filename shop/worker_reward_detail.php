<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'worker';

$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strdate_from = api_value_get('date_from');
$intdate_from = api_value_int0($strdate_from);
$strdate_to = api_value_get('date_to');
$intdate_to = api_value_int0($strdate_to);
$strworker_name = api_value_get('worker_name');

$gtemplate->fun_assign('shop_id', $intshop_id);
$gtemplate->fun_assign('date_from', $intdate_from);
$gtemplate->fun_assign('date_to', $intdate_to);
$gtemplate->fun_assign('worker_name', $strworker_name);
$gtemplate->fun_assign('shop_list', get_shop_list());
$gtemplate->fun_assign('worker_reward_detail_list', get_worker_reward_detail_list());//exit;
$gtemplate->fun_show('worker_reward_detail');

function get_shop_list() {
	$arr = array();
	$strsql = "SELECT shop_id,shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')." order by shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_worker_reward_detail_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';

	if($GLOBALS['intshop_id'] != 0){
		$strwhere .= " AND shop_id=".$GLOBALS['intshop_id'];
	}
	if($GLOBALS['intdate_from'] != 0){
		$strwhere .= " AND worker_reward_atime > ".$GLOBALS['intdate_from'];
	}
	if($GLOBALS['intdate_to'] != 0){
		$strwhere .= " AND worker_reward_atime < ".$GLOBALS['intdate_to'];
	}
	if($GLOBALS['strworker_name'] != '') {
	  $strwhere = $strwhere . " AND worker_name LIKE '%" . $GLOBALS['strworker_name'] . "%'";
	}

	$arr = array();
	$strsql = "SELECT count(worker_reward_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('worker_reward')  . " WHERE 1 = 1 " . $strwhere;
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
	$intpagesize = 5;
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

	$strsql = "SELECT a.*, b.shop_name FROM ( SELECT worker_reward_id, shop_id, worker_reward_type, worker_reward_money, worker_reward_atime, c_worker_name, c_card_code, c_card_name, c_card_phone, c_card_reocord_code FROM " . $GLOBALS['gdb']->fun_table2('worker_reward') . " where 1=1 ".$strwhere." ORDER BY worker_reward_id DESC LIMIT ". $intoffset . ", " . $intpagesize . ") AS a ," . $GLOBALS['gdb']->fun_table('shop') . " AS b WHERE a.shop_id = b.shop_id ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as $k=>$v){
		if($v['worker_reward_type'] == 1){
			$arrlist[$k]['worker_reward_type1'] = '开卡';
		}else if($v['worker_reward_type'] == 2){
			$arrlist[$k]['worker_reward_type1'] = '充值';
		}else if($v['worker_reward_type'] == 3){
			$arrlist[$k]['worker_reward_type1'] = '商品';
		}else if($v['worker_reward_type'] == 4){
			$arrlist[$k]['worker_reward_type1'] = '导购';
		}
	}

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;

	//echo '<pre>'; var_dump($arrlist); echo '</pre>';
	return $arrpackage;
}
?>