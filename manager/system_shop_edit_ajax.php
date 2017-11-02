<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strshop_id = api_value_get('id');
$intshop_id = api_value_int0($strshop_id);

$strsql = "SELECT shop_id,shop_name,shop_phone,shop_area_sheng,shop_area_shi,shop_area_jing,shop_area_wei,shop_area_address FROM " . $GLOBALS['gdb']->fun_table('shop') . " where shop_id = ".$intshop_id." limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

echo json_encode($arr);//中文必须是utf-8编码才能被json_encode,此时中文已经被unicode编码，但是在js ajax会自动进行unicode解码
