<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';
$strexpire = api_value_get('expire');
$intexpire = api_value_int0($strexpire);

$gtemplate->fun_assign('shop_list', get_shop_list());
$gtemplate->fun_assign('region_list', get_region_list());
$gtemplate->fun_show('system_shop');

function get_shop_list() {
	$inttime = time();
	
	$strwhere = '';
	if($GLOBALS['intexpire'] == 1) {
		$strwhere .= " AND shop_etime <= " . $inttime;
	} else {
		$strwhere .= " AND shop_etime > " . $inttime;
	}
	
	$arr = array();
	$arr2 = array();
	$strsql = "SELECT shop_id, shop_name, shop_phone, shop_area_sheng, shop_area_shi, shop_area_jing, shop_area_wei, shop_area_address, shop_limit_user, shop_etime, shop_center FROM "
	. $GLOBALS['gdb']->fun_table('shop') . " WHERE 1 = 1" . $strwhere . " AND company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " ORDER BY shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$row['mysheng'] = '';
		$strsql = "SELECT region_name FROM " . $GLOBALS['gdb']->fun_table('region') . " WHERE region_id = " . $row['shop_area_sheng'] . " LIMIT 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr2)) {
			$row['mysheng'] = $arr2['region_name'];
		}

		$row['myshi'] = '';
		$strsql = "SELECT region_name FROM " . $GLOBALS['gdb']->fun_table('region') . " WHERE region_id = " . $row['shop_area_shi'] . " LIMIT 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr2)) {
			$row['myshi'] = $arr2['region_name'];
		}
	}
	return $arr;
}

function get_region_list(){
	$arr = array();
	$strsql = "SELECT region_id, region_name FROM " . $GLOBALS['gdb']->fun_table('region') . " WHERE parent_id = 1 ORDER BY region_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>