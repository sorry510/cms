<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strid = api_value_get('id');
$intid = api_value_int0($strid);
$inttime = time();

$gtemplate->fun_assign('detail', get_detail());
$gtemplate->fun_assign('cart', get_cart());
$gtemplate->fun_assign('wx_share', get_wx_share());
$gtemplate->fun_show('detail');

function get_detail(){
	$arr = array();
	$strsql = " SELECT wgoods_id,wgoods_name,wgoods_name2,wgoods_price,wgoods_cprice,wgoods_photo1,wgoods_photo2,wgoods_photo3,wgoods_photo4,wgoods_photo5,	wgoods_content FROM " . $GLOBALS['gdb']->fun_table2('wgoods') ." WHERE wgoods_id = " . $GLOBALS['intid'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$arr['photo'] = array();

	for($i = 1; $i <= 5; $i++){
		if($arr['wgoods_photo'.$i] != ''){
			$arr['photo'][] = $arr['wgoods_photo'.$i];
		}
	}

	if (!empty($arr)) {
		$price = $arr['wgoods_price'];
		$c_price = $arr['wgoods_cprice'];
	}else{
		echo '<script> window.history.back();</script>';
	}

	$strsql = "SELECT min(wact_discount_goods_price) as min_price,wact_discount_name,wact_discount_start,wact_discount_end,wact_discount_state FROM (SELECT wgoods_id,wact_discount_goods_price,wact_discount_id FROM ". $GLOBALS['gdb']->fun_table2('wact_discount_goods') . " WHERE wgoods_id = " . $GLOBALS['intid'] .") as a LEFT JOIN " . $GLOBALS['gdb']->fun_table2('wact_discount') ." as b on a.wact_discount_id = b.wact_discount_id GROUP BY wgoods_id HAVING wact_discount_start <= " .$GLOBALS['inttime'] ." AND wact_discount_end >= " .$GLOBALS['inttime'] . " AND  wact_discount_state = 1";

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	if (!empty($arr2)) {
		$act_price = $arr2['min_price'];
		$arr['act_name'] = $arr2['wact_discount_name'];
	}else{
		$act_price = 0;
		$arr['act_name'] = "--";
	}

	$arrprice = array();
	if($price != 0)
		$arrprice[] = $price;
	if($c_price != 0)
		$arrprice[] = $c_price;
	if($act_price != 0)
		$arrprice[] = $act_price;

	if (!empty($arrprice)) {
		$arr['min_price'] = min($arrprice);
	}
	return $arr;
}

function get_cart(){
	$arr = array();
	$strsql = " SELECT sum(wcart_wgoods_count) as cart_count,card_id FROM " . $GLOBALS['gdb']->fun_table2('wcart') ." GROUP BY card_id HAVING card_id = " . $GLOBALS['_SESSION']['login_id'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	return $arr;
}

function get_wx_share() {
	$inttime = time();
	
	$arr = array();
	$arr_weixin = laimi_config_weixin();
	$arr['appid'] = $arr_weixin['appid'];
	$arr['timestamp'] = $inttime;
	$arr['nonceStr'] = 'test.axin.cc';
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
	. '&url='.$GLOBALS['gconfig']['project']['url_mobile'].'/detail.php?id=' . $GLOBALS['intid']);
	
	return $arr;
}

?>