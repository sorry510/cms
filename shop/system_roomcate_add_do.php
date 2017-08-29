<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strroom_catalog_name = api_value_post('name');
$sqlroom_catalog_name = $gdb->fun_escape($strroom_catalog_name );
$intreturn = 0;
$arr = array();


if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('room_catalog')." (shop_id,room_catalog_name,room_catalog_atime) VALUES (".$GLOBALS['_SESSION']['login_sid'].",'".$sqlroom_catalog_name."',".time().")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 1;
	}
}

echo $intreturn;