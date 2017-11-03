<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int1($strid);

$arr = array();

$strsql = "SELECT act_decrease_id, act_decrease_name, act_decrease_client, act_decrease_man, act_decrease_jian, act_decrease_start, act_decrease_end, act_decrease_memo FROM " . $GLOBALS['gdb']->fun_table2('act_decrease') . " WHERE act_decrease_id = ". $intid;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

$arr['act_decrease_start'] = date('Y-m-d',$arr['act_decrease_start'] );
$arr['act_decrease_end'] = date('Y-m-d',$arr['act_decrease_end'] );

echo json_encode($arr);

?>