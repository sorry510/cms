<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strroom_name = api_value_post('name');
$sqlroom_name = $gdb->fun_escape($strroom_name);
$strroom_code = api_value_post('code');
$sqlroom_code = $gdb->fun_escape($strroom_code);
$strroom_catalog_id = api_value_post('catalog');
$introom_catalog_id = api_value_int0($strroom_catalog_id);
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
	$strsql = "UPDATE ".$gdb->fun_table2('room')." SET room_catalog_id=".$introom_catalog_id.",room_code='".$sqlroom_code."',room_name='".$sqlroom_name."',room_ctime=".time()." where room_id=".$introom_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 2;
	}
}

echo $intreturn;