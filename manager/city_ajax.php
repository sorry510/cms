<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strprovince_id = api_value_get('province_id');
$intprovince_id  = api_value_int0($strprovince_id );

$arr = array();
$strsql = "SELECT region_id,region_name FROM ".$GLOBALS['gdb']->fun_table('region')." where parent_id =".$intprovince_id." order by region_id";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

echo json_encode($arr);