<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'money';

$strsearch = api_value_get('search');

$now = time();

// $arrlist = get_act_discount_list();
// echo "<pre>";
// var_dump($arrlist);
// echo "</pre>";
// exit;
$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('sgoods_list', get_sgoods_list());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_assign('act_discount_list', get_act_discount_list());
$gtemplate->fun_assign('act_decrease_list', get_act_decrease_list());
$gtemplate->fun_assign('act_give_list', get_act_give_list());
$gtemplate->fun_show('money');

function get_cards_list() {

	$arr = array();
	$strwhere = '';
	if($GLOBALS['strsearch'] != '') {
		$strwhere = $strwhere . " AND (card_code = '" . $GLOBALS['strsearch'] . "'";
		$strwhere = $strwhere . " or card_name = '" . $GLOBALS['strsearch'] . "'";
		$strwhere = $strwhere . " or card_phone = '" . $GLOBALS['strsearch'] . "')";
	
		$strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];

		$strsql = "SELECT card_id,card_code, card_name,card_phone,card_sex,card_birthday,card_atime,c_card_type_name,c_card_type_discount,card_edate,card_state,shop_id,s_card_smoney,s_card_ymoney,s_card_score FROM " . $GLOBALS['gdb']->fun_table2('card') . " where ".$strwhere." ORDER BY card_id DESC LIMIT 1";
		// echo $strsql;exit;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);

		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

		return $arr;
	}
}
function get_mcombo_list(){
	$arr = array();
	$strsql = "SELECT mcombo_id,mcombo_name,mcombo_price,mcombo_cprice FROM ".$GLOBALS['gdb']->fun_table2('mcombo'). "where mcombo_state =1 order by mcombo_id desc";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_mgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_sgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." order by sgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_mgoods_list(){
	$arr = array();
	$arrmgoods = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$v){
		$strsql = "SELECT mgoods_id, mgoods_name, mgoods_price,mgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_catalog_id = ".$v['mgoods_catalog_id']." ORDER BY mgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$v['mgoods'] = $arrmgoods;
	}
	return $arr;
}
function get_sgoods_list(){
	$arr = array();
	$arrsgoods = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." order by sgoods_catalog_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$v){
		$strsql = "SELECT sgoods_id, sgoods_name, sgoods_price,sgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('sgoods')." WHERE sgoods_catalog_id = ".$v['sgoods_catalog_id']." and shop_id=".$GLOBALS['_SESSION']['login_sid']." ORDER BY sgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrsgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$v['sgoods'] = $arrsgoods;
	}
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
		//非会员，期限内，正常
		$strsql = "SELECT act_discount_id,act_discount_name FROM " . $GLOBALS['gdb']->fun_table2('act_discount')." where act_discount_start<=".$GLOBALS['now']." and act_discount_end>=".$GLOBALS['now']." and act_discount_state=1 and act_discount_client!=2 and act_discount_id in (".$stract_discount_id.") order by act_discount_id desc";
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
		//非会员，期限内，正常
		$strsql = "SELECT act_decrease_id,act_decrease_name,act_decrease_man,act_decrease_jian FROM " . $GLOBALS['gdb']->fun_table2('act_decrease')." where act_decrease_start<=".$GLOBALS['now']." and act_decrease_end>=".$GLOBALS['now']." and act_decrease_state=1 and act_decrease_client!=2 and act_decrease_id in (".$stract_decrease_id.") order by act_decrease_man desc";
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
		//非会员，期限内，正常
		$strsql = "SELECT act_give_id,act_give_name,act_give_man,act_give_ttype,ticket_money_id,ticket_goods_id FROM " . $GLOBALS['gdb']->fun_table2('act_give')." where act_give_start<=".$GLOBALS['now']." and act_give_end>=".$GLOBALS['now']." and act_give_state=1 and act_give_client!=2 and act_give_id in (".$stract_give_id.") order by act_give_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		return $arr;
	}
}
?>