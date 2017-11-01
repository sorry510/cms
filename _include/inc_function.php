<?php
if(!defined('C_CNFLY')) {
	exit();
}

function laimi_prefix2_value() {
	$str = '';
	if(!empty($GLOBALS['_SESSION']['login_type'])) {
		$str = substr($GLOBALS['_SESSION']['login_code'], 0, 5) . "_"
		. str_pad(api_value_int0($GLOBALS['_SESSION']['login_cid']), 4, '0', STR_PAD_LEFT) . '_';
	}
	return $str;
}

function laimi_company_name() {
	$str = '';
	$arr = array();
	$strsql = "SELECT company_id, company_name FROM " . $GLOBALS['gdb']->fun_table('company')
	. " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$str = $arr['company_name'];
	return $str;
}

function laimi_shop_list(){
	$arr = array();
	$strsql = "SELECT shop_id, shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')
	. " WHERE shop_etime > " . time() . " ORDER BY shop_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

// // 获取当前用户姓名
// function userName(){
// 	$arr = array();
// 	$strsql = "SELECT user_name FROM ".$GLOBALS['gdb']->fun_table2('user'). " WHERE user_id=".$GLOBALS['_SESSION']['login_id'];
// 	$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
// 	$user_name = $arr['user_name'];
// 	return $user_name;
// }

// function companyState(){
// 	$arr = array();
// 	$strsql = "SELECT company_state FROM ".$GLOBALS['gdb']->fun_table('company'). " WHERE company_id=".$GLOBALS['_SESSION']['login_cid'];
// 	$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
// 	$company_state = $arr['company_state'];
// 	return $company_state;
// }

// function shopEdate(){
// 	$arr = array();
// 	$strsql = "SELECT shop_edate FROM ".$GLOBALS['gdb']->fun_table('shop'). " WHERE shop_id=".$GLOBALS['_SESSION']['login_sid'];
// 	$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
// 	$shop_edate = $arr['shop_edate'];
// 	return $shop_edate;
// }

// function shopState(){
// 	$arr = array();
// 	$strsql = "SELECT shop_state FROM ".$GLOBALS['gdb']->fun_table('shop'). " WHERE shop_id=".$GLOBALS['_SESSION']['login_sid'];
// 	$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
// 	$shop_state = $arr['shop_state'];
// 	return $shop_state;
// }
// // 正常的没有过期的店铺

// get系统基础配置信息
function laimi_config_trade(){
	$arr = array();
	$arrtrade = array();
	$arrtrade_init = array(
					'sms_module' => 2,
					'score_module' => 2,
					'worker_module' => 2,
					'history_module' => 2,
					'act_module' => 2,
					'wmp_module' => 2,
					'wsc_module' => 2,
					'sms_flag' => 2,
					'score_flag' => 2,
					'worker_flag' => 2,
					'history_flag' => 2,
					'store_count' => 0
				);
	$strsql = "SELECT company_config_trade FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id=" . $GLOBALS['_SESSION']['login_cid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		if(!empty($arr['company_config_trade'])){
			$arrtrade = json_decode($arr['company_config_trade'], true);
			if(!$arrtrade){
				$arrtrade = $arrtrade_init;
			}
		}else{
			$arrtrade = $arrtrade_init;
		}
	}
	return $arrtrade;
}

function laimi_config_weixin(){
	$arr = array();
	$arrweixin = array();
	$arrweixin_init = array(
					'name' => '',
					'appid' => '',
					'appsecret' => '',
					'reserve_flag' => 2,
					'line_flag' => 2,
					'card_image' => '',
				);
	$strsql = "SELECT company_config_weixin FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id=" . $GLOBALS['_SESSION']['login_cid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		if(!empty($arr['company_config_weixin'])){
			$arrweixin = json_decode($arr['company_config_weixin'], true);
			if(!$arrweixin){
				$arrweixin = $arrweixin_init;
			}
		}else{
			$arrweixin = $arrweixin_init;
		}
	}
	return $arrweixin;
}