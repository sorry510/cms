<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if(laimi_config_trade()['worker_module'] != 1){
	echo '<script> window.history.back();</script>';
	return false;
}
$strchannel = 'worker';

$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strfrom = api_value_get('from');
$strto = api_value_get('to');
$strsearch = api_value_get('search');


$intfrom = 0;
if($strfrom != ''){
	$intfrom = strtotime($strfrom) ? strtotime($strfrom) : 0;
}
if($intfrom == 0){
	//默认是3个月之前
	$strfrom = date('Y-m-d',strtotime('-3 month'));
	$intfrom = strtotime($strfrom);
}else{
	//最早日期为一年前
	$intfrom = $intfrom < date('Y-m-d', strtotime('-1 year')) ? date('Y-m-d', strtotime('-1 year')) : $intfrom;
}
$intto = 0;
if($strto != ''){
	$intto = strtotime($strto) ? strtotime($strto) : 0;
}

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop_list', get_shop_list());
$gtemplate->fun_assign('reward_list', get_worker_reward_detail_list());//exit;
$gtemplate->fun_show('worker_reward_detail');

function get_request(){
	$arr = array();
	$arr['shop'] = $GLOBALS['intshop'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	$arr['search'] = $GLOBALS['strsearch'];
	return $arr;
}

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

	if($GLOBALS['intshop'] != 0){
		$strwhere .= " AND shop_id=".$GLOBALS['intshop'];
	}
	if($GLOBALS['intfrom'] != 0){
		$strwhere .= " AND worker_reward_atime > ".$GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] != 0){
		$strwhere .= " AND worker_reward_atime < ".$GLOBALS['intto'];
	}
	if($GLOBALS['strsearch'] != '') {
	  $strwhere = $strwhere . " AND (c_worker_name = '" . $GLOBALS['strsearch'] . "'";
	  $strwhere = $strwhere . " or c_worker_code = '" . $GLOBALS['strsearch'] . "')";
	}
	//$strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];

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

	$strsql = "SELECT a.*, b.shop_name FROM ( SELECT worker_reward_id, shop_id, worker_reward_type, worker_reward_money, worker_reward_atime, c_worker_name, c_card_code, c_card_name, c_goods_name,c_goods_count, c_card_record_id,c_card_record_code FROM " . $GLOBALS['gdb']->fun_table2('worker_reward') . " where 1=1 ".$strwhere." ORDER BY worker_reward_id DESC LIMIT ". $intoffset . ", " . $intpagesize . ") AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS b ON a.shop_id = b.shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row){
		if($row['worker_reward_type'] == 1){
			$row['worker_reward_type1'] = '开卡';
		}else if($row['worker_reward_type'] == 2){
			$row['worker_reward_type1'] = '充值';
		}else if($row['worker_reward_type'] == 3){
			$row['worker_reward_type1'] = '消费';
		}else if($row['worker_reward_type'] == 4){
			$row['worker_reward_type1'] = '导购';
		}
		$row['atime'] = date("Y-m-d H:i", $row['worker_reward_atime']);
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