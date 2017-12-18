<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strphone = api_value_post('phone');
$sqlphone = $gdb->fun_escape($strphone);
$strverify = api_value_post('verify');
$sqlverify = $gdb->fun_escape($strverify);
$intcard_id = api_value_int0($GLOBALS['_SESSION']['login_id']);

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
if($intreturn == 0){
	$strsql = "SELECT card_id,card_okey,card_phone FROM ".$GLOBALS['gdb']->fun_table2('card')." WHERE card_id=".$intcard_id;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrwcard = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arrwcard)){
	  $intreturn = 3;
	}else{
		if(!empty($arrwcard['card_phone'])){
			$intreturn = 4;//已绑定
		}
	}
}
if($intreturn == 0){
	$strsql = "SELECT card_id FROM ".$GLOBALS['gdb']->fun_table2('card')." WHERE card_phone='".$sqlphone."' and card_okey = ''";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)){
		//没有在实体店注册
		$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card')." SET card_phone='".$sqlphone."' WHERE card_id=".$intcard_id;
		$hresult = $GLOBALS['gdb']->fun_do($strsql);
		if(!$hresult){
			$intreturn = 5;//已绑定
		}
	}else{
		//在实体店已经注册
		$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card')." SET card_okey='".$arrwcard['card_okey']."', WHERE card_id=".$intcard_id;
		$hresult = $GLOBALS['gdb']->fun_do($strsql);
		if(!$hresult){
			$intreturn = 6;//已绑定
		}
		//删除微信上临时注册没有phone的记录
		$strsql = "DELETE FROM ".$GLOBALS['gdb']->fun_table2('card')." WHERE card_id = ".$arrwcard['card_id'];
		$hresult = $GLOBALS['gdb']->fun_do($strsql);

		$GLOBALS['_SESSION']['login_id'] = $arr['card_id'];
	}
}

echo $intreturn;