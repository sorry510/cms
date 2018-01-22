<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'goods';
$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('wgoods_info', get_wgoods_info());
$gtemplate->fun_assign('wx_share', get_wx_share());
$gtemplate->fun_show('goods');

function get_wgoods_info() {
	$arr = array();
	$strsql = "SELECT wgoods_id, wgoods_name, wgoods_name2, wgoods_price, wgoods_cprice, wgoods_photo1, wgoods_photo2, wgoods_photo3, wgoods_photo4, wgoods_photo5,	wgoods_content FROM " . $GLOBALS['gdb']->fun_table2('wgoods') ." WHERE wgoods_id = " . $GLOBALS['intid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$arr['myphoto'] = array();
		for($i = 1; $i <= 5; $i++) {
			if($arr['wgoods_photo' . $i] != '') {
				array_push($arr['myphoto'], $arr['wgoods_photo' . $i]);
			}
		}
		$arr['myprice'] = laimi_wgoods_price($arr['wgoods_id'], $arr['wgoods_price'], $arr['wgoods_cprice']);
		$arr['myprice']['wact_discount_name'] = '';
		if($arr['myprice']['wact_discount_id'] > 0) {
			$strsql = "SELECT wact_discount_id, wact_discount_name FROM " . $GLOBALS['gdb']->fun_table2('wact_discount')
			. " WHERE wact_discount_id = " . $arr['myprice']['wact_discount_id'] . " LIMIT 1";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arr2)) {
				$arr['myprice']['wact_discount_name'] = $arr2['wact_discount_name'];
			}
		}
	}
	return $arr;
}

function get_wx_share() {
	$arrweixin = array();
	$arrweixin['appid'] = '';
	$arrweixin['appsecret'] = '';
	$arrweixin['timestamp'] = time();
	$arrweixin['nonceStr'] = md5(uniqid(md5(microtime(true)),true));
	$arrweixin['signature'] = '';
	
	$arr = array();
	$arr2 = array();
	$strsql = "SELECT company_id, company_config_weixin FROM " . $GLOBALS['gdb']->fun_table('company')
	. " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$arr2 = json_decode($arr['company_config_weixin'], true);
		if(!empty($arr2)) {
			$arrweixin['appid'] = $arr2['appid'];
			$arrweixin['appsecret'] = $arr2['appsecret'];
		}
	}

	$strtoken = '';
	$strticket = '';
	$strjson = api_http_html('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $arrweixin['appid'] . '&secret=' . $arrweixin['appsecret']);
	$objjson = json_decode($strjson);
	$strtoken = $objjson->access_token;
	$strjson = api_http_html('https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=' . $strtoken . '&type=jsapi');
	$objjson = json_decode($strjson);
	$strticket = $objjson->ticket;
	
	$arrweixin['signature'] = sha1('jsapi_ticket=' . $strticket . '&noncestr=' . $arrweixin['nonceStr'] . '&timestamp=' . $arrweixin['timestamp']
	. '&url=' . $GLOBALS['gconfig']['url']['weixin'] . '/' . $GLOBALS['_SESSION']['login_code'] . '/goods.php?id=' . $GLOBALS['strid']);
	return $arrweixin;
}
?>