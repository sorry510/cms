<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strmgoods_catalog_name = api_value_post('mgoods_catalog_name');
$sqlmgoods_catalog_name = $gdb->fun_escape($strmgoods_catalog_name);

$intreturn = 0;
$atime = time();

$strsql = "SELECT mgoods_catalog_id FROM ".$gdb->fun_table2('mgoods_catalog')." WHERE mgoods_catalog_name = '" . $sqlmgoods_catalog_name ."' limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0) {
	  $strsql = "INSERT INTO " . $gdb->fun_table2('mgoods_catalog') . "( mgoods_catalog_name, mgoods_catalog_ctime ) VALUES ( '$sqlmgoods_catalog_name' , $atime)";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}


echo $intreturn;
?>