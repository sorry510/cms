<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strdiscount = api_value_post('txtdiscount');
$decdiscount = api_value_decimal($strdiscount,1);
$strmemo = api_value_post('txtmemo');
$sqlmemo = $gdb->fun_escape($strmemo);


$intreturn = 0;
$atime = time();

if($decdiscount <= 0.1 || $decdiscount > 10){
	$decdiscount = 10;
}

// $strsql = "SELECT card_type_id FROM ".$gdb->fun_table2('card_type')." where card_type_name='". $sqlname ."'";
// $hresult = $gdb->fun_query($strsql);
// $arr = $gdb->fun_fetch_assoc($hresult);
// if(!empty($arr)){
// 	$intreturn = 1;
// }

if($intreturn == 0) {
	  $strsql = "INSERT INTO " . $gdb->fun_table2('card_type') . "(card_type_name, card_type_discount, card_type_memo , card_type_atime) VALUES ( '$sqlname' , $decdiscount, '$sqlmemo' , $atime)";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;