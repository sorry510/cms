<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['act_module'] != 1) {
	return 1;
}

$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strclient = api_value_post('client');
$intclient = api_value_int0($strclient);
$strstart = api_value_post('start');
$strend = api_value_post('end');
$strmemo = api_value_post('memo');
$sqlmemo = $gdb->fun_escape($strmemo);
$arr1 = api_value_post('arr1');
$arr2 = api_value_post('arr2');

$intreturn = 0;
if($intreturn == 0) {
	if($intclient != 1 && $intclient != 2 && $intclient != 3) {
		$intclient = 1;
	}
}

$inttime = time();
$intstart = 0;
if($intreturn == 0) {
	if($strstart != '') {
		$int = strtotime($strstart);
		if($int > 0) {
			$intstart = $int;
		}
	}
	if($intstart == 0) {
		$intreturn = 2;
	}
}

$intend = 0;
if($intreturn == 0) {
	if($strend != '') {
		$int = strtotime($strend . ' 23:59:59');
		if($int > 0 && $int > $inttime) {
			$intend = $int;
		}
	}
	if($intend == 0) {
		$intreturn = 2;
	}
}

if($intreturn == 0) {
	if($intstart > $intend) {
		$intreturn = 2;
	}
}

$strid = 0;
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act_discount') . " (act_discount_name, act_discount_client, act_discount_start, act_discount_end, act_discount_memo, "
	. "act_discount_state, act_discount_atime, act_discount_ctime) VALUES ('" . $sqlname . "', " . $intclient . ", ". $intstart . "," . $intend . ", '" .$sqlmemo . "', 1, "
	. $inttime . ", 0)";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
	if($intreturn == 0) {
		$strid = $GLOBALS['gdb']->fun_insert_id();
	}
}

$arr = array();
if($intreturn == 0) {
	if(!empty($arr1)) {
		foreach ($arr1 as $row) {
			$intcatalog = api_value_int0($row['mgoods_catalog_id']);
			$intmgoods = api_value_int0($row['mgoods_id']);
			$decprice = api_value_decimal($row['price'], 2);
			$decvalue = api_value_decimal($row['value'], 1);

			$strcatalog_name = '';
			$strsql = "SELECT mgoods_catalog_id, mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . " WHERE mgoods_catalog_id = " . $intcatalog . " LIMIT 1";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arr)) {
				$strcatalog_name = $arr['mgoods_catalog_name'];
			}

			$strmgoods_name = '';
			$decmgoods_price = 0;
			$strsql = "SELECT mgoods_id, mgoods_name, mgoods_price FROM " . $GLOBALS['gdb']->fun_table2('mgoods') . " WHERE mgoods_id = " . $intmgoods . " LIMIT 1";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arr)) {
				$strmgoods_name = $arr['mgoods_name'];
				$decmgoods_price = $arr['mgoods_price'];
			}

			$strsql = "INSERT INTO " . $gdb->fun_table2('act_discount_goods') . " (act_discount_id, mgoods_catalog_id, mgoods_id, mcombo_id, act_discount_goods_value,	"
			. "act_discount_goods_price, act_discount_goods_atime, act_discount_goods_ctime, c_mgoods_catalog_name , c_mgoods_name , c_mgoods_price , c_mcombo_name, c_mcombo_price) "
			. "VALUES (" . $strid . ", " . $intcatalog . ", ". $intmgoods . ", 0, " . $decvalue . " , ". $decprice . ", " . $inttime . ", 0, '" . $gdb->fun_escape($strcatalog_name)
			. "', '" . $gdb->fun_escape($strmgoods_name) . "' , " . api_value_decimal($decmgoods_price, 2) . ", '', 0)";
			$gdb->fun_do($strsql);
		}
	}
}

if($intreturn == 0) {
	if(!empty($arr2)) {
		foreach ($arr2 as $row) {
			$intmcombo = api_value_int0($row['mcombo_id']);
			$decprice = api_value_decimal($row['price'], 2);
			$decvalue = api_value_decimal($row['value'], 1);

			$strmcombo_name = '';
			$decmcombo_price = 0;
			$strsql = "SELECT mcombo_id, mcombo_name, mcombo_price FROM " . $GLOBALS['gdb']->fun_table2('mcombo') . " WHERE mcombo_id = " . $intmcombo . " LIMIT 1";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arr)) {
				$strmcombo_name = $arr['mcombo_name'];
				$decmcombo_price = $arr['mcombo_price'];
			}

			$strsql = "INSERT INTO " . $gdb->fun_table2('act_discount_goods') . " (act_discount_id, mgoods_catalog_id, mgoods_id, mcombo_id, act_discount_goods_value, "
			. "act_discount_goods_price, act_discount_goods_atime, act_discount_goods_ctime, c_mgoods_catalog_name , c_mgoods_name , c_mgoods_price , c_mcombo_name, c_mcombo_price) "
			. "VALUES (" . $strid . ", 0, 0, " . $intmcombo . ", " . $decvalue . ", " . $decprice . ", " . $inttime . ", 0, '', '', 0, '" . $gdb->fun_escape($strmcombo_name) . "', "
			. api_value_decimal($decmcombo_price, 2) . ")";
			$gdb->fun_do($strsql);
		}
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act') . " (act_type, act_discount_id, act_atime) VALUES (1, " . $strid . ", " . $inttime . ")";
	$gdb->fun_do($strsql);
}

echo $intreturn;
?>