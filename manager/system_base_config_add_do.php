<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strpassword_flag = api_value_post('password');
$intpassword_flag = api_value_int0($strpassword_flag);
$strsms_flag = api_value_post('sms');
$intsms_flag = api_value_int0($strsms_flag);
$strsms_ycount = api_value_post('sms_ycount');
$intsms_ycount = api_value_int0($strsms_ycount);
$strscore_flag= api_value_post('score');
$intscore_flag = api_value_int0($strscore_flag);
$strreward_flag = api_value_post('reward');
$intreward_flag = api_value_int0($strreward_flag);
$strstore_warn_count = api_value_post('store_warn');
$intstore_warn_count = api_value_int0($strstore_warn_count);
$strerecord_flag = api_value_post('erecord');
$interecord_flag = api_value_int0($strerecord_flag);

$intreturn = 0;
$arr = array(
		'password_flag' => $intpassword_flag,
		'sms_flag' => $intsms_flag,
		'score_flag' => $intscore_flag,
		'reward_flag' => $intreward_flag,
		'store_warn_count' => $intstore_warn_count,
		'erecord_flag' => $interecord_flag
	);
$strjson_config = json_encode($arr);

$strsql = "UPDATE " . $gdb->fun_table('company') . " SET company_sms_ycount=" . $intsms_ycount . ",	company_config_trade='" . $strjson_config . "' where company_id=" . $GLOBALS['_SESSION']['login_cid'];
$hresult = $gdb->fun_do($strsql);

if(!$hresult){
	$intreturn = 1;
}

echo $intreturn;