<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$arr = array();
$strmcombo_id = api_value_get('mcombo_id');
$intmcombo_id = api_value_int0($strmcombo_id);

$strsql = "SELECT a.*,b.mgoods_name FROM (select mcombo_id,mgoods_id,mcombo_goods_count from ".$GLOBALS['gdb']->fun_table2('mcombo_goods')." where mcombo_id = ".$intmcombo_id.") as a left join ".$GLOBALS['gdb']->fun_table2('mgoods')." as b on a.mgoods_id = b.mgoods_id";

$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

echo json_encode($arr);
