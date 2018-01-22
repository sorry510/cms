<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_id = api_value_get('id');
$intcard_id = api_value_int0($strcard_id);
$gtemplate->fun_assign('card_mcombo', get_card_mcombo());
$gtemplate->fun_show('center_shop_card');

function get_card_mcombo(){
	$arr = array();
	$strsql1 = "SELECT card_mcombo_parent FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." WHERE card_id = ".$GLOBALS['intcard_id']." and (card_mcombo_cedate>=".time()." or card_mcombo_cedate=0) and card_mcombo_parent!=0 group by card_mcombo_parent having sum(card_mcombo_gcount)!=0";

	$strsql = "SELECT card_mcombo_id,card_mcombo_parent,card_mcombo_type,mcombo_id,card_mcombo_ccount,c_mcombo_type,card_mcombo_cedate,c_mcombo_name FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_mcombo_type = 1 and card_mcombo_id in(".$strsql1.") order by card_mcombo_id asc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach ($arr as &$row) {
		$row['days'] = 0;
		if($row['card_mcombo_cedate'] != 0){
			$row['days'] = ceil(($row['card_mcombo_cedate'] - time()) / 86400);//进1取整
		}
		$arrgoods = array();
		$strsql = "SELECT card_mcombo_id,card_mcombo_type,mcombo_id,card_mcombo_ccount,mgoods_id,card_mcombo_gcount,c_mcombo_name,c_mgoods_name,c_mgoods_price,c_mgoods_cprice,c_mcombo_type,card_mcombo_cedate FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_mcombo_parent=".$row['card_mcombo_id']." and card_mcombo_type=2";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$row['goods'] = $arrgoods;
	}
	unset($row);
	return $arr;
}
