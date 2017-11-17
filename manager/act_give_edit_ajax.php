<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

if(laimi_config_trade()['act_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$arr = array();

$strsql = "SELECT act_give_id, act_give_name, act_give_man, act_give_ttype , ticket_goods_id, ticket_money_id , c_ticket_begin ,  act_give_start, act_give_end, act_give_memo FROM " . $GLOBALS['gdb']->fun_table2('act_give') . " WHERE act_give_id = ". $intid ;

$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

$arr['act_give_start'] = date('Y-m-d',$arr['act_give_start'] );
$arr['act_give_end'] = date('Y-m-d',$arr['act_give_end'] );

echo json_encode($arr);

?>