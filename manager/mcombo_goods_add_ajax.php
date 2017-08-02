<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strmgoods_code = api_value_get('mgoods_code');
$sqlmgoods_code = $gdb->fun_escape($strmgoods_code);

$arr = array();

$strsql = "SELECT mgoods_id,mgoods_price,mgoods_name FROM ".$gdb->fun_table2('mgoods')." where mgoods_code='".$sqlmgoods_code."'";

$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);

echo json_encode($arr);