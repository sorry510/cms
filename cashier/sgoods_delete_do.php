<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsgoods_id = api_value_post('sgoods_id');
$intsgoods_id = api_value_int0($strsgoods_id);

$intreturn = 0;

// 库存商品
$strsql = "SELECT store_info_id FROM ".$GLOBALS['gdb']->fun_table2('store_info'). " where sgoods_id=".$intsgoods_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('sgoods') . " WHERE sgoods_id = " . $intsgoods_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;
?>