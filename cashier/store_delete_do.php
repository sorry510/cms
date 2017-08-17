<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strstore_id = api_value_post('store_id');
$intstore_id = api_value_int0($strstore_id);

$intreturn = 0;

$strsql = "SELECT store_id FROM ".$gdb->fun_table2('store')." WHERE store_state=2 and store_id=".$intstore_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(!empty($arr)) {
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "DELETE FROM ".$gdb->fun_table2('store')." WHERE store_id=".$intstore_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}
if($intreturn == 0){
	$strsql = "DELETE FROM ".$gdb->fun_table2('store_goods')." WHERE store_id=".$intstore_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}
echo $intreturn;
?>