<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strmgoods_id = api_value_get('mgoods_id');
$intmgoods_id = api_value_int0($strmgoods_id);

$intreturn = 0;
if($intreturn == 0) {
	$arr = array();
	$strsql = "SELECT mgoods_id, mgoods_catalog_id, mgoods_type, mgoods_code, mgoods_name, mgoods_jianpin, mgoods_price, mgoods_cprice, mgoods_act, mgoods_reserve, mgoods_state  FROM ". $GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_id = " . $GLOBALS['intmgoods_id'] ." LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
}
echo json_encode($arr);
?>