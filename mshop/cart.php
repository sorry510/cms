<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$cart_count = 0;
$cart_money = 0;

$gtemplate->fun_assign('cart_list', get_cart_list());
$gtemplate->fun_show('cart');

function get_cart_list(){
	$arr = array();
	//对等关联
	$strsql = "SELECT a.*,b.wgoods_name,b.wgoods_name2,b.wgoods_price,b.wgoods_cprice,b.wgoods_photo1,b.wgoods_photo2,b.wgoods_photo3,b.wgoods_photo4,b.wgoods_photo5,b.wgoods_state FROM (SELECT wcart_id,wgoods_id,wcart_wgoods_count,wcart_wgoods_state FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE card_id = ".api_value_int0($GLOBALS['_SESSION']['login_id'])." order by wcart_id desc) AS a join ".$GLOBALS['gdb']->fun_table2('wgoods')." AS b on a.wgoods_id = b.wgoods_id order by a.wcart_id desc";
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
		$row['state'] = 0;
		if($row['wcart_wgoods_state'] == 1 && $row['wgoods_state'] == 1){
			$row['state'] = 1;
			$GLOBALS['cart_count'] += $row['wcart_wgoods_count'];
			$GLOBALS['cart_money'] += $row['wcart_wgoods_count'] * $row['min_price'];
		}
	}
	return $arr;
}
