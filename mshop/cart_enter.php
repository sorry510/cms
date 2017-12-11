<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$cart_count = 0;
$cart_money = 0;

$gtemplate->fun_assign('cart_list', get_cart_list());
$gtemplate->fun_assign('address', get_address());
$gtemplate->fun_assign('card_info', get_card_info());
$gtemplate->fun_show('cart_enter');

function get_cart_list(){
	$arr = array();
	$strsql = "SELECT a.*,b.wgoods_name,b.wgoods_name2,b.wgoods_price,b.wgoods_cprice,b.wgoods_photo1,b.wgoods_photo2,b.wgoods_photo3,b.wgoods_photo4,b.wgoods_photo5 FROM (SELECT wcart_id,wgoods_id,wcart_wgoods_count FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE card_id = ".api_value_int0($GLOBALS['_SESSION']['login_id'])." order by wcart_id desc) AS a left join ".$GLOBALS['gdb']->fun_table2('wgoods')." AS b on a.wgoods_id = b.wgoods_id order by a.wcart_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$goodsinfo = laimi_wgoods_price($row['wgoods_id'], $row['wgoods_price'], $row['wgoods_cprice']);
		$row['min_price'] = $goodsinfo['min_price'];
		$row['act_discount_id'] = $goodsinfo['act_discount_id'];
		$row['photo'] = '';
		for($i = 1; $i <= 5; $i++){
			if($row['wgoods_photo'.$i] != 0){
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
	$strsql = "SELECT waddress_id,waddress_name,waddress_phone,waddress_detail FROM ".$GLOBALS['gdb']->fun_table2('waddress')." WHERE card_id = ".api_value_int0($GLOBALS['_SESSION']['login_id'])." and waddress_state = 2";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	return $arr;
}

function get_card_info(){
	$arr = array();
	$strsql = "SELECT s_card_ymoney FROM ".$GLOBALS['gdb']->fun_table2('card')." WHERE card_id = ".api_value_int0($GLOBALS['_SESSION']['login_id'])." and card_state = 1 and (card_edate>".time()." or card_edate = 0)";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	return $arr;
}