<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'store';

$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$strtype = api_value_get('type');
$inttype = api_value_int0($strtype);
$strcatalog = api_value_get('catalog');
$intcatalog = api_value_int0($strcatalog);
$strsearch = api_value_get('search');
$sqlsearch = $gdb->fun_escape($strsearch);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('catalog_list', get_catalog_list());
$gtemplate->fun_assign('store_list', get_store_list());
$gtemplate->fun_show('store_info');


function get_request(){
	$arr = array();
	$arr['type'] = $GLOBALS['inttype'];
	$arr['catalog'] = $GLOBALS['intcatalog'];
	$arr['search'] = $GLOBALS['strsearch'];
	return $arr;
}

function get_catalog_list() {
	$arr = array();
	if($GLOBALS['inttype'] == 1){
		$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id desc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	}else if($GLOBALS['inttype'] == 2){
		$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." order by sgoods_catalog_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	}
	return $arr;
}

function get_store_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere1 = '';
	$strwhere2 = '';
	if($GLOBALS['inttype'] == 1){
		if($GLOBALS['intcatalog'] != 0){
			$strwhere2 .= " AND mgoods_catalog_id=".$GLOBALS['intcatalog'];
		}
		if($GLOBALS['strsearch'] != '') {
		  $strwhere2 .= " AND (mgoods_name = '" . $GLOBALS['strsearch'] . "'";
		  $strwhere2 .= " OR mgoods_jianpin = '" . $GLOBALS['strsearch'] . "'";
		  $strwhere2 .= " OR mgoods_code = '" . $GLOBALS['strsearch'] . "')";
		}

		$strwhere1 .=" AND mgoods_id != 0 AND shop_id=".$GLOBALS['intshop'];

		$arr = array();
		$strsql = "SELECT count(a.store_info_id) as mycount FROM (SELECT store_info_id, mgoods_id, shop_id, store_info_count FROM " . $GLOBALS['gdb']->fun_table2('store_info') . " where 1=1 ".$strwhere1." ORDER BY mgoods_id asc) AS a join (SELECT mgoods_id, mgoods_name, mgoods_catalog_id, mgoods_code, mgoods_price, mgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('mgoods') . " where 1=1 ".$strwhere2.") AS b on a.mgoods_id = b.mgoods_id";
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
		
		$strsql1 = "SELECT a.store_info_id,a.shop_id,a.store_info_count,b.mgoods_id,b.mgoods_name,b.mgoods_catalog_id,b.mgoods_code,b.mgoods_price,b.mgoods_cprice FROM (SELECT store_info_id, mgoods_id, shop_id, store_info_count FROM " . $GLOBALS['gdb']->fun_table2('store_info') . " where 1=1 ".$strwhere1." ORDER BY store_info_id desc) AS a join (SELECT mgoods_id, mgoods_name, mgoods_catalog_id, mgoods_code, mgoods_price, mgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('mgoods') . " where 1=1 ".$strwhere2.") AS b on a.mgoods_id = b.mgoods_id";

		$strsql = "SELECT c.*,d.shop_name,e.mgoods_catalog_name FROM (".$strsql1." LIMIT ". $intoffset . ", " . $intpagesize.") as c left join ".$GLOBALS['gdb']->fun_table('shop')." as d on c.shop_id=d.shop_id left join ".$GLOBALS['gdb']->fun_table2('mgoods_catalog')." as e on c.mgoods_catalog_id=e.mgoods_catalog_id";

		// echo $strsql;exit;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
		//var_dump($arrlist);exit;

		$arrpackage['allcount'] = $intallcount;
		$arrpackage['pagecount'] = $intpagecount;
		$arrpackage['pagenow'] = $intpagenow;
		$arrpackage['pagepre'] = $intpagepre;
		$arrpackage['pagenext'] = $intpagenext;
		$arrpackage['list'] = $arrlist;
	}else if($GLOBALS['inttype'] == 2){
		if($GLOBALS['intcatalog'] != 0){
			$strwhere2 .= " AND sgoods_catalog_id=".$GLOBALS['intcatalog'];
		}
		if($GLOBALS['strsearch'] != '') {
		  $strwhere2 .= " AND (sgoods_name = '" . $GLOBALS['strsearch'] . "'";
		  $strwhere2 .= " OR sgoods_jianpin = '" . $GLOBALS['strsearch'] . "'";
		  $strwhere2 .= " OR sgoods_code = '" . $GLOBALS['strsearch'] . "')";
		}

		$strwhere1 .=" AND sgoods_id != 0 AND shop_id=".$GLOBALS['intshop'];

		$arr = array();
		$strsql = "SELECT count(a.store_info_id) as mycount FROM (SELECT store_info_id, sgoods_id, shop_id, store_info_count FROM " . $GLOBALS['gdb']->fun_table2('store_info') . " where 1=1 ".$strwhere1." ORDER BY sgoods_id asc) AS a join (SELECT sgoods_id, sgoods_name, sgoods_catalog_id, sgoods_code, sgoods_price, sgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('sgoods') . " where 1=1 ".$strwhere2.") AS b on a.sgoods_id = b.sgoods_id";
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
		
		$strsql1 = "SELECT a.store_info_id,a.shop_id,a.store_info_count,b.sgoods_id,b.sgoods_name,b.sgoods_catalog_id,b.sgoods_code,b.sgoods_price,b.sgoods_cprice FROM (SELECT store_info_id, sgoods_id, shop_id, store_info_count FROM " . $GLOBALS['gdb']->fun_table2('store_info') . " where 1=1 ".$strwhere1." ORDER BY store_info_id desc) AS a join (SELECT sgoods_id, sgoods_name, sgoods_catalog_id, sgoods_code, sgoods_price, sgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('sgoods') . " where 1=1 ".$strwhere2.") AS b on a.sgoods_id = b.sgoods_id";

		$strsql = "SELECT c.*,d.shop_name,e.sgoods_catalog_name FROM (".$strsql1." LIMIT ". $intoffset . ", " . $intpagesize.") as c left join ".$GLOBALS['gdb']->fun_table('shop')." as d on c.shop_id=d.shop_id left join ".$GLOBALS['gdb']->fun_table2('sgoods_catalog')." as e on c.sgoods_catalog_id=e.sgoods_catalog_id";

		// echo $strsql;exit;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
		//var_dump($arrlist);exit;

		$arrpackage['allcount'] = $intallcount;
		$arrpackage['pagecount'] = $intpagecount;
		$arrpackage['pagenow'] = $intpagenow;
		$arrpackage['pagepre'] = $intpagepre;
		$arrpackage['pagenext'] = $intpagenext;
		$arrpackage['list'] = $arrlist;
	}
	//var_dump($arrlist);exit;
	return $arrpackage;
}
?>