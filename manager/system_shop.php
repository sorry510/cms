<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';

$strexpire = api_value_get('expire');
$intexpire = api_value_int0($strexpire);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop_list', get_shop_list());
$gtemplate->fun_assign('province', get_province());
$gtemplate->fun_show('system_shop');


function get_request(){
	$arr = array();
	$arr['expire'] = $GLOBALS['intexpire'];
	return $arr;
}

function get_shop_list() {
	$arr = array();
	$strwhere = '';
	if($GLOBALS['intexpire'] == 0){
		$strwhere .= " and shop_etime >".time();
	}else if($GLOBALS['intexpire'] == 1){
		$strwhere .= " and shop_etime <=".time();
	}
	$strsql = "SELECT shop_id,company_id,shop_name,shop_phone, shop_area_sheng, shop_area_shi,shop_area_jing,shop_area_wei,shop_area_address,shop_limit_user,shop_etime,shop_center FROM " . $GLOBALS['gdb']->fun_table('shop')." where 1=1 ".$strwhere." and company_id=".$GLOBALS['_SESSION']['login_cid']." order by shop_id desc";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		foreach($arr as &$val){
			$val['etime'] = date("Y-m-d", $val['shop_etime']);
			$strsql = "SELECT region_name FROM ".$GLOBALS['gdb']->fun_table('region')." where region_id =".$val['shop_area_sheng'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$val['province'] = $GLOBALS['gdb']->fun_fetch_assoc($hresult)['region_name'];

			$strsql = "SELECT region_name FROM ".$GLOBALS['gdb']->fun_table('region')." where region_id =".$val['shop_area_shi'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$val['city'] = $GLOBALS['gdb']->fun_fetch_assoc($hresult)['region_name'];
		}
	}
	return $arr;
}

function get_province(){
	$arr = array();
	$strsql = "SELECT region_id,region_name FROM ".$GLOBALS['gdb']->fun_table('region')." where parent_id = 1 order by region_id asc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
