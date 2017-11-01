<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsms = api_value_post('txtsms');
$intsms = api_value_int0($strsms);
$strscore = api_value_post('txtscore');
$intscore = api_value_int0($strscore);
$strreward = api_value_post('txtreward');
$intreward = api_value_int0($strreward);
$strhistory = api_value_post('txthistory');
$inthistory = api_value_int0($strhistory);
$strstore = api_value_post('txtstore');
$intstore = api_value_int0($strstore);

$intreturn = 0;
$arr = array();

$arrtrade = laimi_config_trade();

if($arrtrade['sms_module'] != 1){
	$intsms = 2;
}
if($arrtrade['score_module'] != 1){
	$intscore = 2;
}
if($arrtrade['worker_module'] != 1){
	$intreward = 2;
}
if($arrtrade['history_module'] != 1){
	$inthistory = 2;
}

$arrtrade['sms_flag'] = $intsms;
$arrtrade['score_flag'] = $intscore;
$arrtrade['worker_flag'] = $intreward;
$arrtrade['history_flag'] = $inthistory;
$arrtrade['store_count'] = $intstore;

$strjson_trade = json_encode($arrtrade);
// echo $strjson_trade;return;
$strsql = "UPDATE " . $gdb->fun_table('company') . " SET company_config_trade='" . $strjson_trade . "' where company_id=" . $GLOBALS['_SESSION']['login_cid'] . " LIMIT 1";
$hresult = $gdb->fun_do($strsql);

if(!$hresult){
	$intreturn = 2;
}

echo $intreturn;
?>