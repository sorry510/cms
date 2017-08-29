<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strgift_name = api_value_post('name');
$sqlgift_name = $gdb->fun_escape($strgift_name);
$strscore = api_value_post('score');
$intgift_score = api_value_int0($strscore);

$intreturn = 0;
$arr = array();

$strsql = "SELECT gift_id FROM ".$gdb->fun_table2('gift')." WHERE gift_name='".$sqlgift_name."'";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('gift')." (gift_name,gift_score,gift_atime) VALUES ('".$sqlgift_name."',".$intgift_score.",".time().")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 2;
	}
}

echo $intreturn;