<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$strsql = "SELECT mgoods_id,mcombo_id,act_discount_goods_value,act_discount_goods_price FROM " . $GLOBALS['gdb']->fun_table2('act_discount_goods') . " WHERE act_discount_id = " . $intid;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

echo json_encode($arr);

?>