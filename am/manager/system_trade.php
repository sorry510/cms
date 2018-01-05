<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';

$gtemplate->fun_assign('sms_ycount', get_company_info());
$gtemplate->fun_show('system_trade');

function get_company_info() {
	$intycount = 0;
	$arr = array();
	$strsql = "SELECT company_id, company_sms_ycount FROM " . $GLOBALS['gdb']->fun_table('company')
	. " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$intycount = $arr['company_sms_ycount'];
	}
	return $intycount;
}
?>