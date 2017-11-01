<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$arr = array();
$strsql = "SELECT card_type_id,card_type_name,card_type_discount,card_type_memo FROM " . $GLOBALS['gdb']->fun_table2('card_type') . " WHERE card_type_id = ".$intid." limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
echo json_encode($arr);