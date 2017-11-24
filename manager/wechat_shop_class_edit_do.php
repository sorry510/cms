<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strwgoods_catalog_name = api_value_post('txtwgoods_catalog_name');
$sqlwgoods_catalog_name = $gdb->fun_escape($strwgoods_catalog_name);
$strwgoods_catalog_id = api_value_post('txtwgoods_catalog_id');
$intwgoods_catalog_id = api_value_int0($strwgoods_catalog_id);

$intreturn = 0;
$ctime = time();

/*$strsql = "SELECT wgoods_catalog_id FROM ".$gdb->fun_table2('wgoods_catalog')." WHERE wgoods_catalog_name = '" . $sqlwgoods_catalog_name."' limit 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 1;
}*/

if($intreturn == 0) {
  $strsql = "UPDATE " . $gdb->fun_table2('wgoods_catalog') . "  SET wgoods_catalog_name = '".$sqlwgoods_catalog_name . "' , wgoods_catalog_ctime = ".$ctime." WHERE wgoods_catalog_id = " . $intwgoods_catalog_id;
  $hresult = $gdb->fun_do($strsql);
  if($hresult == FALSE) {
	$intreturn = 2;
  }
}

echo $intreturn;
?>