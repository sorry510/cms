<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT store_id, store_type FROM " . $gdb->fun_table2('store') . " WHERE store_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

$inttime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('store') . " SET store_state = 2, store_ctime = " . $inttime . " WHERE store_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

$arr2 = array();
if($intreturn == 0) {
	$strsql = "SELECT store_goods_id, mgoods_id, sgoods_id, store_goods_count FROM " . $gdb->fun_table2('store_goods')
	. " WHERE store_id = " . $intid . " ORDER BY mgoods_id, sgoods_id";
	$hresult = $gdb->fun_query($strsql);
	$arr2 = $gdb->fun_fetch_all($hresult);
	foreach($arr2 as $row2) {
		if($row2['mgoods_id'] > 0) {
			if($arr['store_type'] == 1) {
				$strsql = "UPDATE " . $gdb->fun_table2('store_info') . " SET store_info_count = store_info_count + (" . $row2['store_goods_count']
				. ") WHERE shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " AND mgoods_id = " . $row2['mgoods_id'] . " LIMIT 1";
				$gdb->fun_do($strsql);
			} else if($arr['store_type'] == 2) {
				$strsql = "UPDATE " . $gdb->fun_table2('store_info') . " SET store_info_count = store_info_count - (" . $row2['store_goods_count']
				. ") WHERE shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " AND mgoods_id = " . $row2['mgoods_id'] . " LIMIT 1";
				$gdb->fun_do($strsql);
			}
		} else if($row2['sgoods_id'] > 0) {
			if($arr['store_type'] == 1) {
				$strsql = "UPDATE " . $gdb->fun_table2('store_info') . " SET store_info_count = store_info_count + (" . $row2['store_goods_count']
				. ") WHERE shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " AND sgoods_id = " . $row2['sgoods_id'] . " LIMIT 1";
				$gdb->fun_do($strsql);
			} else if($arr['store_type'] == 2) {
				$strsql = "UPDATE " . $gdb->fun_table2('store_info') . " SET store_info_count = store_info_count - (" . $row2['store_goods_count']
				. ") WHERE shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " AND sgoods_id = " . $row2['sgoods_id'] . " LIMIT 1";
				$gdb->fun_do($strsql);
			}
		}
	}
}

echo $intreturn;
?>