<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strgoto = api_value_get('goto');
$arrgoto = explode(",",$strgoto);
if (count($arrgoto) == 2) {
	$intgoto = api_value_int0($arrgoto[0]);
	$intcid = api_value_int0($arrgoto[1]);
}elseif(count($arrgoto) == 4){
	$intgoto = api_value_int0($arrgoto[0]);
	$intcid = api_value_int0($arrgoto[1]);
	$intwgoods_id = api_value_int0($arrgoto[2]);
	$intparent_id = api_value_int0($arrgoto[3]);
}elseif(count($arrgoto) == 3){
	$intgoto = api_value_int0($arrgoto[0]);
	$intcid = api_value_int0($arrgoto[1]);
	$intparent_id = api_value_int0($arrgoto[2]);
}
$strcode = api_value_get('code');

$strsystem_code = '';
$intid = 0;
$strsql = "SELECT company_id,system_code FROM ".$gdb->fun_table('company')." WHERE company_id = ".$intcid." LIMIT 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

if(!empty($arr)){
	$intid = $arr['company_id'];
	$strsystem_code = $arr['system_code'];
	$GLOBALS['_SESSION']['login_cid'] = $arr['company_id'];
}

$strprefix2 = substr($strsystem_code, 0, 5) . "_" . str_pad(api_value_int0($intid), 4, '0', STR_PAD_LEFT) . '_';

$gdb->pub_prefix2 = $strprefix2;

$arrweixin = laimi_config_weixin();

$intreturn = 0;

$stropenid = '';
if($intreturn == 0) {
	$str = api_value_https('https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $arrweixin['appid'] . '&secret=' . $arrweixin['appsecret'] . '&code=' . $strcode
	. '&grant_type=authorization_code');
	$arr2 = json_decode($str, TRUE);
	if(!empty($arr2)) {
		if(!empty($arr2['openid'])) {
			$stropenid = $arr2['openid'];
		}
	}
	if(empty($stropenid)) {
		$intreturn = 1;
	}
}

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT card_id,card_type_id,card_okey FROM " . $gdb->fun_table2('card') . " WHERE card_okey = '" . $stropenid. "' LIMIT 1";

	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {

		/*$strtoken = '';
		$strjson = api_value_https('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$arrweixin['appid'].'&secret=' . $arrweixin['appsecret']);
		$objjson = json_decode($strjson);
		$strtoken = $objjson->access_token;

		$strnickname = '';
		$strjson = api_value_https('https://api.weixin.qq.com/cgi-bin/user/info?access_token=' . urlencode($strtoken) . '&openid=' . urlencode($stropenid) . '&lang=zh_CN');
		$objjson = json_decode($strjson);
		$strnickname = $objjson->nickname;*/

		/*$strsql = "INSERT INTO " . $gdb->fun_table2('card') . " (card_okey, card_type_id, card_name, card_atime,card_password_state,card_fenxiao,	card_fenxiao2,card_state) VALUES ('"
	. $gdb->fun_escape($stropenid) . "',0,'" . $gdb->fun_escape($strnickname) . "', " . time()
	. ", 2,2,2,1 )";
		$gdb->fun_do($strsql);*/

		/*$intcard_id = mysql_insert_id();*/

		$GLOBALS['_SESSION']['login_type'] = 11;
		/*$GLOBALS['_SESSION']['login_id'] = $intcard_id;*/
		$GLOBALS['_SESSION']['login_cid'] = $intid;
		$GLOBALS['_SESSION']['login_code'] = $strsystem_code;
		$GLOBALS['_SESSION']['login_openid'] = $stropenid;
	} else {
		$GLOBALS['_SESSION']['login_type'] = 11;
		$GLOBALS['_SESSION']['login_id'] = $arr['card_id'];
		$GLOBALS['_SESSION']['login_cid'] = $intid;
		$GLOBALS['_SESSION']['login_code'] = $strsystem_code;
		$GLOBALS['_SESSION']['login_openid'] = $arr['card_okey'];
	}
	
	if($intgoto == 1) {
		header('Location: index.php');
	}else if($intgoto == 2 && count($arrgoto) == 3) {
		$GLOBALS['_SESSION']['login_sid'] = $intparent_id;
		header('Location: shop.php');
	}else if ($intgoto == 3) {
		$GLOBALS['_SESSION']['login_sid'] = $intparent_id;
		header("Location: detail.php?id=".$intwgoods_id);
	}else if($intgoto == 2 && count($arrgoto) == 2){
		header('Location: shop.php');
	}else if($intgoto == 4){
		header('Location: center_shop.php');
	}
}

?>