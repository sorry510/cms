<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsgoods_id = api_value_post('id');
$intsgoods_id = api_value_int0($strsgoods_id);

$intreturn = 0;

//库存商品,如果有对应店铺的商品数量不为零
$strsql = "SELECT store_info_id,store_info_count FROM ".$GLOBALS['gdb']->fun_table2('store_info'). " where sgoods_id=".$intsgoods_id." and store_info_count!=0";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 3;
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('sgoods') . " WHERE sgoods_id = " . $intsgoods_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}
// 删除库存,对应各个店铺的sgoods
if($intreturn == 0){
	$strsql = "DELETE FROM " . $gdb->fun_table2('store_info') . " WHERE sgoods_id = " . $intsgoods_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}

echo $intreturn;
?>