<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$strcash_state = api_value_get('state');
$intcash_state = api_value_int0($strcash_state);
$strcash_type_id = api_value_get('type');
$intcash_type_id  = api_value_int0($strcash_type_id);
$strfrom = api_value_get('from');
$intfrom = strtotime($strfrom) ? strtotime($strfrom) : 0;
$strto = api_value_get('to');
$intto = strtotime($strto) ? strtotime($strto) : 0;
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

// if($intfrom == 0){
// 	//默认是3个月之前
// 	$strfrom = date('Y-m-d',strtotime('-3 month'));
// 	$intfrom = strtotime($strfrom);
// }else{
// 	//最早日期为一年前
// 	$intfrom = $intfrom < date('Y-m-d',strtotime('-1 year')) ? date('Y-m-d', strtotime('-1 year')) : $intfrom;
// }

$strchannel = 'cash';
$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('cash_type_list', get_cash_type_list());
$gtemplate->fun_assign('cash_list', get_cash_list());
$gtemplate->fun_show('cash');

function get_request(){
	$arr = array();
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	$arr['state'] = $GLOBALS['intcash_state'];
	$arr['type'] = $GLOBALS['intcash_type_id'];
	return $arr;
}
function get_cash_type_list(){
	$arr = array();
	$strsql = "SELECT cash_type_id,cash_type_name FROM ".$GLOBALS['gdb']->fun_table2('cash_type')." WHERE shop_id=".$GLOBALS['_SESSION']['login_sid']." order by cash_type_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_cash_list(){
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	$arr = array();
	$strwhere = '';
	if($GLOBALS['intcash_state'] != 0) {
		$strwhere .= " AND cash_state=" . $GLOBALS['intcash_state'];
	}
	if($GLOBALS['intcash_type_id'] != 0) {
		$strwhere .= " AND cash_type_id=" . $GLOBALS['intcash_type_id'];
	}
	if($GLOBALS['intfrom'] != 0){
			$strwhere .= " and cash_time>=".$GLOBALS['intfrom'];
		}
	if($GLOBALS['intto'] != 0){
		$strwhere .= " and cash_time<=".$GLOBALS['intto'];
	}
	$strwhere .=" and shop_id=".$GLOBALS['intshop'];
	
	$strsql = "SELECT count(cash_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('cash') . " WHERE 1 = 1 ".$strwhere;
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

	$strsql = "SELECT a.*,b.cash_type_name FROM (SELECT cash_id,cash_type_id,cash_name,cash_money,cash_memo,cash_state,cash_time FROM ".$GLOBALS['gdb']->fun_table2('cash')." WHERE 1=1 ".$strwhere." order by cash_id desc limit ". $intoffset . ", " . $intpagesize.") AS a LEFT JOIN ".$GLOBALS['gdb']->fun_table2('cash_type')." AS b on a.cash_type_id=b.cash_type_id order by a.cash_id desc";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row){
		$row['state'] = $row['cash_state'] == '1' ? '收入' : ($row['cash_state'] == '2' ? '支出' : '其它');
		$row['time'] = $row['cash_time'] != '0' ? date('Y-m-d H:i', $row['cash_time']) : '--';
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