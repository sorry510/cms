<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$arr = array();

$strsql = "SELECT a.reserve_id,a.card_id, a.reserve_name, a.reserve_phone, a.reserve_count , a.reserve_dtime,a.reserve_memo, b.card_code FROM  ( SELECT  reserve_id,card_id, reserve_name, reserve_phone, reserve_count , reserve_dtime,reserve_memo FROM " . $GLOBALS['gdb']->fun_table2('reserve') . " WHERE reserve_id = ". $intid .") as a LEFT JOIN ".$GLOBALS['gdb']->fun_table2('card')." as b on a.card_id = b.card_id LIMIT 1";

$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

$strsql = "SELECT mgoods_id,c_mgoods_name FROM  " . $GLOBALS['gdb']->fun_table2('reserve_mgoods') . " WHERE reserve_id = ". $intid ;

$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr2 = $GLOBALS['gdb']->fun_fetch_all($hresult);

$arr['reserve_goods'] = $arr2;
$arr['dtime'] = date('Y-m-d H:i',$arr['reserve_dtime']);

echo json_encode($arr);

?>