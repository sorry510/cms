<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';
$inttime1 = time();
$stryear1 = date('Y',$inttime1);

$gtemplate->fun_assign('company_info', get_company_info());
$gtemplate->fun_assign('company_pay_list', get_company_pay_list());
$gtemplate->fun_show('system_company');

function get_company_info() {
	$arr = array();
	$strsql = "SELECT company_id, company_code, company_name, company_phone, company_area_sheng, company_area_shi, company_area_address, company_link_name, company_atime FROM "
	. $GLOBALS['gdb']->fun_table('company') . " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$arr['myyear'] = date('Y') - date('Y', $arr['company_atime']) + 1;
		
		$strsql = "SELECT region_name FROM " . $GLOBALS['gdb']->fun_table('region') . " WHERE region_id = " . $arr['company_area_sheng'] . " LIMIT 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr['mysheng'] = $GLOBALS['gdb']->fun_fetch_assoc($hresult)['region_name'];

		$strsql = "SELECT region_name FROM " . $GLOBALS['gdb']->fun_table('region') . " WHERE region_id = " . $arr['company_area_shi'] . " LIMIT 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr['myshi'] = $GLOBALS['gdb']->fun_fetch_assoc($hresult)['region_name'];
	}
	return $arr;
}

function get_company_pay_list() {
	$arr = array();
	$strsql = "SELECT company_pay_id, company_pay_money, company_pay_memo1, company_pay_memo2, company_pay_memo3, company_pay_atime FROM "
	. $GLOBALS['gdb']->fun_table('company_pay') . " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>