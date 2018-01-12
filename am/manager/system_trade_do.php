<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsms = api_value_post('txtsms');
$intsms = api_value_int0($strsms);
$strscore = api_value_post('txtscore');
$intscore = api_value_int0($strscore);
$strworker = api_value_post('txtworker');
$intworker = api_value_int0($strworker);
$strhistory = api_value_post('txthistory');
$inthistory = api_value_int0($strhistory);
$strstore = api_value_post('txtstore');
$intstore = api_value_int0($strstore);

$intreturn = 0;
if($intreturn == 0) {
	if($GLOBALS['gtrade']['sms_module'] != 1) {
		$intsms = 2;
	}
	if($GLOBALS['gtrade']['score_module'] != 1) {
		$intscore = 2;
	}
	if($GLOBALS['gtrade']['worker_module'] != 1) {
		$intworker = 2;
	}
	if($GLOBALS['gtrade']['history_module'] != 1) {
		$inthistory = 2;
	}
}

if($intreturn == 0) {
	$GLOBALS['gtrade']['sms_flag'] = $intsms;
	$GLOBALS['gtrade']['score_flag'] = $intscore;
	$GLOBALS['gtrade']['worker_flag'] = $intworker;
	$GLOBALS['gtrade']['history_flag'] = $inthistory;
	$GLOBALS['gtrade']['store_count'] = $intstore;
}

if($intreturn == 0) {
	$strjson = json_encode($GLOBALS['gtrade']);
	$strsql = "UPDATE " . $gdb->fun_table('company') . " SET company_config_trade = '" . $gdb->fun_escape($strjson)
	. "' WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>