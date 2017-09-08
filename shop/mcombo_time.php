<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';

$strsearch = api_value_get('search');
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('mcombo_time_list', get_mcombo_time_list());
$gtemplate->fun_show('mcombo_time');


function get_request() {
	$arr = array();
	$arr['search'] = $GLOBALS['strsearch'];
	return $arr;
}


function get_mcombo_time_list(){
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	$strwhere = '';
	if($GLOBALS['strsearch'] != ""){
		$strwhere = $strwhere . " AND (mcombo_name LIKE '%" . $GLOBALS['strsearch'] . "%'";
		$strwhere = $strwhere . " OR mcombo_code LIKE '%" . $GLOBALS['strsearch'] . "%'";
		$strwhere = $strwhere . " OR mcombo_jianpin LIKE '%" . $GLOBALS['strsearch'] . "%')";
	}
	// $strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];
	$arr = array();
	$strsql = "SELECT count(mcombo_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('mcombo')  . " WHERE mcombo_type = 2 " . $strwhere;
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
	$strsql = "SELECT mcombo_id, mcombo_type, mcombo_code, mcombo_name, mcombo_jianpin, mcombo_price, mcombo_cprice, mcombo_limit_type, mcombo_limit_days, mcombo_limit_months, mcombo_act, mcombo_state, mcombo_atime FROM " . $GLOBALS['gdb']->fun_table2('mcombo') . " where mcombo_type = 2 ".$strwhere." ORDER BY mcombo_id desc LIMIT ". $intoffset . ", " . $intpagesize;
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