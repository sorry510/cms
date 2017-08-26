<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$strsql = "SELECT a.act_discount_id, a.act_discount_name, a.act_discount_client, a.act_discount_start, a.act_discount_end, a.act_discount_memo , a.act_discount_shop , b.shop_id FROM (SELECT act_discount_id, act_discount_name, act_discount_client, act_discount_start, act_discount_end, act_discount_memo , act_discount_shop FROM" . $GLOBALS['gdb']->fun_table2('act_discount') . " WHERE act_discount_id = ".$intid.") as a LEFT JOIN ".$GLOBALS['gdb']->fun_table2('act_discount_shop')." as b on a.act_discount_id =b.act_discount_id";

$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

foreach ($arr as $key => $value) {
	$arr[$key]['act_discount_start'] = date('Y-m-d',$arr[$key]['act_discount_start'] );
	$arr[$key]['act_discount_end'] = date('Y-m-d',$arr[$key]['act_discount_end'] );
}

echo json_encode($arr);

?>