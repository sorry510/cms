<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_id = api_value_get('id');
$intcard_id = api_value_int0($strcard_id);
$gtemplate->fun_assign('card_coupon1', get_card_coupon(1));
$gtemplate->fun_assign('card_coupon2', get_card_coupon(2));
$gtemplate->fun_assign('card_coupon3', get_card_coupon(3));
$gtemplate->fun_show('center_shop_coupon');

/**
 *@param $type 1正常未使用 2已使用 3已过期未使用
 *@return $arr
 */
function get_card_coupon($type = 1){
	$arr = array();
	$strwhere = "";
	switch ($type) {
		case 1:
			$strwhere .= "card_ticket_state=1 and card_ticket_edate>".time();
			break;
		case 2:
			$strwhere .= "card_ticket_state=2";
			break;
		case 3:
			$strwhere .= "card_ticket_state=1 and card_ticket_edate<".time();
			break;
		default:
			break;
	}
	$strsql = "SELECT ticket_type,c_ticket_name,c_ticket_value,c_ticket_limit,card_ticket_edate FROM ".$GLOBALS['gdb']->fun_table2('card_ticket')." where card_id=".$GLOBALS['intcard_id']." and ".$strwhere." order by card_ticket_edate asc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$row['typename'] = $row['ticket_type'] == 1 ? '代金券' : ($row['ticket_type'] == 2 ? '体验券' : '其它');
		$row['edate'] = date("Y-m-d", $row['card_ticket_edate']);
	}
	unset($row);
	return $arr;
}
