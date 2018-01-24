<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcompany = api_value_get('company');
$intcompany = api_value_int0($strcompany);
$strwgoods = api_value_get('wgoods');
$intwgoods = api_value_int0($strwgoods);
$strparent = api_value_get('parent');
$intparent = api_value_int0($strparent);
$strgoto = api_value_get('goto');

$strhangye = 'am';

// if(api_value_int0($GLOBALS['_SESSION']['login_id']) != 0){
// 	//如果cookie还保持的化直接跳转
// 	header('Location: center.php');
// 	return true;
// }

$arrshare = get_wx_share();

header('Location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $arrshare['appid']
. "&redirect_uri=" . urlencode($GLOBALS['gconfig']['url']['weixin'] . '/' . $strhangye
. '/s_oauth2.php?company=' . $intcompany . '&wgoods=' . $intwgoods . '&parent=' . $intparent . '&goto=' . $strgoto)
. '&response_type=code&scope=snsapi_userinfo#wechat_redirect');

function get_wx_share() {
	$arrweixin = array();
	$arrweixin['appid'] = '';
	$arrweixin['appsecret'] = '';
	$arrweixin['timestamp'] = time();
	$arrweixin['nonceStr'] = md5(uniqid(md5(microtime(true)),true));
	$arrweixin['signature'] = '';
	
	$arr = array();
	$arr2 = array();
	$strsql = "SELECT company_id, company_config_weixin FROM " . $GLOBALS['gdb']->fun_table('company') . " WHERE company_id = " . $GLOBALS['intcompany'] . " LIMIT 1";
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
?>