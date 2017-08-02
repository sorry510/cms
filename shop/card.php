<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'card';
$now = time();
$strcard_type = api_value_get('card_type');
$intcard_type = api_value_int0($strcard_type);
$strsearch = api_value_get('search');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);


$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('cards_list', get_cards_list());
$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_assign('mcombo_list', get_mcombo_list());
$gtemplate->fun_assign('card_type_list', get_card_type_list());
$gtemplate->fun_assign('act_discount_list', get_act_discount_list());
$gtemplate->fun_assign('act_decrease_list', get_act_decrease_list());
$gtemplate->fun_assign('act_give_list', get_act_give_list());
$gtemplate->fun_show('card');

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

	$strwhere = '';
	if($GLOBALS['strsearch'] != '') {
		$strwhere = $strwhere . " AND (card_code LIKE '%" . $GLOBALS['strsearch'] . "%'";
		$strwhere = $strwhere . " or card_name LIKE '%" . $GLOBALS['strsearch'] . "%'";
		$strwhere = $strwhere . " or card_phone LIKE '%" . $GLOBALS['strsearch'] . "%')";
	}
	if($GLOBALS['strcard_type'] != 'all' && $GLOBALS['strcard_type'] != ''){
		$strwhere .= " and card_type_id=".$GLOBALS['intcard_type'];
	}
	$strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];
	$strwhere .= " and card_state!=3";

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
	
	$intpagesize = 20;
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
	
	$strsql = "SELECT card_id,card_code, card_name,card_phone,card_sex,card_birthday_date,card_atime,c_card_type_name,c_card_type_discount,card_edate,card_state,shop_id,s_card_smoney,s_card_ymoney,s_card_sscore,s_card_yscore FROM " . $GLOBALS['gdb']->fun_table2('card') . " where 1=1 ".$strwhere." ORDER BY card_id DESC LIMIT ". $intoffset . ", " . $intpagesize;
	//echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);

	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$v){
		$strsql = "SELECT a.*,b.mgoods_name FROM (SELECT mgoods_id,card_mcombo_gcount,card_mcombo_cedate FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_id=".$v['card_id']." and card_mcombo_type=2 and card_mcombo_cedate>".time().") as a left join ".$GLOBALS['gdb']->fun_table2('mgoods')." as b on a.mgoods_id = b.mgoods_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$v['mcombo'] = $GLOBALS['gdb']->fun_fetch_all($hresult);
	}
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
function get_worker_list(){
	$arr = array();
	$strsql = "SELECT worker_id,worker_name FROM ".$GLOBALS['gdb']->fun_table2('worker'). "where shop_id =".$GLOBALS['_SESSION']['login_sid']." order by worker_name asc";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_mcombo_list(){
	$arr = array();
	$strsql = "SELECT mcombo_id,mcombo_name,mcombo_price,mcombo_cprice FROM ".$GLOBALS['gdb']->fun_table2('mcombo'). "where mcombo_state =1 order by mcombo_id desc";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_act_discount_list(){
	$arr = array();
	$stract_discount_id = '';
	//限时打折活动
	$strsql = "SELECT act_discount_id FROM ".$GLOBALS['gdb']->fun_table2('act_discount_shop')." where shop_id = ".$GLOBALS['_SESSION']['login_sid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as $v){
		$stract_discount_id .=$v['act_discount_id'].",";
	}
	$stract_discount_id = substr($stract_discount_id,0,strlen($stract_discount_id)-1);
	if($stract_discount_id!=''){
		//会员，期限内，正常
		$strsql = "SELECT act_discount_id,act_discount_name FROM " . $GLOBALS['gdb']->fun_table2('act_discount')." where act_discount_start<=".$GLOBALS['now']." and act_discount_end>=".$GLOBALS['now']." and act_discount_state=1 and act_discount_client!=3 and act_discount_id in (".$stract_discount_id.") order by act_discount_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		return $arr;
	}
}
function get_act_decrease_list(){
	$arr = array();
	$stract_decrease_id = '';
	//满减活动
	$strsql = "SELECT act_decrease_id FROM ".$GLOBALS['gdb']->fun_table2('act_decrease_shop')." where shop_id = ".$GLOBALS['_SESSION']['login_sid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as $v){
		$stract_decrease_id .=$v['act_decrease_id'].",";
	}
	$stract_decrease_id = substr($stract_decrease_id,0,strlen($stract_decrease_id)-1);
	if($stract_decrease_id!=''){
		//会员，期限内，正常，按减的价格升序
		$strsql = "SELECT act_decrease_id,act_decrease_name,act_decrease_man,act_decrease_jian FROM " . $GLOBALS['gdb']->fun_table2('act_decrease')." where act_decrease_start<=".$GLOBALS['now']." and act_decrease_end>=".$GLOBALS['now']." and act_decrease_state=1 and act_decrease_client!=3 and act_decrease_id in (".$stract_decrease_id.") order by act_decrease_man desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		return $arr;
	}
}
function get_act_give_list(){
	$arr = array();
	$stract_give_id = '';
	//满送活动
	$strsql = "SELECT act_give_id FROM ".$GLOBALS['gdb']->fun_table2('act_give_shop')." where shop_id = ".$GLOBALS['_SESSION']['login_sid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as $v){
		$stract_give_id .=$v['act_give_id'].",";
	}
	$stract_give_id = substr($stract_give_id,0,strlen($stract_give_id)-1);
	if($stract_give_id!=''){
		//会员，期限内，正常
		$strsql = "SELECT act_give_id,act_give_name,act_give_man,act_give_ttype,ticket_money_id,ticket_goods_id FROM " . $GLOBALS['gdb']->fun_table2('act_give')." where act_give_start<=".$GLOBALS['now']." and act_give_end>=".$GLOBALS['now']." and act_give_state=1 and act_give_client!=3 and act_give_id in (".$stract_give_id.") order by act_give_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		return $arr;
	}
}
?>