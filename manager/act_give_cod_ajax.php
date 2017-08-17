<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strsql = 'SELECT ticket_goods_id,ticket_goods_name FROM' . $GLOBALS['gdb']->fun_table2('ticket_goods') .'  ORDER BY ticket_goods_id';

$hresult = $gdb->fun_do($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

echo json_encode($arr);

?>