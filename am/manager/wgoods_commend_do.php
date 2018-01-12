<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('wgoods_id');
$intid = api_value_int0($strid);
$strcommend = api_value_post('wgoods_commend');
$intcommend = api_value_int0($strcommend);

$intreturn = 0;
if($intreturn == 0) {
	if($intcommend != 1 && $intcommend != 2) {
		$intcommend = 1;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('wgoods') . " SET wgoods_commend = " . $intcommend . " WHERE wgoods_id = " . $intid . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>