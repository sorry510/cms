<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;
if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('sgoods') . " WHERE sgoods_id = " . $intid . " LIMIT 1";
	$gdb->fun_do($strsql);
	
	$strsql = "DELETE FROM " . $gdb->fun_table2('store_info') . " WHERE sgoods_id = " . $intid;
	$gdb->fun_do($strsql);
	
	$strsql = "DELETE FROM " . $gdb->fun_table2('group_reward2') . " WHERE sgoods_id = " . $intid;
	$gdb->fun_do($strsql);
}
echo $intreturn;
?>