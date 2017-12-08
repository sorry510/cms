<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
// require('inc_limit.php');

$strtype = api_value_get('type');
$inttype = api_value_int0($strtype);
$strsize = api_value_get('size');
$intsize = api_value_int0($strsize);
$strname = api_value_get('name');
$sqlname = $gdb->fun_escape($strname);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

function goods_list(){
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrgoods = array();
	$arrpackage = array();
	$strwhere = "";

	if($GLOBALS['inttype'] == 1){
		$strwhere .= " and wgoods_commend = 1";
	}
	if($GLOBALS['sqlname'] != ''){
		$strwhere .= " and wgoods_name like '%".$GLOBALS['sqlname']."%'";
	}
	$strwhere .= " and wgoods_state = 1";
	$arr = array();
	$strsql = "SELECT count(wgoods_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('wgoods') . " WHERE 1=1 ".$strwhere." ORDER BY wgoods_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$intallcount = $arr['mycount'];
	if($intallcount == 0) {
		$arrpackage['page']['allcount'] = 0;
		$arrpackage['page']['pagecount'] = 0;
		$arrpackage['page']['pagenow'] = 0;
		$arrpackage['page']['pagepre'] = 0;
		$arrpackage['page']['pagenext'] = 0;
		$arrpackage['list'] = array();
		return $arrpackage;
	}

	$intpagesize = 2;
	if($GLOBALS['intsize'] != 0){
		$intpagesize = $GLOBALS['intsize'];
	}
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

	$stract_id = '';
	$strsql = "SELECT wact_discount_id FROM ". $GLOBALS['gdb']->fun_table2('wact_discount')." WHERE wact_discount_state = 1 and wact_discount_start < ".time()." and wact_discount_end > ".time();
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as $v){
		$stract_id .= $v['wact_discount_id'].",";
	}
	if(!empty($stract_id)){
		$stract_id = substr($stract_id, 0, -1);
	}

	$strsql = "SELECT wgoods_id,wgoods_name,wgoods_price,wgoods_cprice,wgoods_photo1,wgoods_photo2,wgoods_photo3,wgoods_photo4,wgoods_photo5 FROM " . $GLOBALS['gdb']->fun_table2('wgoods')." WHERE 1=1 ".$strwhere." ORDER BY wgoods_id desc LIMIT ". $intoffset . ", " . $intpagesize;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrgoods as &$row){
		$goodsinfo = laimi_wgoods_price($row['wgoods_id'], $row['wgoods_price'], $row['wgoods_cprice'], $stract_id);
		$row['min_price'] = $goodsinfo['min_price'];
		$row['act_discount_id'] = $goodsinfo['act_discount_id'];
		$row['photo'] = '';
		for($i = 1; $i <= 5; $i++){
			if($row['wgoods_photo'.$i] != 0){
				$row['photo'] = $row['wgoods_photo'.$i];
				break;
			}
		}
	}
	$arrpackage['page']['allcount'] = $intallcount;
	$arrpackage['page']['pagecount'] = $intpagecount;
	$arrpackage['page']['pagenow'] = $intpagenow;
	$arrpackage['page']['pagepre'] = $intpagepre;
	$arrpackage['page']['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrgoods;
	return $arrpackage;
}

echo json_encode(goods_list());