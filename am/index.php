<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'index';

$gtemplate->fun_assign('ad_list', get_ad_list());
$gtemplate->fun_assign('notice_info', get_notice_info());
$gtemplate->fun_assign('wgoods_list', get_wgoods_list());
$gtemplate->fun_assign('wx_share', get_wx_share());
$gtemplate->fun_show('index');

function get_ad_list() {
	$arr = array();
	if($GLOBALS['gwshop']['ad_image1'] != '') {
		array_push($arr, $GLOBALS['gwshop']['ad_image1']);
	}
	if($GLOBALS['gwshop']['ad_image2'] != '') {
		array_push($arr, $GLOBALS['gwshop']['ad_image2']);
	}
	if($GLOBALS['gwshop']['ad_image3'] != '') {
		array_push($arr, $GLOBALS['gwshop']['ad_image3']);
	}
	return $arr;
}

function get_notice_info() {
	$arr = array();
	$strsql = "SELECT wnotice_id, wnotice_title FROM " . $GLOBALS['gdb']->fun_table2('wnotice') . " ORDER BY wnotice_id DESC LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	return $arr;
}

function get_wgoods_list() {
	$arr = array();
	$strsql = "SELECT wgoods_id, wgoods_name, wgoods_price, wgoods_cprice, wgoods_photo1 FROM " . $GLOBALS['gdb']->fun_table2('wgoods')
	. " WHERE wgoods_commend = 1 ORDER BY wgoods_id DESC LIMIT 50";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row) {
		$row['myprice'] = laimi_wgoods_price($row['wgoods_id'], $row['wgoods_price'], $row['wgoods_cprice']);
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
	. '&url=' . $GLOBALS['gconfig']['url']['weixin'] . '/' . $GLOBALS['_SESSION']['login_code'] . '/index.php');
	return $arrweixin;
}
