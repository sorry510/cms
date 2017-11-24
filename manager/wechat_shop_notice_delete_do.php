<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strwnotice_id = api_value_post('id');
$intwnotice_id = api_value_int0($strwnotice_id);

$intreturn = 0;

$strsql = "SELECT wgoods_id FROM " . $gdb->fun_table2('wgoods') . " where wnotice_id=".$intwnotice_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
if(!empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('wnotice') . " WHERE wnotice_id = " . $intwnotice_id . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;
?>