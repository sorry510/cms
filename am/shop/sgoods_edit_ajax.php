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
	$strsql = "SELECT sgoods_id, sgoods_catalog_id, sgoods_type, sgoods_code, sgoods_name, sgoods_jianpin, sgoods_price, sgoods_cprice FROM "
	. $GLOBALS['gdb']->fun_table2('sgoods') . " WHERE sgoods_id = " . $intid . " AND shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$arr['sgoods_price'] = $arr['sgoods_price'] + 0;
	$arr['sgoods_cprice'] = $arr['sgoods_cprice'] + 0;
}
echo json_encode($arr);
?>