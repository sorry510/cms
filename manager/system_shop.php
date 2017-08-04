<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'system';

$gtemplate->fun_assign('shop_info', get_shop_info());
$gtemplate->fun_assign('province', get_province());
$gtemplate->fun_show('system_shop');

function get_shop_info() {
	$arr = array();
	$strsql = "SELECT company_id,shop_name,shop_phone, shop_area_sheng, shop_area_shi,shop_area_address,shop_limit_user,shop_edate FROM " . $GLOBALS['gdb']->fun_table('shop')." where company_id=".$GLOBALS['_SESSION']['login_cid']." and shop_state = 1";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		foreach($arr as &$val){
			$strsql = "SELECT region_name FROM ".$GLOBALS['gdb']->fun_table('region')." where region_id =".$arr['shop_area_sheng'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$val['province'] = $GLOBALS['gdb']->fun_fetch_assoc($hresult)['region_name'];

			$strsql = "SELECT region_name FROM ".$GLOBALS['gdb']->fun_table('region')." where region_id =".$arr['shop_area_shi'];
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
?>