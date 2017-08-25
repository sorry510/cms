<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'system';

$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('user_list', get_user_list());
$gtemplate->fun_show('system_user');

function get_request(){
	$arr = array();
	return $arr;
}

function get_user_list(){
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	$arr = array();
	$strwhere = '';
	$strwhere .= " AND user_id!=1";//超管不能被查询和修改
	$strwhere .= " AND user_type!=1";//超管不能被查询和修改
	$strwhere .= " AND shop_id=" . $GLOBALS['_SESSION']['login_sid'];


	$strsql = "SELECT count(user_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('user')  . " WHERE 1 = 1 ".$strwhere;
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


	$strsql = "SELECT user_id,shop_id,user_type,user_account,user_name FROM ". $GLOBALS['gdb']->fun_table2('user')." WHERE 1=1 ". $strwhere. " ORDER BY user_type ASC,user_id DESC LIMIT ". $intoffset . ", " . $intpagesize;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arrlist as $k=>$v){
		if($v['user_type'] == 1){
			$arrlist[$k]['user_power'] = '管理员';
		}else if($v['user_type'] == 2){
			$arrlist[$k]['user_power'] = '店长';
		}else{
			$arrlist[$k]['user_power'] = '收银员';
		}
	}

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	return $arrpackage;
}

?>