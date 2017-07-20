<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'record';

$strsearch = api_value_get('search');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$now = time();

$strstime = date('Y-m-d', $now)." 00:00:00";
$intstime = strtotime($strstime);

$stretime = date('Y-m-d', $now)." 23:59:59";
$intetime = strtotime($stretime);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('card_records_list', get_card_records_list());
$gtemplate->fun_show('record');

function get_request() {
	$arr = array();
	$arr['search'] = $GLOBALS['strsearch'];
	return $arr;
}

function get_card_records_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	// if($GLOBALS['strsearch'] != '') {
	// 	$strwhere = $strwhere . " AND (card_code LIKE '%" . $GLOBALS['strsearch'] . "%'";
	// 	$strwhere = $strwhere . " or card_name LIKE '%" . $GLOBALS['strsearch'] . "%'";
	// 	$strwhere = $strwhere . " or card_phone LIKE '%" . $GLOBALS['strsearch'] . "%')";
	// }
	// if($GLOBALS['intcard_type'] != 0){
	// 	$strwhere .= " and card_type_id=".$GLOBALS['intcard_type'];
	// }
	$strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];
	$strwhere .= " and card_record_atime>=".$GLOBALS['intstime']." and card_record_atime<=".$GLOBALS['intetime'];

	$arr = array();
	$strsql = "SELECT count(card_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('card_record')  . " WHERE 1 = 1 " . $strwhere;
	// echo $strsql;exit;
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
	
	$intpagesize = 10;
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
	
	$strsql = "SELECT a.*,b.shop_name FROM (SELECT card_record_id,card_record_code,card_id,shop_id,card_record_type,card_record_cmoney,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_xianjin,card_record_yinhang,card_record_weixin,card_record_zhifubao,card_record_score,card_record_atime,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " where 1=1 ".$strwhere." ORDER BY card_id DESC LIMIT ". $intoffset . ", " . $intpagesize." ) as a left join ".$GLOBALS['gdb']->fun_table('shop')." as b on a.shop_id = b.shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);

	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
		//var_dump($arrlist);exit;
	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	// echo "<pre>";
	// var_dump($arrlist);
	// echo "</pre>";
	// exit;
	return $arrpackage;
}
?>