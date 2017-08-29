<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strroom_catalog_id = api_value_post('id');
$introom_catalog_id = api_value_int0($strroom_catalog_id);
$strroom_catalog_name = api_value_post('name');
$sqlroom_catalog_name = $gdb->fun_escape($strroom_catalog_name );
$intreturn = 0;
$arr = array();

$strsql = "SELECT room_catalog_id FROM ".$gdb->fun_table2('room_catalog')." WHERE room_catalog_id=".$introom_catalog_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table2('room_catalog')." SET room_catalog_name='".$sqlroom_catalog_name."',room_catalog_ctime=".time()." WHERE room_catalog_id=".$introom_catalog_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 2;
	}
}

echo $intreturn;