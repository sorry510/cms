<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strroom_id = api_value_post('id');
$introom_id = api_value_int0($strroom_id);
$intreturn = 0;
$arr = array();

$strsql = "SELECT room_id FROM ".$gdb->fun_table2('room')." WHERE room_id=".$introom_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}


if($intreturn == 0){
	$strsql = "DELETE FROM ".$gdb->fun_table2('room')." WHERE room_id=".$introom_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 2;
	}
}

echo $intreturn;