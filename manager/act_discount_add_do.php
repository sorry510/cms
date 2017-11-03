<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strclient = api_value_post('client');
$intclient = api_value_int0($strclient);
$strstart = api_value_post('start');
$strstart2 = $gdb->fun_escape($strstart);
$strend = api_value_post('end');
$strend2 = $gdb->fun_escape($strend);
$strmemo = api_value_post('memo');
$sqlmemo = $gdb->fun_escape($strmemo);
$arr1 = api_value_post('arr1');
$arr2 = api_value_post('arr2');

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($intclient)) {
		$intreturn = 1;
	}
}

if (empty($arr1) && empty($arr2)) {
	$intreturn = 2;
}

$intstart = 0;
if($intreturn == 0) {
	if(!empty($strstart2)) {
		$int = strtotime($strstart2);
		if($int > 0) {
			$intstart = $int;
		}
	}else{$intreturn = 3;}
}

$intend = 0;
if($intreturn == 0) {
	if(!empty($strend2)) {
		$int = strtotime($strend2);
		if($int > time()) {
			$intend = $int;
		}else{$intreturn = 100;}
	}else{$intreturn = 4;}
}

$intstate = 1;

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act_discount') . " (act_discount_atime, act_discount_name, act_discount_client,  act_discount_start,  act_discount_end,  act_discount_state,  act_discount_memo) VALUES ("
	.time() . ", '" . $sqlname . "', " . $intclient . ", ". $intstart .",".$intend.",".$intstate. ", '" .$sqlmemo. "')";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}else{
		$id = mysql_insert_id();
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act') . " (act_atime, act_type, act_discount_id) VALUES (" .time() . ", 1 , " .$id . ")";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}

if (!empty($arr1)) {
	if ($intreturn == 0) {
		foreach ($arr1 as $key => $value) {
			$mgoods_catalog_id = api_value_int0($value['mgoods_catalog_id']);
			$mgoods_id = api_value_int0($value['mgoods_id']);
			$discount_goods_price = api_value_decimal($value['price'],2);
			$discount_goods_value = api_value_decimal($value['value'],2);

			$strsql = ' SELECT mgoods_catalog_name FROM ' . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . ' WHERE mgoods_catalog_id = ' . $mgoods_catalog_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			$c_mgoods_catalog_name = $arr['mgoods_catalog_name'];

			$strsql = ' SELECT mgoods_name,mgoods_price FROM ' . $GLOBALS['gdb']->fun_table2('mgoods') . ' WHERE mgoods_id = ' . $mgoods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			$c_mgoods_name = $arr['mgoods_name'];
			$c_mgoods_price = $arr['mgoods_price'];

			$strsql = "INSERT INTO " . $gdb->fun_table2('act_discount_goods') . " (act_discount_id,mgoods_catalog_id,mgoods_id,	act_discount_goods_value,	act_discount_goods_price, c_mgoods_catalog_name , c_mgoods_name , c_mgoods_price , 	act_discount_goods_atime) VALUES (" .$id . " , " .$mgoods_catalog_id ." , ". $mgoods_id. " , " .$discount_goods_value ." , ". $discount_goods_price." , '" . $c_mgoods_catalog_name . "' , '" .$c_mgoods_name ."' , ". $c_mgoods_price . " , " .time() .")";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 8;
			}
		}
	}
}

if (!empty($arr2)) {
	if ($intreturn == 0) {
		foreach ($arr2 as $key => $value) {
			$mcombo_id = api_value_int0($value['mcombo_id']);
			$discount_goods_price = api_value_decimal($value['price'],2);
			$discount_goods_value = api_value_decimal($value['value'],2);

			$strsql = ' SELECT mcombo_name,mcombo_price FROM ' . $GLOBALS['gdb']->fun_table2('mcombo') . ' WHERE mcombo_id = ' . $mcombo_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			$c_mcombo_name = $arr['mcombo_name'];
			$c_mcombo_price = $arr['mcombo_price'];

			$strsql = "INSERT INTO " . $gdb->fun_table2('act_discount_goods') . " (act_discount_id,mcombo_id,act_discount_goods_value,act_discount_goods_price , c_mcombo_name , c_mcombo_price , act_discount_goods_atime) VALUES (" .$id ." , ". $mcombo_id. " , " .$discount_goods_value ." , ". $discount_goods_price." , '" . $c_mcombo_name ."' , ". $c_mcombo_price . " , " . time() .")";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 9;
			}
		}
	}
}

echo $intreturn;

?>