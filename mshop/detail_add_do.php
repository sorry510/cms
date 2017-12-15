<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strcount = api_value_post('count');
$intcount = api_value_int0($strcount);

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($intid) || empty($intcount)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('wcart') . " (card_id, wgoods_id, wcart_wgoods_count, wcart_wgoods_state,wcart_time) VALUES (". api_value_int0($GLOBALS['_SESSION']['login_id']) . ", " . $intid . ", ". $intcount ." , 1 ,".time()." )";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;
?>