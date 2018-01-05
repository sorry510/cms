<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsprintflag = api_value_post('sprint_flag');
$intsprintflag = api_value_int0($strsprintflag);
$strsprinttitle= api_value_post('sprint_title');
$sqlsprinttitle = $gdb->fun_escape($strsprinttitle);
$strsprintmemo= api_value_post('sprint_memo');
$sqlsprintmemo = $gdb->fun_escape($strsprintmemo);
$strsprintwidth = api_value_post('sprint_width');
$intsprintwidth = api_value_int0($strsprintwidth);
$strsprintdevice= api_value_post('sprint_device');
$sqlsprintdevice = $gdb->fun_escape($strsprintdevice);
$strwprintdevice= api_value_post('wprint_device');
$sqlwprintdevice = $gdb->fun_escape($strwprintdevice);

$intreturn = 0;
if($intreturn == 0) {
	$gprint['sprint_flag'] = $intsprintflag;
	$gprint['sprint_title'] = $strsprinttitle;
	$gprint['sprint_memo'] = $strsprintmemo;
	$gprint['sprint_width'] = $intsprintwidth;
	$gprint['sprint_device'] = $strsprintdevice;
	$gprint['wprint_device'] = $strwprintdevice;
}

if($intreturn == 0){
	$strjson = json_encode($gprint);
	$strsql = "UPDATE " . $gdb->fun_table('shop') . " SET shop_config_print = '" . $gdb->fun_escape($strjson)
	. "' WHERE shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " AND company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>