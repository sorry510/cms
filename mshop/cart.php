<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$gtemplate->fun_assign('cart_list', get_cart_list());
$gtemplate->fun_show('cart');

function get_cart_list(){
	$arr = array();
	$strsql = "SELECT a.*,b.wgoods_name,b.wgoods_name2,b.wgoods_price,b.wgoods_cprice,b.wgoods_photo1,b.wgoods_photo2,b.wgoods_photo3,b.wgoods_photo4,b.wgoods_photo5 FROM (SELECT wcart_id,wgoods_id,wcart_wgoods_count FROM " . $GLOBALS['gdb']->fun_table2('wcart')." WHERE card_id = ".api_value_int0($GLOBALS['_SESSION']['login_id'])." order by wcart_id desc) AS a left join ".$GLOBALS['gdb']->fun_table2('wgoods')." AS b on a.wgoods_id = b.wgoods_id";
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
	}
	return $arr;
}
