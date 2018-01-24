<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strshop_id = api_value_post('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strdtime = api_value_post('dtime');
$strname = api_value_post('card_name');
$sqlname = $gdb->fun_escape($strname);
$intcard_id = api_value_int0($GLOBALS['_SESSION']['login_id']);
$strphone = api_value_post('card_phone');
$sqlphone = $gdb->fun_escape($strphone);
$strcount = api_value_post('count');
$intcount = api_value_int0($strcount);
$strmemo = api_value_post('memo');
$sqlmemo = $gdb->fun_escape($strmemo);
$arrmgoods = api_value_post('goods');

$time = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($sqlphone) || empty($arrmgoods)) {
		$intreturn = 1;
	}
}

if (empty($intcard_id)) {
	$intcard_id = 0;
}

$intdtime = 0;
if($intreturn == 0) {
	if(!empty($strdtime)) {
		$int = strtotime($strdtime);
		if($int > $time) {
			$intdtime = $int;
		}else{$intreturn = 2;}
	}else{$intreturn = 1;}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('reserve') . " (card_id, shop_id, reserve_type,reserve_name,reserve_phone,reserve_count,reserve_state,reserve_atime,reserve_dtime,reserve_here,reserve_memo) VALUES ("
	.$intcard_id . ", " . $intshop_id . ", 2 , '" . $sqlname ."', '" . $sqlphone ."', ". $intcount .", 1 , ".$time.",".$intdtime.", 2 ,'".$sqlmemo."')";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}else{
		$id = $gdb->fun_insert_id();
	}
}

if($intreturn == 0) {
	foreach($arrmgoods as $key => $value) {
		$arr = explode(',',$value);
		$strsql = "INSERT INTO " . $gdb->fun_table2('reserve_mgoods') . "(reserve_id,mgoods_id,c_mgoods_name) VALUES (" .$id . " , " .$arr[0] . " , '" . $arr[1]. "')";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 4;
		}
	}
}

if ($intreturn == 0) {
	$strreserve_goods = '';
	$strsql = "SELECT card_okey FROM " . $gdb->fun_table2('card') . " WHERE card_phone = '".$sqlphone."'";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if (!empty($arr['card_okey'])) {

		$arrweixin = laimi_config_weixin();
		$strtoken = '';
		$strjson = api_http_html('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$arrweixin['appid'].'&secret=' . $arrweixin['appsecret']);
		$objjson = json_decode($strjson);
		$strtoken = $objjson->access_token;

		$arrwx_data = array(
	  	'open_id' => $arr['card_okey'],
	  	'token' => $strtoken,
	  	'template_id' => 'gMR5p-DNwBb1I55xwCH6vosjGDERAQ90uv77Aqy4lds',
	  	'url' => 'http://weixin.test.laimisoft.com/'.$GLOBALS['_SESSION']['login_code'].'/s_push.php?company='.$GLOBALS['_SESSION']['login_cid'].'&goto=center',
	  );

		$strgoods = '';
		foreach ($arrmgoods as $key => $value) {
			$arr = explode(',',$value);
			if ($strgoods == '') {
				$strgoods = $arr[1];
			}else{
				$strgoods = $strgoods.",".$arr[1];
			}
		}

	  $arrtpl_data = array(
	    'first' => array(
	        'value' => '尊敬的'.$sqlname.'，您有1条预约信息。',
	    ),
	    'keyword1' => array(
	        'value' => $sqlname,
	    ),
	    'keyword2' => array(
	        'value' => $sqlphone,
	    ),
	    'keyword3' => array(
	        'value' => $strdtime,
	    ),
	    'keyword4' => array(
	        'value' => $strgoods,
	    ),
	    'remark' => array(
	        'value' => '敬请按时到店，感谢您的预约。',
	    )
		);
		laimi_wx_template_msg($arrwx_data, $arrtpl_data);
	}
}

echo $intreturn;

?>