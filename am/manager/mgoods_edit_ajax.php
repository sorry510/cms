<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$arr = array();
	$strsql = "SELECT mgoods_id, mgoods_catalog_id, mgoods_type, mgoods_code, mgoods_name, mgoods_jianpin, mgoods_price, mgoods_cprice, mgoods_act, mgoods_reserve FROM "
	. $GLOBALS['gdb']->fun_table2('mgoods') . " WHERE mgoods_id = " . $intid . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$arr['mgoods_price'] = $arr['mgoods_price'] + 0;
	$arr['mgoods_cprice'] = $arr['mgoods_cprice'] + 0;
}
echo json_encode($arr);
?>