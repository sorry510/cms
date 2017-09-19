<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'e-record';

$strfrom = api_value_get('from');
$intfrom = strtotime($strfrom) ? strtotime($strfrom) : 0;
$strto = api_value_get('to');
$intto = strtotime($strto) ? strtotime($strto) : 0;
$strsearch = api_value_get('search');
$sqlsearch = $gdb->fun_escape($strsearch);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

if($intfrom == 0){
	//默认是1个月之前
	$strfrom = date('Y-m-d',strtotime('-1 month'))." 00:00:00";
	$intfrom = strtotime($strfrom);
}else{
	//最早日期为一年前
	// $intfrom = $intfrom < date('Y-m-d',strtotime('-1 year')) ? date('Y-m-d',strtotime('-1 year')) : $intfrom;
}


$gtemplate->fun_assign('request',get_request());
$gtemplate->fun_assign('worker_list',get_worker_list());
$gtemplate->fun_assign('record_history',get_record_history());
$gtemplate->fun_show('e-record');

function get_request() {
	$arr = array();
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	$arr['search'] = $GLOBALS['strsearch'];
	return $arr;
}
function get_worker_list(){
	$arr = array();
	$strsql = "SELECT worker_id,worker_name FROM " . $GLOBALS['gdb']->fun_table2('worker')." where shop_id = ".$GLOBALS['_SESSION']['login_sid']." order by worker_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_record_history(){
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if($GLOBALS['strsearch'] != '') {
		$strwhere = $strwhere . " AND (c_card_code LIKE '%" . $GLOBALS['strsearch'] . "%'";
		$strwhere = $strwhere . " or c_card_name LIKE '%" . $GLOBALS['strsearch'] . "%'";
		$strwhere = $strwhere . " or c_card_phone LIKE '%" . $GLOBALS['strsearch'] . "%')";
	}
	if($GLOBALS['intfrom'] != 0){
			$strwhere .= " and card_history_atime>=".$GLOBALS['intfrom'];
		}
	if($GLOBALS['intto'] != 0){
		$strwhere .= " and card_history_atime<=".$GLOBALS['intto'];
	}

	$arr = array();
	$strsql = "SELECT count(card_history_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('card_history')  . " WHERE 1 = 1 " . $strwhere;
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
	
	$strsql = "SELECT card_history_id,card_id,card_record_id,shop_id,card_history_result,card_history_atime,c_card_type_name,c_card_code,c_card_name,c_card_phone,c_card_record_code,c_worker_name FROM " . $GLOBALS['gdb']->fun_table2('card_history') . " where 1=1 ".$strwhere." ORDER BY card_history_id DESC LIMIT ". $intoffset . ", " . $intpagesize;
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);

	// foreach($arrlist as $row){

	// }
	// var_dump($arrlist);exit;
	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	return $arrpackage;
}
?>