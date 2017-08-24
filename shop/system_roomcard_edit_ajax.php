<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strroom_id = api_value_get('id');
$introom_id = api_value_int0($strroom_id);

$intreturn = 0;
$arr = array();

$strsql = "SELECT room_id,room_catalog_id,room_code,room_name FROM ".$gdb->fun_table2('room')." WHERE room_id=".$introom_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);

echo json_encode($arr);