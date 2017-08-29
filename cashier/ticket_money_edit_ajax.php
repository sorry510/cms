<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require('inc_limit.php');
require(C_ROOT . '/_include/inc_init.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$arr = array();
$strsql = "SELECT ticket_money_id,ticket_money_begin ,ticket_money_name, ticket_money_value, ticket_money_limit,ticket_money_days, ticket_money_memo FROM " . $GLOBALS['gdb']->fun_table2('ticket_money') . " WHERE ticket_money_id = ". $intid;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

echo json_encode($arr);

?>