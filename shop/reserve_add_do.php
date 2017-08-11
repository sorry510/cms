<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strdtime = api_value_post('dtime');
$strdtime2 = $gdb->fun_escape($strdtime);
$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$strphone = api_value_post('phone');
$sqlphone = $gdb->fun_escape($strphone);
$strcount = api_value_post('count');
$intcount = api_value_int0($strcount);
$strmemo = api_value_post('memo');
$sqlmemo = $gdb->fun_escape($strmemo);
$strmgoods_id = api_value_post('mgoods_id');
$intshop_id = $GLOBALS['_SESSION']['login_sid'];
$time = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($sqlphone) || empty($strmgoods_id)) {
		$intreturn = 1;
	}
}

if (empty($intcard_id)) {
	$intcard_id = 0;
}

$intdtime = 0;
if($intreturn == 0) {
	if(!empty($strdtime2)) {
		$int = strtotime($strdtime2);
		if($int > 0) {
			$intdtime = $int;
		}
	}else{$intreturn = 2;}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('reserve') . " (card_id, shop_id, reserve_type,reserve_name,reserve_phone,reserve_count,reserve_state,reserve_atime,reserve_dtime,reserve_memo) VALUES ("
	.$intcard_id . ", " . $intshop_id . ", 1 , '" . $sqlname ."', '" . $sqlphone ."', ". $intcount .", 1 , ".$time.",".$intdtime.",'".$sqlmemo."')";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}else{
		$id = mysql_insert_id();
	}
}

if($intreturn == 0) {
	foreach($strmgoods_id as $key => $value) {
		$strsql = "INSERT INTO " . $gdb->fun_table2('reserve_mgoods') . "(reserve_id,mgoods_id,c_mgoods_name) VALUES (" .$id . " , " .$value['mgoods_id'] . " , '" . $value['mgoods_name']. "')";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 4;
		}
	}
}

echo $intreturn;

?>