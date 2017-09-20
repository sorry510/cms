<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$arr = array();
$strmcombo_code = api_value_get('mcombo_code');

$strsql = "SELECT mcombo_id,mcombo_name,mcombo_price,mcombo_cprice,mcombo_act FROM ".$GLOBALS['gdb']->fun_table2('mcombo'). "where mcombo_state = 1 and mcombo_code='".$strmcombo_code."' limit 1";
// echo $strsql;exit;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	echo json_encode($arr);
}

