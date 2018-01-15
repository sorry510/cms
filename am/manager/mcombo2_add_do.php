<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

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
		$strsql = "SELECT mcombo_id FROM " . $gdb->fun_table2('mcombo') . " WHERE mcombo_code = '" . $sqlcode . "' LIMIT 1";
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

$strid = '';
$inttime = time();
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('mcombo') . "(mcombo_type, mcombo_code, mcombo_name, mcombo_jianpin, mcombo_price, mcombo_cprice, mcombo_limit_type, "
	. "mcombo_limit_days, mcombo_limit_months, mcombo_act, mcombo_state, mcombo_atime ,mcombo_ctime) VALUES (2, '" . $sqlcode . "', '" . $sqlname . "', '" . $sqljianpin
	. "', " . $decprice . ", " . $deccprice . ", " . $inttype . ", " . $intdays . ", 0, " . $intact . ", 1, " . $inttime . ", 0)";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
	if($intreturn == 0) {
		$strid = $GLOBALS['gdb']->fun_insert_id();
	}
}

if($intreturn == 0) {
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
				. $strid . ", ". $intmgoods . ", 1, " . $inttime . ", 0)";
				$gdb->fun_do($strsql);
			}
		}
	}
}

echo $intreturn;
?>