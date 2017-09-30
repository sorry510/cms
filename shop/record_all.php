<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'record';

$strcard_code = api_value_get('card_code');
$strcard_type_id = api_value_get('card_type_id');
$intcard_type_id = api_value_int0($strcard_type_id);
$strstime = api_value_get('stime');
$stretime = api_value_get('etime');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$now = time();

// $strstime = date('Y-m-d', $now)." 00:00:00";
// $intstime = strtotime($strstime);
$intstime = 0;
if($strstime!=''){
	$intstime = strtotime($strstime)?strtotime($strstime):0;
}

if($intstime == 0){
	//默认是1个月之前
	$strstime = date('Y-m-d',strtotime('-1 month'))." 00:00:00";
	$intstime = strtotime($strstime);
}else{
	//最早日期为一年前
	$intstime = $intstime < date('Y-m-d',strtotime('-1 year'))?date('Y-m-d',strtotime('-1 year')):$intstime;
}

$intetime = 0;
if($stretime!=''){
	$intetime = strtotime($stretime)?strtotime($stretime):0;
}
$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('card_records_list', get_card_records_list());
$gtemplate->fun_assign('card_type_list', get_card_type_list());
$gtemplate->fun_show('record_all');

function get_request() {
	$arr = array();
	$arr['card_code'] = $GLOBALS['strcard_code'];
	$arr['card_type_id'] = $GLOBALS['intcard_type_id'];
	$arr['stime'] = $GLOBALS['strstime'];
	$arr['etime'] = $GLOBALS['stretime'];
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
	if($GLOBALS['strcard_code'] != '') {
		$strwhere .= " and c_card_code='".$GLOBALS['strcard_code']."'";
	}
	if($GLOBALS['intcard_type_id'] != 0){
		$strwhere .= " and c_card_type_id=".$GLOBALS['intcard_type_id'];
	}
	if($GLOBALS['intstime'] != 0){
		$strwhere .= " and card_record_atime>=".$GLOBALS['intstime'];
	}
	if($GLOBALS['intetime'] != 0){
		$strwhere .= " and card_record_atime<=".$GLOBALS['intetime'];
	}
	// $strwhere .= " and card_record_state=1";
	$strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];

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
	
	$strsql = "SELECT a.*,b.shop_name FROM (SELECT card_record_id,card_record_code,card_id,shop_id,card_record_type,card_record_cmoney,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_xianjin,card_record_yinhang,card_record_weixin,card_record_zhifubao,card_record_score,card_record_state,card_record_atime,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " where 1=1 ".$strwhere." ORDER BY card_record_id DESC LIMIT ". $intoffset . ", " . $intpagesize." ) as a left join ".$GLOBALS['gdb']->fun_table('shop')." as b on a.shop_id = b.shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row){
		// $row['card_record_xianjin'] = $row['card_record_xianjin']==0?'--':$row['card_record_xianjin'];
		// $row['card_record_yinhang'] = $row['card_record_yinhang']==0?'--':$row['card_record_yinhang'];
		// $row['card_record_weixin'] = $row['card_record_weixin']==0?'--':$row['card_record_weixin'];
		// $row['card_record_zhifubao'] = $row['card_record_zhifubao']==0?'--':$row['card_record_zhifubao'];
		// $row['card_record_xianjin'] = $row['card_record_xianjin']==0?'--':$row['card_record_xianjin'];
		$row['bianhao'] = str_pad($row['card_record_id'], 10, '0', STR_PAD_LEFT);
	}
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

function get_card_type_list(){
	$arr = array();
	$strsql = "SELECT card_type_id,card_type_name,card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card_type')." order by card_type_discount asc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

?>