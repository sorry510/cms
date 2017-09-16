<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_history_id = api_value_get('history_id');
$intcard_history_id = api_value_int0($strcard_history_id);

$arr = array();

$strsql = "SELECT * FROM ".$gdb->fun_table2('card_history')." WHERE card_history_id=".$intcard_history_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);

$arr['time'] = date('Y-m-d H:i:s', $arr['card_history_atime']);

echo json_encode($arr);