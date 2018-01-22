<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strphone = api_value_post('phone');
$sqlphone = $gdb->fun_escape($strphone);
$strverify = api_value_post('verify');
$sqlverify = $gdb->fun_escape($strverify);
$stropenid = $GLOBALS['_SESSION']['login_openid'];

$intreturn = 0;
// 先查验证码是否正确
$strsql = "SELECT valid_id,valid_time FROM ".$GLOBALS['gdb']->fun_table2('valid')." WHERE valid_phone='".$sqlphone."' and valid_verify='".$sqlverify."' order by valid_time desc limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(empty($arr)){
  $intreturn = 1;//不匹配
}else{
	if(abs($arr['valid_time'] - time()) > 60 * 5){
		$intreturn = 2;//超时
	}
}
//查自己有openid的记录有没有phone
$intcard_id = 0;
if($intreturn == 0){
	$strsql = "SELECT card_id,card_okey,card_phone FROM ".$GLOBALS['gdb']->fun_table2('card')." WHERE card_okey= '".$stropenid."'";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrwcard = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arrwcard)){
	  $intreturn = 0;
	}else{
		$intcard_id = $arrwcard['card_id'];
		if(!empty($arrwcard['card_phone'])){
			$intreturn = 4;//已绑定
		}
		if($intcard_id != 0 && empty($arrwcard['card_phone'])){
			$strsql = "DELETE FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_id = " . $intcard_id;
			$GLOBALS['gdb']->fun_do($strsql);
		}
	}
}
if($intreturn == 0){
	$strsql = "SELECT card_id FROM ".$GLOBALS['gdb']->fun_table2('card')." WHERE card_phone='".$sqlphone."'";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)){
		/*$arrweixin = laimi_config_weixin();
		$strtoken = '';
		$strjson = api_value_https('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$arrweixin['appid'].'&secret=' . $arrweixin['appsecret']);
		$objjson = json_decode($strjson);
		$strtoken = $objjson->access_token;

		$strnickname = '';
		$strjson = api_value_https('https://api.weixin.qq.com/cgi-bin/user/info?access_token=' . urlencode($strtoken) . '&openid=' . urlencode($stropenid) . '&lang=zh_CN');
		$objjson = json_decode($strjson);
		$strnickname = $objjson->nickname;*/
		//微信会员卡类型为2
		$strcard_type_name = '';
		$intcard_type_discount = 10;
		if($intreturn == 0) {
			$strsql = "SELECT card_type_name, card_type_discount FROM " . $gdb->fun_table2('card_type') . " WHERE card_type_id = 2 LIMIT 1";
			$hresult = $gdb->fun_query($strsql);
			$arr = $gdb->fun_fetch_assoc($hresult);
			if(!empty($arr)) {
				$strcard_type_name = $arr['card_type_name'];
				$intcard_type_discount = $arr['card_type_discount'];
			}
		}

		$strsql = "INSERT INTO " . $gdb->fun_table2('card') . " (card_okey, card_type_id, card_code, card_atime,card_password_state,card_state,	card_phone, c_card_type_name, c_card_type_discount) VALUES ('"
	. $stropenid . "', 2, '" . $sqlphone . "', " . time()
	. ", 2,1,'".$sqlphone."', '" . $strcard_type_name . "'," . $intcard_type_discount . ")";
		$hresult = $gdb->fun_do($strsql);

		$intcard_id = $GLOBALS['gdb']->fun_insert_id();
		if(!$hresult){
			$intreturn = 5;
		}else{
			$GLOBALS['_SESSION']['login_id'] = $intcard_id;
		}
	}else{
		//在实体店已经注册
		$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card')." SET card_okey='".$arrwcard['card_okey']."', WHERE card_id=".$arr['card_id'];
		$hresult = $GLOBALS['gdb']->fun_do($strsql);
		if(!$hresult){
			$intreturn = 6;//已绑定
		}

		$GLOBALS['_SESSION']['login_id'] = $arr['card_id'];
	}
}

echo $intreturn;