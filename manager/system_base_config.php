<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
 
$strchannel = 'system';

// var_dump(get_company_config());exit;
$gtemplate->fun_assign('company_config', get_company_config());
$gtemplate->fun_show('system_base_config');

function get_company_config(){
	$arr = array();
	$strsql = "SELECT company_sms_ycount,company_config_trade FROM " . $GLOBALS['gdb']->fun_table('company')." where company_id=".$GLOBALS['_SESSION']['login_cid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$intsms_ycount = $arr['company_sms_ycount'];
	if($arr['company_config_trade'] != ''){
		$arrjson = json_decode($arr['company_config_trade'],true);
	}else{
		$arrjson = array(
			'sms_flag' => 0,
			'score_flag' => 0,
			'reward_flag' => 0,
			'store_warn_count' => 0,
			'erecord_flag' => 0,
			'appoint_flag' => 0
		);
	}

	$arrjson['sms_ycount'] = $intsms_ycount;
	return $arrjson;
}