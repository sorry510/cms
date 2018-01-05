<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_get('id');
$intid  = api_value_int0($strid);

$arr = array();
$strsql = "SELECT region_id, region_name FROM " . $GLOBALS['gdb']->fun_table('region') . " WHERE parent_id = " . $intid . " ORDER BY region_id";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

echo json_encode($arr);