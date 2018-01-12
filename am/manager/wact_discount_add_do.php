<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strstart = api_value_post('start');
$strstart2 = $gdb->fun_escape($strstart);
$strend = api_value_post('end');
$strend2 = $gdb->fun_escape($strend);
$strmemo = api_value_post('memo');
$sqlmemo = $gdb->fun_escape($strmemo);
$arr1 = api_value_post('arr1');

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname)) {
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
	$strsql = "INSERT INTO " . $gdb->fun_table2('wact_discount') . " (wact_discount_atime, wact_discount_name,  wact_discount_start,  wact_discount_end,  wact_discount_state,  wact_discount_memo) VALUES ("
	.time() . ", '" . $sqlname . "', ". $intstart .",".$intend.",".$intstate. ", '" .$sqlmemo. "')";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}else{
		$id = $GLOBALS['gdb']->fun_insert_id();
	}
}

if (!empty($arr1)) {
	if ($intreturn == 0) {
		foreach ($arr1 as $key => $value) {
			$wgoods_catalog_id = api_value_int0($value['wgoods_catalog_id']);
			$wgoods_id = api_value_int0($value['wgoods_id']);
			$discount_goods_price = api_value_decimal($value['price'],2);
			$discount_goods_value = api_value_decimal($value['value'],2);

			$strsql = ' SELECT wgoods_catalog_name FROM ' . $GLOBALS['gdb']->fun_table2('wgoods_catalog') . ' WHERE wgoods_catalog_id = ' . $wgoods_catalog_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			$c_wgoods_catalog_name = $arr['wgoods_catalog_name'];

			$strsql = ' SELECT wgoods_name,wgoods_price FROM ' . $GLOBALS['gdb']->fun_table2('wgoods') . ' WHERE wgoods_id = ' . $wgoods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			$c_wgoods_name = $arr['wgoods_name'];
			$c_wgoods_price = $arr['wgoods_price'];

			$strsql = "INSERT INTO " . $gdb->fun_table2('wact_discount_goods') . " (wact_discount_id,wgoods_catalog_id,wgoods_id,	wact_discount_goods_value,	wact_discount_goods_price, c_wgoods_catalog_name , c_wgoods_name , c_wgoods_price , 	wact_discount_goods_atime) VALUES (" .$id . " , " .$wgoods_catalog_id ." , ". $wgoods_id. " , " .$discount_goods_value ." , ". $discount_goods_price." , '" . $c_wgoods_catalog_name . "' , '" .$c_wgoods_name ."' , ". $c_wgoods_price . " , " .time() .")";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 8;
			}
		}
	}
}

echo $intreturn;

?>