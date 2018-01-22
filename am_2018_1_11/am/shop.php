<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

/*$GLOBALS['_SESSION']['login_type'] = 11;
$GLOBALS['_SESSION']['login_id'] = 35;
$GLOBALS['_SESSION']['login_code'] = 'am';
$GLOBALS['_SESSION']['login_cid'] = 1;
$GLOBALS['_SESSION']['login_sid'] = 0;
$GLOBALS['_SESSION']['login_openid'] = '111';*/

$strchannel = "shop";
// $gsession->fun_update();
// $gdb->pub_prefix2 = laimi_prefix2_value();

$gtemplate->fun_assign('notice', get_notice());
$gtemplate->fun_assign('wx_share', get_wx_share());
$gtemplate->fun_show('shop');

function get_notice(){
	$arr = array();
	$strsql = "SELECT wnotice_id,wnotice_title FROM " . $GLOBALS['gdb']->fun_table2('wnotice')." order by wnotice_atime desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_wx_share() {
	$inttime = time();
	
	$arr = array();
	$arr_weixin = laimi_config_weixin();
	$arr['appid'] = $arr_weixin['appid'];
	$arr['timestamp'] = $inttime;
	$arr['nonceStr'] = md5(uniqid(md5(microtime(true)),true));
	$arr['signature'] = '';
	
	$strticket = '';

	$strtoken = '';

	$strjson = api_value_https('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $arr_weixin['appid']
	. '&secret=' . $arr_weixin['appsecret']);

	$objjson = json_decode($strjson);
	$strtoken = $objjson->access_token;
	$strjson = api_value_https('https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=' . $strtoken . '&type=jsapi');
	$objjson = json_decode($strjson);
	$strticket = $objjson->ticket;
	
	$arr['signature'] = sha1('jsapi_ticket=' . $strticket . '&noncestr=' . $arr['nonceStr'] . '&timestamp=' . $arr['timestamp']
	. '&url='.$GLOBALS['gconfig']['project']['url_mobile'].'/shop.php');
	// echo $arr['signature'];exit;
	return $arr;
}
