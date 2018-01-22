<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

// $GLOBALS['_SESSION']['login_id'] = 7;
// $GLOBALS['_SESSION']['login_openid'] = 'oC8-sjl_agIH6gB9WvpOdf_jiDow';
$straddress_id = api_value_get('address_id');
$intaddress_id = api_value_int0($straddress_id);
$cart_count = 0;
$cart_money = 0;

$gtemplate->fun_assign('cart_list', get_cart_list());
$gtemplate->fun_assign('address', get_address());
$gtemplate->fun_assign('card_info', get_card_info());
$gtemplate->fun_show('cart_enter');

function get_cart_list(){
	$arr = array();
	$strsql = "SELECT a.*,b.* FROM (SELECT wcart_id,wgoods_id,wcart_wgoods_count FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE card_id = ".api_value_int0($GLOBALS['_SESSION']['login_id'])." and wcart_wgoods_state = 1 order by wcart_id desc) AS a join (SELECT wgoods_id,wgoods_name,wgoods_name2,wgoods_price,wgoods_cprice,wgoods_photo1,wgoods_photo2,wgoods_photo3,wgoods_photo4,wgoods_photo5 FROM ".$GLOBALS['gdb']->fun_table2('wgoods')." WHERE wgoods_state = 1) AS b on a.wgoods_id = b.wgoods_id order by a.wcart_id desc";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$goodsinfo = laimi_wgoods_price($row['wgoods_id'], $row['wgoods_price'], $row['wgoods_cprice']);
		$row['min_price'] = $goodsinfo['wgoods_iprice'];
		$row['act_discount_id'] = $goodsinfo['wact_discount_id'];
		$row['photo'] = '';
		for($i = 1; $i <= 5; $i++){
			if($row['wgoods_photo'.$i] != ''){
				$row['photo'] = $row['wgoods_photo'.$i];
				break;
			}
		}
		$GLOBALS['cart_count'] += $row['wcart_wgoods_count'];
		$GLOBALS['cart_money'] += $row['wcart_wgoods_count'] * $row['min_price'];
	}
	return $arr;
}

function get_address(){
	$arr = array();
	$strwhere = "";
	// $strwhere = " and waddress_state = 2";
	if($GLOBALS['intaddress_id'] != 0){
		$strwhere = " and waddress_id = ".$GLOBALS['intaddress_id'];
	}
	$strsql = "SELECT waddress_id,waddress_state,waddress_name,waddress_phone,waddress_detail,waddress_state FROM ".$GLOBALS['gdb']->fun_table2('waddress')." WHERE card_id = ".api_value_int0($GLOBALS['_SESSION']['login_id']).$strwhere;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(count($arr) > 1){
		$intkey = 0;
		foreach($arr as $key => $row){
			if($row['waddress_state'] = 2){
				$intkey = $key;
				break;
			}
		}
		return $arr[$intkey];
	} else if(count($arr) == 1) {
		return $arr[0];
	} else {
		return $arr;
	}
}

function get_card_info(){
	$arr = array();
	$strsql = "SELECT s_card_ymoney,card_phone FROM ".$GLOBALS['gdb']->fun_table2('card')." WHERE card_id = ".api_value_int0($GLOBALS['_SESSION']['login_id'])." and card_state = 1 and (card_edate>".time()." or card_edate = 0)";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	return $arr;
}