<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strmcombo_id = api_value_get('mcombo_id');
$intmcombo_id = api_value_int0($strmcombo_id);

$intreturn = 0;
$arr = array();
$arrmgoods = array();
if($intreturn == 0) {
	$strsql = "SELECT mcombo_id, mcombo_type, mcombo_code, mcombo_name, mcombo_jianpin, mcombo_price, mcombo_cprice, mcombo_limit_type, mcombo_limit_days, mcombo_limit_months, mcombo_act,mcombo_state  FROM ". $GLOBALS['gdb']->fun_table2('mcombo')." WHERE mcombo_id = " . $GLOBALS['intmcombo_id'] ." LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	
	$strsql = "SELECT a.*, b.mgoods_name, b.mgoods_price FROM (SELECT mcombo_goods_id, mgoods_id , mcombo_goods_count FROM " . $GLOBALS['gdb']->fun_table2('mcombo_goods')." WHERE mcombo_id = " . $GLOBALS['intmcombo_id'] ." ORDER BY mcombo_goods_id asc) AS a ," . $GLOBALS['gdb']->fun_table2('mgoods')." AS b WHERE a.mgoods_id =b.mgoods_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
	$arr['mgoods'] = $arrmgoods;
}
echo json_encode($arr);




