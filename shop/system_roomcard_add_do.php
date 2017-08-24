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
$intreturn = 0;
$arr = array();


if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('room')." (shop_id,room_catalog_id,room_code,room_name,room_atime) VALUES (".$GLOBALS['_SESSION']['login_sid'].",".$introom_catalog_id.",'".$sqlroom_code."','".$sqlroom_name."',".time().")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 1;
	}
}

echo $intreturn;