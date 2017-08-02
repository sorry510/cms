<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strmgoods_id = api_value_post('mgoods_id');
$intmgoods_id = api_value_int0($strmgoods_id);

$intreturn = 0;

$strsql = "SELECT mcombo_goods_id FROM ".$GLOBALS['gdb']->fun_table2('mcombo_goods'). "where mgoods_id=".$intmgoods_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
if(!empty($arr)){
	$intreturn = 1;
}
$strsql = "SELECT ticket_goods_id FROM ".$GLOBALS['gdb']->fun_table2('ticket_goods'). "where mgoods_id=".$intmgoods_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
if(!empty($arr)){
	$intreturn = 2;
}
if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('mgoods') . " WHERE mgoods_id = " . $intmgoods_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

echo $intreturn;
?>