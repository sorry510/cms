<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strgift_name = api_value_post('gift_name');
$sqlgift_name = $gdb->fun_escape($strgift_name);
$strgift_name_old = api_value_post('gift_name_old');
$sqlgift_name_old = $gdb->fun_escape($strgift_name_old);
$strgift_score = api_value_post('gift_score');
$decgift_score = api_value_decimal($strgift_score,0);
$strgift_id = api_value_post('gift_id');
$intgift_id = api_value_int0($strgift_id);


$intreturn = 0;
$ctime = time();

if($sqlgift_name != $sqlgift_name_old){
	$strsql = "SELECT gift_id FROM ".$gdb->fun_table2('gift')." WHERE gift_name='".$sqlgift_name."'";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr)){
	  $intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('gift') . " SET gift_name = '". $sqlgift_name ."' , gift_score = ".$decgift_score.",gift_ctime = ".$ctime." WHERE gift_id = " . $intgift_id . " LIMIT 1" ;
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;