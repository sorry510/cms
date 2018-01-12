<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid  = api_value_int0($strid);
$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strjianpin = api_value_post('jianpin');
$sqljianpin = $gdb->fun_escape($strjianpin);
$strcode = api_value_post('code');
$sqlcode = $gdb->fun_escape($strcode);
$strprice = api_value_post('price');
$decprice = api_value_decimal($strprice, 2);
$strcprice = api_value_post('cprice');
$deccprice = api_value_decimal($strcprice, 2);
$strdays = api_value_post('days');
$intdays  = api_value_int0($strdays);
$stract = api_value_post('act');
$intact  = api_value_int0($stract);
$arr1 = api_value_post('arr1');

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	if($strcode != '') {
		$strsql = "SELECT mcombo_id FROM " . $gdb->fun_table2('mcombo') . " WHERE mcombo_code = '" . $sqlcode . "' AND mcombo_id <> " . $intid . " LIMIT 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)) {
			$intreturn = 2;
		}
	}
}

$inttype = 2;
if($intreturn == 0) {
	if($intdays == 0) {
		$intreturn = 1;
	}
}

$inttime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('mcombo') . " SET mcombo_code = '" . $sqlcode . "', mcombo_name = '" . $sqlname . "', mcombo_jianpin = '" . $sqljianpin
	. "', mcombo_price = " . $decprice . ", mcombo_cprice = " . $deccprice . ", mcombo_limit_days = " . $intdays . ", mcombo_act = " . $intact
	. ", mcombo_ctime = " . $inttime . " WHERE mcombo_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('mcombo_goods') . " WHERE mcombo_id = " . $intid;
	$gdb->fun_do($strsql);
	if(!empty($arr1)) {
		foreach ($arr1 as $row) {
			$intmgoods = api_value_int0($row['mgoods_id']);

			$strsql = "SELECT mgoods_id FROM " . $GLOBALS['gdb']->fun_table2('mgoods') . " WHERE mgoods_id = " . $intmgoods . " LIMIT 1";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(empty($arr)) {
				$intmgoods = 0;
			}
			
			if($intmgoods > 0) {
				$strsql = "INSERT INTO " . $gdb->fun_table2('mcombo_goods') . " (mcombo_id, mgoods_id, mcombo_goods_count, mcombo_goods_atime, mcombo_goods_ctime) VALUES ("
				. $strid . ", ". $intmgoods . ", 0, " . $inttime . ", 0)";
				$gdb->fun_do($strsql);
			}
		}
	}
}

echo $intreturn;
?>