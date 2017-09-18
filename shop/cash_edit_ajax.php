<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcash_id = api_value_get('id');
$intcash_id = api_value_int0($strcash_id);

$arr = array();

$strsql = "SELECT cash_id,cash_type_id,cash_name,cash_money,cash_memo,cash_state,cash_time FROM ".$gdb->fun_table2('cash')." WHERE cash_id=".$intcash_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
$arr['time'] = date('Y-m-d H:i:s', $arr['cash_time']);

echo json_encode($arr);
