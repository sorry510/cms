<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strdtime = api_value_post('txtdtime');
$strdtime2 = $gdb->fun_escape($strdtime);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strcard_id = api_value_post('txtcard_id');
$intcard_id = api_value_int0($strcard_id);
$strphone = api_value_post('txtphone');
$sqlphone = $gdb->fun_escape($strphone);
$strcount = api_value_post('txtcount');
$intcount = api_value_int0($strcount);
$strmemo = api_value_post('txtmemo');
$sqlmemo = $gdb->fun_escape($strmemo);
$arrmgoods_id = api_value_post('arr');
$intshop_id = api_value_int0($GLOBALS['_SESSION']['login_sid']);
$time = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($sqlphone) || empty($arrmgoods_id)) {
		$intreturn = 1;
	}
}

if (empty($intcard_id)) {
	$intcard_id = 0;
}

$intdtime = 0;
if($intreturn == 0) {
	if(!empty($strdtime2)) {
		$int = strtotime($strdtime2);
		if($int > $time) {
			$intdtime = $int;
		}else{$intreturn = 2;}
	}else{$intreturn = 1;}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('reserve') . " (card_id, shop_id, reserve_type,reserve_name,reserve_phone,reserve_count,reserve_state,reserve_atime,reserve_dtime,reserve_here,reserve_memo) VALUES ("
	.$intcard_id . ", " . $intshop_id . ", 1 , '" . $sqlname ."', '" . $sqlphone ."', ". $intcount .", 1 , ".$time.",".$intdtime.", 2 ,'".$sqlmemo."')";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}else{
		$id = $GLOBALS['gdb']->fun_insert_id();
	}
}

if($intreturn == 0) {
	foreach($arrmgoods_id as $key => $value) {
		$strsql = "INSERT INTO " . $gdb->fun_table2('reserve_mgoods') . "(reserve_id,mgoods_id,c_mgoods_name) VALUES (" .$id . " , " .$value['mgoods_id'] . " , '" . $value['mgoods_name']. "')";
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
		$strjson = api_value_https('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$arrweixin['appid'].'&secret=' . $arrweixin['appsecret']);
		$objjson = json_decode($strjson);
		$strtoken = $objjson->access_token;

		$arrwx_data = array(
	  	'open_id' => $arr['card_okey'],
	  	'token' => $strtoken,
	  	'template_id' => 'gMR5p-DNwBb1I55xwCH6vosjGDERAQ90uv77Aqy4lds',
	  	'url' => 'http://weixin.test.laimisoft.com/'.$GLOBALS['_SESSION']['login_code'].'/s_push.php?company='.$GLOBALS['_SESSION']['login_code'].'&goto=center',
	  );
	  foreach ($arrmgoods_id as $key => $value) {
	  	if ($strreserve_goods == '') {
	  		$strreserve_goods = $value['mgoods_name'];
	  	}else{
	  		$strreserve_goods = $strreserve_goods ."，".$value['mgoods_name'];
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
	        'value' => $strreserve_goods,
	    ),
	    'remark' => array(
	        'value' => '敬请按时到店，感谢您的预约。',
	    )
		);
		laimi_wx_template_msg($arrwx_data, $arrtpl_data);
	}
}

$ttime = strtotime(date('Y-m-d',$time));
if ($intreturn == 0) {
	if ($intdtime<($ttime+86400) && $intdtime>=$ttime) {
		$intreturn = 201;
	}elseif ($intdtime <($ttime+172800) && $intdtime >= ($ttime+86400)) {
		$intreturn = 202;
	}else{
		$intreturn = 203;
	}
}

echo $intreturn;

?>