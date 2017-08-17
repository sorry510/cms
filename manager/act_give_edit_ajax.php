<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$arr = array();

/*$strsql = "SELECT a.act_give_id, a.act_give_name, a.act_give_man, a.act_give_ttype , a.ticket_goods_id, a.ticket_money_id , a.act_give_begin , a.act_give_tdays , a.act_give_start, a.act_give_end, a.act_give_memo , a.act_give_shop , b.shop_id FROM " . $GLOBALS['gdb']->fun_table2('act_give') . "as a LEFT JOIN ".$GLOBALS['gdb']->fun_table2('act_give_shop')." as b on a.act_give_id =b.act_give_id WHERE b.act_give_id = ". $intid;*/
$strsql = "SELECT a.act_give_id, a.act_give_name, a.act_give_man, a.act_give_ttype , a.ticket_goods_id, a.ticket_money_id , a.c_ticket_begin , a.act_give_start, a.act_give_end, a.act_give_memo , a.act_give_shop , b.shop_id FROM  ( SELECT  act_give_id, act_give_name, act_give_man, act_give_ttype , ticket_goods_id, ticket_money_id , c_ticket_begin ,  act_give_start, act_give_end, act_give_memo , act_give_shop FROM " . $GLOBALS['gdb']->fun_table2('act_give') . " WHERE act_give_id = ". $intid .") as a LEFT JOIN ".$GLOBALS['gdb']->fun_table2('act_give_shop')." as b on a.act_give_id = b.act_give_id";

$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

foreach ($arr as $key => $value) {
	$arr[$key]['act_give_start'] = date('Y-m-d',$arr[$key]['act_give_start'] );
	$arr[$key]['act_give_end'] = date('Y-m-d',$arr[$key]['act_give_end'] );
}

echo json_encode($arr);

?>