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
	$strsql = "DELETE FROM " . $gdb->fun_table2('mcombo') . " WHERE mcombo_id = " . $intid . " LIMIT 1";
	$gdb->fun_do($strsql);

	$strsql = "DELETE FROM " . $gdb->fun_table2('mcombo_goods') . " WHERE mcombo_id = " . $intid;
	$gdb->fun_do($strsql);
	
	$strsql = "DELETE FROM " . $gdb->fun_table2('group_reward2') . " WHERE mcombo_id = " . $intid;
	$gdb->fun_do($strsql);

	$strsql = "DELETE FROM " . $gdb->fun_table2('act_discount_goods') . " WHERE mcombo_id = " . $intid;
	$gdb->fun_do($strsql);
}

echo $intreturn;
?>