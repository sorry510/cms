<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';
$strpage = api_value_get('page');
$intpage = api_value_int1('page');
$strto = api_value_get('to');
$intto = strtotime($strto)==false?0:strtotime($strto);
$strfrom = api_value_get('from');
$intfrom = strtotime($strfrom)==false?0:strtotime($strfrom);
$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strsearch = api_value_get('search');
$sqlsearch = $gdb->fun_escape($strsearch);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('gift_list', get_gift_list());
$gtemplate->fun_assign('shop_list', get_shop_list());
$gtemplate->fun_assign('gift_record_list', get_gift_record_list());
$gtemplate->fun_show('system_score');

function get_request(){
	$arr = array();
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	$arr['shop_id'] = $GLOBALS['intshop_id'];
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

function get_gift_list(){
	$arr = array();
	$strsql = "SELECT gift_id,gift_name,gift_score FROM ". $GLOBALS['gdb']->fun_table2('gift')." ORDER BY gift_id DESC ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_gift_record_list(){
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	$arr = array();
	$strwhere = '';
	
	if($GLOBALS['intshop_id'] != 0){
		$strwhere .= " AND shop_id=".$GLOBALS['intshop_id'];
	}
	if($GLOBALS['intfrom'] != 0){
		$strwhere .= " AND gift_record_atime>=".$GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] != 0){
		$strwhere .= " AND gift_record_atime<=".$GLOBALS['intto'];
	}
	if($GLOBALS['strsearch'] != ''){
		$strwhere .= " AND (c_card_code like '%".$GLOBALS['strsearch']."%'";
		$strwhere .= " OR c_card_phone like '%".$GLOBALS['strsearch']."%'";
		$strwhere .= " OR c_card_name like '%".$GLOBALS['strsearch']."%')";
	}
	// $strwhere .= " AND shop_id=".$GLOBALS['_SESSION']['login_sid'];
	
	$strsql = "SELECT count(gift_record_id) as mycount FROM ". $GLOBALS['gdb']->fun_table2('gift_record') ." WHERE 1 = 1 ".$strwhere;
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


	$strsql = "SELECT gift_record_id,gift_score,c_card_code,c_card_type_name,gift_record_atime FROM ". $GLOBALS['gdb']->fun_table2('gift_record')." WHERE 1=1 ". $strwhere. " ORDER BY gift_record_id DESC LIMIT ". $intoffset . ", " . $intpagesize;
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row1){
		$row1['gift_goods'] = '';
		$strsql = "SELECT c_gift_name,gift_count FROM ".$GLOBALS['gdb']->fun_table2('gift_record_goods')." WHERE gift_record_id=".$row1['gift_record_id'];
		// echo $strsql;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		foreach($arr as $row2){
			$row1['gift_goods'] .= $row2['c_gift_name']."*".$row2['gift_count'].",";
		}
		$row1['gift_goods'] = substr($row1['gift_goods'],0,strlen($row1['gift_goods'])-1);
		// echo $row1['gift_goods'];
		// echo "<br/>";
	}
	// echo "<pre>";
	// var_dump($arrlist);
	// echo "</pre>";exit;
	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	return $arrpackage;
}

?>