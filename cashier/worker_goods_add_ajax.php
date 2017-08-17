<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strgoods_code = api_value_get('goods_code');
$sqlgoods_code = $gdb->fun_escape($strgoods_code);

$arr = array();

$strsql = "SELECT mgoods_id,mgoods_name FROM ".$gdb->fun_table2('mgoods')." where mgoods_code='".$sqlgoods_code."' and mgoods_state=1";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);

echo json_encode($arr);