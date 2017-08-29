<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'card';
$strcard_type = api_value_get('card_type');
$intcard_type = api_value_int0($strcard_type);
$strsearch = api_value_get('search');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);


$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('cards_list', get_cards_list());
$gtemplate->fun_assign('card_type_list', get_card_type_list());
$gtemplate->fun_show('card3');

function get_request() {
	$arr = array();
	$arr['card_type'] = $GLOBALS['strcard_type'];
	$arr['search'] = $GLOBALS['strsearch'];
	return $arr;
}

function get_cards_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	$now = time();

	$strwhere = '';

	$strwhere = $strwhere . " AND (card_code='" . $GLOBALS['strsearch'] . "'";
	$strwhere = $strwhere . " or card_name='" . $GLOBALS['strsearch'] . "'";
	$strwhere = $strwhere . " or card_phone='" . $GLOBALS['strsearch'] . "')";
	
	if($GLOBALS['intcard_type'] != 'all'){
		$strwhere .= " and card_type_id=".$GLOBALS['intcard_type'];
	}
	//当搜索不为空时，全店铺搜索
	if($GLOBALS['strsearch'] == ''){
		$strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];
	}
	$strwhere .= " and card_state=3";

	$arr = array();
	$strsql = "SELECT count(card_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('card')  . " WHERE 1 = 1 " . $strwhere;
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
	
	$strsql = "SELECT a.*,b.shop_name FROM (SELECT card_id,card_code,card_okey,card_name,card_phone,card_sex,card_birthday_date,card_atime,c_card_type_name,c_card_type_discount,card_edate,card_state,shop_id,s_card_smoney,s_card_ymoney,s_card_sscore,s_card_yscore FROM " . $GLOBALS['gdb']->fun_table2('card') . " where 1=1 ".$strwhere." ORDER BY card_id DESC LIMIT ". $intoffset . ", " . $intpagesize.") as a LEFT JOIN ".$GLOBALS['gdb']->fun_table('shop')." as b on a.shop_id=b.shop_id";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);

	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
		//var_dump($arrlist);exit;
	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
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