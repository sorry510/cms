<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_type_name = api_value_post('card_type_name');
$sqlcard_type_name = $gdb->fun_escape($strcard_type_name);
$strcard_type_name_old = api_value_post('card_type_name_old');
$sqlcard_type_name_old = $gdb->fun_escape($strcard_type_name_old);
$strcard_type_discount = api_value_post('card_type_discount');
$intcard_type_discount = api_value_int0($strcard_type_discount);
$strcard_type_info = api_value_post('card_type_info');
$sqlcard_type_info = $gdb->fun_escape($strcard_type_info);
$strcard_type_id = api_value_post('card_type_id');
$intcard_type_id = api_value_int0($strcard_type_id);


$intreturn = 0;
$ctime = time();

if($sqlcard_type_name != $sqlcard_type_name_old){
	$strsql = "SELECT card_type_id FROM ".$gdb->fun_table2('card_type')." WHERE card_type_name='".$sqlcard_type_name."'";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr)){
	  $intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('card_type') . " SET card_type_name = '". $sqlcard_type_name ."' , card_type_discount = ".$intcard_type_discount.", card_type_info = '".$sqlcard_type_info."',card_type_ctime = ".$ctime." WHERE card_type_id = " . $intcard_type_id . " LIMIT 1" ;
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;