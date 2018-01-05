<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strtype = api_value_post('type');
$inttype = api_value_int0($strtype);
$strtime = api_value_post('time');
$strmoney = api_value_post('money');
$decmoney = api_value_sdecimal($strmoney, 2);
$stroperator = api_value_post('operator');
$sqloperator = $gdb->fun_escape($stroperator);
$strmemo = api_value_post('memo');
$sqlmemo = $gdb->fun_escape($strmemo);
$arr1 = api_value_post('arr1');
$arr2 = api_value_post('arr2');

$intreturn = 0;
if($inttype != 1 && $inttype != 2) {
	$intreturn = 1;
}

$inttime = 0;
if($intreturn == 0) {
	if($strtime != '') {
		$int = strtotime($strtime);
		if($int > 0) {
			$inttime = $int;
		}
	}
	if($inttime == 0) {
		$intreturn = 2;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('store') . " SET store_type = " . $inttype . ", store_money = " . $decmoney . ", store_operator = '" . $sqloperator
	. "', store_memo = '" . $sqlmemo . "', store_time = " . $inttime . ", store_ctime = " . time() . " WHERE store_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('store_goods') . " WHERE store_id = " . $intid;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

$arr = array();
if($intreturn == 0) {
	if(!empty($arr1)) {
		foreach ($arr1 as $row) {
			$intmgoods = api_value_int0($row['mgoods_id']);
			$intcount = api_value_sint($row['count']);

			if($intcount != 0) {
				$strmgoodsname = '';
				$strsql = "SELECT mgoods_id, mgoods_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods') . " WHERE mgoods_id = " . $intmgoods . " LIMIT 1";
				$hresult = $GLOBALS['gdb']->fun_query($strsql);
				$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
				if(!empty($arr)) {
					$strmgoodsname = $arr['mgoods_name'];
				}
	
				$strsql = "INSERT INTO " . $gdb->fun_table2('store_goods') . " (store_id, shop_id, mgoods_id, sgoods_id, store_goods_count, store_goods_atime, store_goods_ctime, "
				. "c_goods_name) VALUES (" . $intid . ", " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . ", ". $intmgoods . ", 0, " . $intcount . " , ". time() . ", 0, '"
				. $gdb->fun_escape($strmgoodsname) . "')";
				$gdb->fun_do($strsql);
			}
		}
	}
}

if($intreturn == 0) {
	if(!empty($arr2)) {
		foreach ($arr2 as $row) {
			$intsgoods = api_value_int0($row['sgoods_id']);
			$intcount = api_value_int0($row['count']);

			if($intcount > 0) {
				$strsgoodsname = '';
				$strsql = "SELECT sgoods_id, sgoods_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods') . " WHERE sgoods_id = " . $intsgoods . " LIMIT 1";
				$hresult = $GLOBALS['gdb']->fun_query($strsql);
				$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
				if(!empty($arr)) {
					$strsgoodsname = $arr['sgoods_name'];
				}
	
				$strsql = "INSERT INTO " . $gdb->fun_table2('store_goods') . " (store_id, shop_id, mgoods_id, sgoods_id, store_goods_count, store_goods_atime, store_goods_ctime, "
				. "c_goods_name) VALUES (" . $intid . ", " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . ", 0, ". $intsgoods . ", " . $intcount . " , ". time() . ", 0, '"
				. $gdb->fun_escape($strsgoodsname) . "')";
				$gdb->fun_do($strsql);
			}
		}
	}
}

echo $intreturn;
?>