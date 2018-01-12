<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['act_module'] != 1) {
	return 1;
}

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$arr = array();
$strsql = "SELECT ticket_goods_id, mgoods_id, ticket_goods_name, ticket_goods_value, ticket_goods_days, ticket_goods_begin, ticket_goods_memo FROM "
. $GLOBALS['gdb']->fun_table2('ticket_goods') . " WHERE ticket_goods_id = " . $intid . " LIMIT 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)) {
	$arr['ticket_goods_value'] = $arr['ticket_goods_value'] + 0;
}

echo json_encode($arr);
?>