<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'system';
$strcard_type_name = api_value_post('card_type_name');
$sqlcard_type_name = $gdb->fun_escape($strcard_type_name);
$strcard_type_discount = api_value_post('card_type_discount');
$deccard_type_discount = api_value_decimal($strcard_type_discount,1);
$strcard_type_info = api_value_post('card_type_info');
$sqlcard_type_info = $gdb->fun_escape($strcard_type_info);


$intreturn = 0;
$atime = time();

$strsql = "SELECT card_type_id FROM ".$gdb->fun_table2('card_type')." where card_type_name='".$sqlcard_type_name."'";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0) {
	  $strsql = "INSERT INTO " . $gdb->fun_table2('card_type') . "( card_type_name, card_type_discount, card_type_info , card_type_atime) VALUES ( '$strcard_type_name' , $deccard_type_discount, '$strcard_type_info' , $atime)";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;