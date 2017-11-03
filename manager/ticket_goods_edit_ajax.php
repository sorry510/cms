<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$arr = array();
$strsql = 'SELECT ticket_goods_id,ticket_goods_begin,ticket_goods_name,ticket_goods_value,a.mgoods_id,ticket_goods_days,mgoods_name,ticket_goods_memo,ticket_goods_atime FROM (SELECT ticket_goods_id,ticket_goods_begin,ticket_goods_name,ticket_goods_value,mgoods_id,ticket_goods_days,ticket_goods_memo,ticket_goods_atime FROM' . $GLOBALS['gdb']->fun_table2('ticket_goods') . ' WHERE ticket_goods_id ="'.$intid.'")as a LEFT JOIN (SELECT mgoods_id,mgoods_name FROM '. $GLOBALS['gdb']->fun_table2('mgoods').') as b on a.mgoods_id = b.mgoods_id ORDER BY ticket_goods_id DESC';

$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
echo json_encode($arr);

?>