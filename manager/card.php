<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'card';
$strstate = api_value_get('state');
$intstate = api_value_int0($strstate);
$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strcard_type = api_value_get('cardtype');
$intcard_type = api_value_int0($strcard_type);
$strsearch = api_value_get('search');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop_list', get_shop_list());
$gtemplate->fun_assign('card_list', get_card_list());
$gtemplate->fun_assign('card_type_list', get_card_type_list());
$gtemplate->fun_show('card');

function get_request() {
	$arr = array();
	$arr['state'] = $GLOBALS['intstate'];
	$arr['shop'] = $GLOBALS['intshop'];
	$arr['cardtype'] = $GLOBALS['strcard_type'];
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
function get_card_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if($GLOBALS['strcard_type'] != 'all' && $GLOBALS['strcard_type'] != ''){
		$strwhere .= " and card_type_id=".$GLOBALS['intcard_type'];
	}
	if($GLOBALS['intshop'] != 0){
		$strwhere .= " and shop_id=".$GLOBALS['intshop'];
	}
	if($GLOBALS['strsearch'] != '') {
		$strwhere = $strwhere . " AND (card_code='" . $GLOBALS['strsearch'] . "'";
		$strwhere = $strwhere . " or card_name='" . $GLOBALS['strsearch'] . "'";
		$strwhere = $strwhere . " or card_phone='" . $GLOBALS['strsearch'] . "')";
	}
	if($GLOBALS['intstate'] == 1){
		$strwhere .= " and card_state!=3";
	}else if($GLOBALS['intstate'] == 2){
		$strwhere .= " and card_edate<=".time()." and card_edate!=0";
		$strwhere .= " and card_state!=3";
	}else if($GLOBALS['intstate'] == 3){
		$strwhere .= " and card_state=3";
	}else{
		$strwhere .= " and card_state=0";
	}
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
	
	$strsql = "SELECT a.*,b.shop_name FROM (SELECT card_id,card_code,card_okey,card_name,card_phone,card_sex,card_birthday_date,card_atime,c_card_type_name,c_card_type_discount,card_edate,card_state,shop_id,s_card_smoney,s_card_ymoney,s_card_sscore,s_card_yscore FROM " . $GLOBALS['gdb']->fun_table2('card') . " where 1=1 ".$strwhere." ORDER BY card_id DESC LIMIT ". $intoffset . ", " . $intpagesize.") as a LEFT JOIN ".$GLOBALS['gdb']->fun_table('shop')." as b on a.shop_id=b.shop_id";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);

	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	// card_mcombo
	foreach($arrlist as &$row){
		$row['sex'] = $row['card_sex'] == '1' ? '男' : ($row['card_sex'] == '2' ? '女':'保密');
		$row['birthday'] = $row['card_birthday_date'] == 0 ? '--' : date("Y-m-d",$row['card_birthday_date']);
		$row['atime'] = date("Y-m-d",$row['card_atime']);
		$row['discount'] = $row['c_card_type_discount'] == 0 ? 10 : $row['c_card_type_discount'];
		$row['edate'] = $row['card_edate'] == 0 ? '--' : date("Y-m-d",$row['card_edate']);
		$row['state'] = $row['card_state']=='1' ? '正常' : '停用';
		$strsql = "SELECT c_mgoods_name,c_mcombo_type,card_mcombo_gcount,card_mcombo_cedate FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_id=".$row['card_id']." and card_mcombo_type=2 and card_mcombo_cedate>".time();
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$row['mcombo'] = $GLOBALS['gdb']->fun_fetch_all($hresult);

		// $strsql = "SELECT ticket_type,c_ticket_name,c_ticket_value,card_ticket_edate FROM ".$GLOBALS['gdb']->fun_table2('card_ticket')." where card_id=".$row['card_id']." and card_ticket_state=1 and card_ticket_edate>".time();
		// $hresult = $GLOBALS['gdb']->fun_query($strsql);
		// $row['ticket'] = $GLOBALS['gdb']->fun_fetch_all($hresult);
	}
	unset($row);
	// var_dump($arrlist);exit;
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