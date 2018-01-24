<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strworder_id = api_value_post('worder_id');
$intworder_id = api_value_int0($strworder_id);
$strworder_express_company = api_value_post('txtworder_express_company');
$sqlworder_express_company = $gdb->fun_escape($strworder_express_company);
$strworder_express_code = api_value_post('txtworder_express_code');
$sqlworder_express_code = $gdb->fun_escape($strworder_express_code);

$intreturn = 0;
$ctime = time();

$strtime = date("Y-m-d H:i:s",time());

if(empty($intworder_id) || empty($sqlworder_express_company) || $sqlworder_express_code == 0){
	$intreturn = 1;
}

if ($intreturn == 0) {
	$strsql = "SELECT worder_state,worder_address_name,worder_address_phone,worder_address_detail,card_id,c_card_name FROM ". $gdb->fun_table2('worder') ." WHERE worder_id = ".$intworder_id ." LIMIT 1";
	//echo $strsql;exit();
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 2;
	}else{
		$strc_card_name = $arr['c_card_name'];
		$strworder_address_name = $arr['worder_address_name'];
		$strworder_address_phone = $arr['worder_address_phone'];
		$strworder_address_detail = $arr['worder_address_detail'];
		$intcard_id = $arr['card_id'];
	}
	if ($arr['worder_state'] != 1) {
		$intreturn = 3;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('worder') . " SET worder_express_company = '" . $sqlworder_express_company . "', worder_express_code = '".$sqlworder_express_code."', worder_ctime = ".$ctime.", worder_state = 2 WHERE worder_id = " . $intworder_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 4;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('worder_goods') . " SET worder_goods_state = 2 , worder_goods_ctime = ".$ctime." WHERE worder_id = " . $intworder_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}

if($intreturn == 0) {

	$strsql = "SELECT wgoods_id,worder_goods_count FROM ". $gdb->fun_table2('worder_goods') ." WHERE worder_id = ".$intworder_id;
	$hresult = $gdb->fun_do($strsql);
	$arr = $gdb->fun_fetch_all($hresult);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}

if ($intreturn ==0 ) {
	if (!empty($arr)) {
		foreach ($arr as $key => $row) {
			$strsql = "UPDATE " . $gdb->fun_table2('wgoods') . " SET wgoods_store = wgoods_store - " . $row['worder_goods_count'] . " WHERE wgoods_id = " . $row['wgoods_id'] . " LIMIT 1" ;
			@$hresult = $gdb->fun_do($strsql);
		}
	}
}

if ($intreturn == 0) {
	$strreserve_goods = '';
	$strsql = "SELECT card_okey FROM " . $gdb->fun_table2('card') . " WHERE card_id = ".$intcard_id;
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
	  	'template_id' => 'NU5HAz86hCe6IQ94cQ-DDofbVJ7misVZ7AlIzNLeDBc',
	  	'url' => 'http://weixin.test.laimisoft.com/'.$GLOBALS['_SESSION']['login_code'].'/s_push.php?company='.$GLOBALS['_SESSION']['login_code'].'&goto=center',
	  );

	  $arrtpl_data = array(
	    'first' => array(
	        'value' => '尊敬的'.$strc_card_name.'，您的订单已发货。',
	    ),
	    'keyword1' => array(
	        'value' => $strworder_address_name.",".$strworder_address_phone,
	    ),
	    'keyword2' => array(
	        'value' => $strworder_address_detail,
	    ),
	    'keyword3' => array(
	        'value' => $strtime,
	    ),
	    'keyword4' => array(
	        'value' => $sqlworder_express_company.",".$sqlworder_express_code,
	    ),
	    'remark' => array(
	        'value' => '如有问题请及时联系我们，感谢您的支持。',
	    )
		);
		laimi_wx_template_msg($arrwx_data, $arrtpl_data);
	}
}

echo $intreturn;
?>