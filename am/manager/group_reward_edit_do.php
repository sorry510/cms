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
$strcreate = api_value_post('create');
$deccreate = api_value_decimal($strcreate, 2);
$strfilltype = api_value_post('filltype');
$intfilltype = api_value_int0($strfilltype);
$strfill = api_value_post('fill');
$decfill = api_value_decimal($strfill, 2);
$strguidetype = api_value_post('guidetype');
$intguidetype = api_value_int0($strguidetype);
$strguide = api_value_post('guide');
$decguide = api_value_decimal($strguide, 2);
$arr1 = api_value_post('arr1');
$arr3 = api_value_post('arr3');

$intreturn = 0;

$decfill2 = 0;
$decfill3 = 0;
if($intreturn == 0) {
	if($intfilltype == 1) {
		$decfill3 = $decfill;
	} else if($intfilltype == 2) {
		$decfill2 = $decfill;
	}
}

$decguide2 = 0;
$decguide3 = 0;
if($intreturn == 0) {
	if($intguidetype == 1) {
		$decguide3 = $decguide;
	} else if($intguidetype == 2) {
		$decguide2 = $decguide;
	}
}

$inttime = time();
if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('group_reward') . " WHERE worker_group_id = " . $intid . " AND shop_id = 0";
	$gdb->fun_do($strsql);
	if($deccreate > 0 || $decfill2 > 0 || $decfill3 > 0) {
		$strsql = "INSERT INTO " . $gdb->fun_table2('group_reward') . " (worker_group_id, shop_id, group_reward_create, group_reward_fill, group_reward_pfill, group_reward_guide, "
		. "group_reward_pguide, group_reward_atime, group_reward_ctime) VALUES (" . $intid . ", 0, " . $deccreate . ", " . $decfill2 . ", " . $decfill3 . ", "
		. $decguide2 . ",  " . $decguide3 . ", " . $inttime . ", 0)";
		$gdb->fun_do($strsql);
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('group_reward2') . " WHERE worker_group_id = " . $intid . " AND shop_id = 0";
	$gdb->fun_do($strsql);
}

if($intreturn == 0) {
	if(!empty($arr1)) {
		foreach ($arr1 as $row) {
			$intcatalog = api_value_int0($row['mgoods_catalog_id']);
			$intmgoods = api_value_int0($row['mgoods_id']);
			$decpercent = api_value_decimal($row['percent'], 2);
			$decmoney = api_value_decimal($row['money'], 2);
			if($decpercent > 0 || $decmoney > 0) {
				$strsql = "INSERT INTO " . $gdb->fun_table2('group_reward2') . " (worker_group_id, shop_id, mgoods_catalog_id, mgoods_id, sgoods_catalog_id, sgoods_id, mcombo_id, "
				. "group_reward2_money, group_reward2_percent, group_reward2_atime, group_reward2_ctime) VALUES (" . $intid . ", 0, " . $intcatalog . ", ". $intmgoods . ", 0, 0, 0, "
				. $decmoney . " , ". $decpercent . ", " . $inttime . ", 0)";
				$gdb->fun_do($strsql);
			}
		}
	}
}

if($intreturn == 0) {
	if(!empty($arr3)) {
		foreach ($arr3 as $row) {
			$intmcombo = api_value_int0($row['mcombo_id']);
			$decpercent = api_value_decimal($row['percent'], 2);
			$decmoney = api_value_decimal($row['money'], 2);
			if($decmoney > 0) {
				$strsql = "INSERT INTO " . $gdb->fun_table2('group_reward2') . " (worker_group_id, shop_id, mgoods_catalog_id, mgoods_id, sgoods_catalog_id, sgoods_id, mcombo_id, "
				. "group_reward2_money, group_reward2_percent, group_reward2_atime, group_reward2_ctime) VALUES (" . $intid . ", 0, 0, 0, 0, 0, " . $intmcombo . ", "
				. $decmoney . " , ". $decpercent . ", " . $inttime . ", 0)";
				$gdb->fun_do($strsql);
			}
		}
	}
}

echo $intreturn;
?>