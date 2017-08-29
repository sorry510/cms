<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsgoods_catalog_name = api_value_post('sgoods_catalog_name');
$sqlsgoods_catalog_name = $gdb->fun_escape($strsgoods_catalog_name);

$intreturn = 0;
$atime = time();

$strsql = "SELECT sgoods_catalog_id FROM ".$gdb->fun_table2('sgoods_catalog')." WHERE sgoods_catalog_name ='" . $sqlsgoods_catalog_name ."' and shop_id =".$GLOBALS['_SESSION']['login_sid']." limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0) {
	  $strsql = "INSERT INTO " . $gdb->fun_table2('sgoods_catalog') . "( shop_id,sgoods_catalog_name, sgoods_catalog_ctime ) VALUES ( ".$GLOBALS['_SESSION']['login_sid'].",'".$sqlsgoods_catalog_name."' , ".$atime.")";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}


echo $intreturn;
?>