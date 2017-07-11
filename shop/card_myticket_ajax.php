<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$arr = array();
$strcard_id = api_value_get('card_id');
$intcard_id = api_value_int0($strcard_id );

$strsql = "SELECT card_ticket_id,ticket_type,ticket_money_id,ticket_goods_id,mgoods_id,card_ticket_edate,c_mgoods_name FROM ".$GLOBALS['gdb']->fun_table2('card_ticket')." where card_id = ".$intcard_id." and card_ticket_state=1 order by ticket_type asc,card_ticket_id desc";

// echo $strsql;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
foreach($arr as &$v){
	if($v['ticket_type']==1){
		$strsql = "SELECT ticket_money_name,ticket_money_value FROM ".$GLOBALS['gdb']->fun_table2('ticket_money')." where ticket_money_id = ".$v['ticket_money_id']." limit 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmoney = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		$v['ticket_name'] = $arrmoney['ticket_money_name'];
		$v['ticket_value'] = $arrmoney['ticket_money_value'];
	}else
	if($v['ticket_type']==2){
		$strsql = "SELECT ticket_goods_name,ticket_goods_value,mgoods_id FROM ".$GLOBALS['gdb']->fun_table2('ticket_goods')." where ticket_goods_id = ".$v['ticket_goods_id']." limit 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrgoods = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		$v['ticket_name'] = $arrgoods['ticke_goods_name'];
		$v['ticket_value'] = $arrgoods['ticket_goods_value'];
	}
}

echo json_encode($arr);
