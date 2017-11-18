<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$arr = array();
$strcard_id = api_value_get('id');
$intcard_id = api_value_int0($strcard_id);
$strtype = api_value_get('type');
$inttype = api_value_int0($strtype);

$order = '';
if($inttype == 2){
	$order = ' order by card_ticket_edate asc';
}else if($inttype == 1){
	$order = ' order by c_ticket_value desc';
}

$strsql = "SELECT card_ticket_id,ticket_type,ticket_money_id,ticket_goods_id,card_ticket_atime,card_ticket_edate,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin,c_mgoods_id,c_mgoods_name FROM ".$GLOBALS['gdb']->fun_table2('card_ticket')." where card_id = ".$intcard_id." and card_ticket_state=1 and card_ticket_edate>".time()." and ticket_type = ".$inttype." and (c_ticket_begin=1 or (c_ticket_begin=2 and card_ticket_atime <".strtotime(date('Y-m-d',time()))."))".$order;

$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
foreach($arr as &$row){
	$row['atime'] = date('Y-m-d', $row['card_ticket_atime']);
	$row['edate'] = date('Y-m-d', $row['card_ticket_edate']);
}

echo json_encode($arr);
