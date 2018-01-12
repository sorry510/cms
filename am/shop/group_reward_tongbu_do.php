<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['worker_module'] != 1) {
	return 1;
}

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT group_reward_id, group_reward_create, group_reward_fill, group_reward_pfill, group_reward_guide, group_reward_pguide FROM " . $gdb->fun_table2('group_reward')
	. " WHERE worker_group_id = " . $intid . " AND shop_id = 0 LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 2;
	}
}

$inttime = time();
$arr2 = array();
if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('group_reward') . " WHERE worker_group_id = " . $intid . " AND shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']);
	$gdb->fun_do($strsql);
	$strsql = "DELETE FROM " . $gdb->fun_table2('group_reward2') . " WHERE worker_group_id = " . $intid . " AND shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid'])
	. " AND mgoods_id <> 0";
	$gdb->fun_do($strsql);
	
	$strsql = "INSERT INTO " . $gdb->fun_table2('group_reward') . " (worker_group_id, shop_id, group_reward_create, group_reward_fill, group_reward_pfill, "
	. "group_reward_guide, group_reward_pguide, group_reward_atime, group_reward_ctime) VALUES (" . $intid . ", " . api_value_int0($GLOBALS['_SESSION']['login_sid'])
	. ", " . $arr['group_reward_create'] . ", " . $arr['group_reward_fill'] . ", " . $arr['group_reward_pfill'] . ", " . $arr['group_reward_guide'] . "," . $arr['group_reward_pguide']
	.", " . $inttime . ", 0)";
	$hresult = $gdb->fun_do($strsql);
	
	$strsql = "SELECT group_reward2_id, mgoods_catalog_id, mgoods_id, mcombo_id, group_reward2_money, group_reward2_percent FROM " . $gdb->fun_table2('group_reward2')
	. " WHERE worker_group_id = " . $intid . " AND shop_id = 0 ORDER BY group_reward2_id";
	$hresult = $gdb->fun_query($strsql);
	$arr2 = $gdb->fun_fetch_all($hresult);
	foreach($arr2 as $row) {
		$strsql = "INSERT INTO " . $gdb->fun_table2('group_reward2') . " (worker_group_id, shop_id, mgoods_catalog_id, mgoods_id, sgoods_catalog_id, sgoods_id, mcombo_id, "
		. "group_reward2_money, group_reward2_percent, group_reward2_atime, group_reward2_ctime) VALUES (" . $intid . ", " . api_value_int0($GLOBALS['_SESSION']['login_sid'])
		. ", " . $row['mgoods_catalog_id'] . ", " . $row['mgoods_id'] . ", 0, 0, " . $row['mcombo_id'] . ", " . $row['group_reward2_money'] . ", ".$row['group_reward2_percent']
		.", " . $inttime . ", 0)";
		$gdb->fun_do($strsql);
	}
}

echo $intreturn;
?>