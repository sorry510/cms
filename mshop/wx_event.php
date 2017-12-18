<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

/*$signature = api_value_get('signature');
$timestamp = api_value_get('timestamp');
$nonce = api_value_get('nonce');
$echostr = api_value_get('echostr');

$token = 'czvzky1411179593';
$tmpArr = array($token, $timestamp, $nonce);
sort($tmpArr, SORT_STRING);
$tmpStr = implode($tmpArr);
$tmpStr = sha1($tmpStr);

if($tmpStr == $signature){
	echo $echostr;
}else{
	echo 'error';
}*/

$strpost = $GLOBALS['HTTP_RAW_POST_DATA'];
$objxml = simplexml_load_string($strpost, 'SimpleXMLElement', LIBXML_NOCDATA);
$strfromuser = trim((string)$objxml->FromUserName);
$strtouser = trim((string)$objxml->ToUserName);
$strevent = trim((string)$objxml->Event);
if($strevent == 'subscribe') {
	echo '<xml>';
	echo '<ToUserName><![CDATA[' . $strfromuser . ']]></ToUserName>';
	echo '<FromUserName><![CDATA[' . $strtouser . ']]></FromUserName>';
	echo '<CreateTime>' . time() . '</CreateTime>';
	echo '<MsgType><![CDATA[text]]></MsgType>';
	echo '<Content><![CDATA[非常感谢您的关注！]]></Content>';
	echo '</xml>';
} else {
	echo '<xml>';
	echo '<ToUserName><![CDATA[' . $strfromuser . ']]></ToUserName>';
	echo '<FromUserName><![CDATA[' . $strtouser . ']]></FromUserName>';
	echo '<CreateTime>' . time() . '</CreateTime>';
	echo '<MsgType><![CDATA[transfer_customer_service]]></MsgType>';
	echo '</xml>';
}

if($strevent != 'subscribe' && $strevent != 'SCAN') {
	return;
}

$strsql = "INSERT INTO " . $gdb->fun_table('company') . " (company_id,company_config_weixin) VALUES (10,'".$strfromuser."|".$strtouser. "')";
$gdb->fun_do($strsql);
/*$strsystem_code = '';
$intid = 0;
$strsql = "SELECT system_code,company_id FROM ".$gdb->fun_table('company')." WHERE company_config_weixin like %appid=".$arrweixin['appid']."%";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intid = $arr['company_id'];
	$strsystem_code = $arr['system_code'];
}
$strprefix2 = substr($strsystem_code, 0, 5) . "_" . str_pad(api_value_int0($intid), 4, '0', STR_PAD_LEFT) . '_';

$gdb->pub_prefix2 = $strprefix2;

$strtoken = '';
$strjson = api_value_https('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $arrweixin['appid']
. '&secret=' . $arrweixin['secret']);
$objjson = json_decode($strjson);
$strtoken = $objjson->access_token;

$stropenid = (string)$objxml->FromUserName;

$strkey = (string)$objxml->EventKey;
if(!empty($strkey)) {
	$strkey = trim($strkey);
	$arrkey = explode("_", $strkey);
	if(count($arrkey) == 1) {//已关注者扫描
		$strid = $strkey;
	} else {//未关注者关注后推送事件
		$strid = $arrkey[1];
	}

}

$strnickname = '';
$strjson = api_value_https('https://api.weixin.qq.com/cgi-bin/user/info?access_token=' . urlencode($strtoken) . '&openid=' . urlencode($stropenid) . '&lang=zh_CN');
$objjson = json_decode($strjson);
$strnickname = $objjson->nickname;

$arr = array();
$strsql = "SELECT card_id FROM " . $gdb->fun_table2('card') . " WHERE card_okey = '" . $gdb->fun_escape($stropenid) . "' LIMIT 1";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);

$intsid = 0;

if(empty($arr)) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('card') . " (card_okey, card_type_id, card_name, card_time, card_atime) VALUES ('"
	. $gdb->fun_escape($stropenid) . "',0,'" . $gdb->fun_escape($strnickname) . "', " . time()
	. ")";
	$gdb->fun_do($strsql);
}*/

?>