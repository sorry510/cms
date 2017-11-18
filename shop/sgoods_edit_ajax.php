<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsgoods_id = api_value_get('sgoods_id');
$intsgoods_id = api_value_int0($strsgoods_id);

$intreturn = 0;
if($intreturn == 0) {
	$arr = array();
	$strsql = "SELECT sgoods_id, sgoods_catalog_id, sgoods_type, sgoods_code, sgoods_name, sgoods_jianpin, sgoods_price, sgoods_cprice, sgoods_act, sgoods_reserve, sgoods_state  FROM ". $GLOBALS['gdb']->fun_table2('sgoods')." WHERE sgoods_id = " . $GLOBALS['intsgoods_id'] ." LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
}
echo json_encode($arr);
?>