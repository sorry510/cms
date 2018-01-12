<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strphone = api_value_post('txtphone');
$sqlphone = $gdb->fun_escape($strphone);
$strsheng = api_value_post('txtsheng');
$intsheng = api_value_int0($strsheng);
$strshi = api_value_post('txtshi');
$intshi = api_value_int0($strshi);
$straddress = api_value_post('txtaddress');
$sqladdress = $gdb->fun_escape($straddress);
$strjing = api_value_post('txtjing');
$decjing = api_value_decimal($strjing, 12);
$strwei = api_value_post('txtwei');
$decwei = api_value_decimal($strwei, 12);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT shop_id FROM " . $gdb->fun_table('shop') . " WHERE shop_id = " . $intid . " AND company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

$inttime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table('shop') . " SET shop_name = '" . $sqlname . "', shop_phone='" . $sqlphone
	. "', shop_area_sheng = " . $intsheng . ", shop_area_shi = " . $intshi . ", shop_area_jing = " . $decjing . ", shop_area_wei = " . $decwei
	. ", shop_area_address = '" . $sqladdress . "', shop_ctime=" . $inttime . " WHERE shop_id = " . $arr['shop_id'] . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}
echo $intreturn;