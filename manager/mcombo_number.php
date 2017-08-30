<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';

$strmcombo_number_name = api_value_get('mcombo_number_name');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('mgoods_list', get_mgoods_list());//exit;
$gtemplate->fun_assign('mcombo_number_list', get_mcombo_number_list());
$gtemplate->fun_show('mcombo_number');


function get_request() {
	$arr = array();
	$arr['mcombo_number_name'] = $GLOBALS['strmcombo_number_name'];
	return $arr;
}

function get_mgoods_catalog_list() {
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
} 

function get_mgoods_list() {
	$arr = array();
	$arrmgoods = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	//return $arr;
	foreach($arr as $k=>$v){
		$strsql = "SELECT mgoods_id, mgoods_name, mgoods_price FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_catalog_id = ".$v['mgoods_catalog_id']." and mgoods_state=1 ORDER BY mgoods_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$arr[$k]['mgoods'] = $arrmgoods;
	}
	return $arr;
} 

function get_mcombo_number_list(){
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	$strwhere = '';
	if($GLOBALS['strmcombo_number_name'] != ""){
		$strwhere = $strwhere . " AND (mcombo_name LIKE '%" . $GLOBALS['strmcombo_number_name'] . "%')";
	}
	// $strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];
	$arr = array();
	$strsql = "SELECT count(mcombo_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('mcombo')  . " WHERE mcombo_type = 1 " . $strwhere;
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
	$strsql = "SELECT mcombo_id, mcombo_type, mcombo_code, mcombo_name, mcombo_jianpin, mcombo_price, mcombo_cprice, mcombo_limit_type, mcombo_limit_days, mcombo_limit_months, mcombo_act, mcombo_state, mcombo_atime FROM " . $GLOBALS['gdb']->fun_table2('mcombo') . " where mcombo_type = 1 ".$strwhere." ORDER BY mcombo_id desc LIMIT ". $intoffset . ", " . $intpagesize; 	
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	/*foreach($arrlist as &$v){
		if(mb_strlen($v['mcombo_name'])>10){
			$v['mcombo_name2'] = mb_substr($v['mcombo_name'],0,10)."...";
		}else{
			$v['mcombo_name2'] = $v['mcombo_name'];
		}
	}*/
	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	return $arrpackage;
}
?>